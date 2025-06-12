<?php
require_once 'db.php';
require_once 'sesja.php';

if (!isset($_GET['id'])) {
    die("Brak ID posta.");
}

$post_id = $_GET['id'];

global $pdo;
$stmt = $pdo->prepare("
    SELECT posts.*, users.username
    FROM posts
    LEFT JOIN users ON posts.author_id = users.id
    WHERE posts.id = ?");
$stmt->execute([$post_id]);
$post = $stmt->fetch();

if (!$post) {
    die("Nie znaleziono posta.");
}

$stmt = $pdo->prepare("SELECT id FROM posts WHERE id < ? ORDER BY id DESC LIMIT 1");
$stmt->execute([$post_id]);
$prev_post = $stmt->fetch();

$stmt = $pdo->prepare("SELECT id FROM posts WHERE id > ? ORDER BY id ASC LIMIT 1");
$stmt->execute([$post_id]);
$next_post = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tresc'])) {
    $tresc = trim($_POST['tresc']);
    $user_id = isset($_SESSION['uzytkownik_id']) ? $_SESSION['uzytkownik_id'] : null;

    if ($tresc !== '') {
        $stmt = $pdo->prepare("INSERT INTO comments (post_id, user_id, content) VALUES (?, ?, ?)");
        $stmt->execute([$post_id, $user_id, $tresc]);

        header("Location: post.php?id=$post_id");
        exit;
    }
}

$stmt = $pdo->prepare("
    SELECT comments.*, users.username
    FROM comments LEFT JOIN users ON comments.user_id = users.id
    WHERE post_id = ?
    ORDER BY created_at DESC");
$stmt->execute([$post_id]);
$komentarze = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title><?= $post['title'] ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<p><a href="strona_glowna.php">🏠 Strona główna</a></p>

<h2><?= $post['title'] ?></h2>
<p><i>Autor: <?= isset($post['username']) ? $post['username'] : 'Nieznany' ?> | <?= $post['created_at'] ?></i></p>

<?php if ($post['image']): ?>
    <img src="<?= $post['image'] ?>" alt="obrazek" style="max-width:300px;"><br>
<?php endif; ?>

<p><?= $post['content'] ?></p>

<?php if (isset($post['author_id'])): ?>
    <p><button><a href="kontakt.php?autor_id=<?= $post['author_id'] ?>">📩 Skontaktuj się z autorem</a></button></p>
<?php endif; ?>

<div style="margin-top:20px;">
    <?php if ($prev_post): ?>
        <button><a href="post.php?id=<?= $prev_post['id'] ?>">⬅️ Poprzedni post</a></button>
    <?php endif; ?>

    <?php if ($next_post): ?>
        <button><a href="post.php?id=<?= $next_post['id'] ?>">Następny post ➡️</a></button>
    <?php endif; ?>
</div>

<hr>

<h3>Komentarze</h3>

<?php foreach ($komentarze as $kom): ?>
    <div class="comment">
        <b><?= isset($kom['username']) ? $kom['username'] : 'Gość' ?></b> napisał:
        <p><?= $kom['content'] ?></p>
        <i><?= $kom['created_at'] ?></i>
    </div>
<?php endforeach; ?>

<h4>Dodaj komentarz</h4>
<form method="post">
    <textarea name="tresc" rows="4" cols="50" required></textarea><br>
    <button type="submit">Dodaj</button>
</form>
</body>
</html>