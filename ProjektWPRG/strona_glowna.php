<?php
require_once 'db.php';
require_once 'sesja.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Strona główna</h1>

<?php if (isset($_SESSION['uzytkownik_id'])): ?>
    <p>Witaj, <b><?= $_SESSION['nazwa'] ?></b>! (<?= $_SESSION['rola'] ?>)</p>
    <p><a href="wylogowanie.php">Wyloguj się</a></p>

    <?php if (in_array($_SESSION['rola'], ['admin', 'author'])): ?>
        <button><p><a href="dodaj_post.php">➕ Dodaj nowy post</a></p></button>
    <?php endif; ?>

    <?php if ($_SESSION['rola'] === 'admin'): ?>
        <p><a href="admin.php">🛠️ Panel administratora</a></p>
    <?php endif; ?>

<?php else: ?>
    <p>Nie jesteś zalogowany. <a href="logowanie.php">Zaloguj się</a> lub <a href="rejestracja.php">zarejestruj się</a>.</p>
<?php endif; ?>

<hr>

<h2>Wpisy na blogu</h2>

<?php
global $pdo;
$stmt = $pdo->query("
    SELECT posts.*, users.username 
    FROM posts 
    LEFT JOIN users ON posts.author_id = users.id 
    ORDER BY created_at DESC
");
$posty = $stmt->fetchAll();

if ($posty):
    foreach ($posty as $post): ?>
        <div class="post">
            <h3><a href="post.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a></h3>
            <p><i>Autor: <?= isset($post['username']) ? $post['username'] : 'Nieznany' ?> | <?= $post['created_at'] ?></i></p>
            <?php if (!empty($post['image'])): ?>
                <img src="<?= $post['image'] ?>" alt="obrazek" style="max-width:300px;"><br>
            <?php endif; ?>
            <p><?= $post['content'] ?></p>
            <?php if (isset($_SESSION['uzytkownik_id']) && ( $_SESSION['rola'] === 'admin' || $_SESSION['uzytkownik_id'] == $post['author_id'])): ?>
                <p>
                    <button><a href="edytuj_post.php?id=<?= $post['id'] ?>">✏️ Edytuj</a></button> |
                    <button><a href="usun_post.php?id=<?= $post['id'] ?>" onclick="return confirm('Na pewno usunąć ten post?');">🗑️ Usuń</a></button>
                </p>
            <?php endif; ?>
        </div>
    <?php endforeach;
else: ?>
    <p>Brak postów do wyświetlenia.</p>
<?php endif; ?>
<footer><p style="color: white">&#169; Copyright 2025 Blog</p></footer>
</body>
</html>