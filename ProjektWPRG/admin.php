<?php
require_once 'db.php';
require_once 'sesja.php';

if (!isset($_SESSION['uzytkownik_id']) || $_SESSION['rola'] !== 'admin') {
    die("Brak dostępu.");
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Panel administratora</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<p><a href="strona_glowna.php">🏠 Strona główna</a></p>

<h2>👥 Użytkownicy</h2>

<?php
global $pdo;
$stmt = $pdo->query("SELECT * FROM users ORDER BY id");
$uzytkownicy = $stmt->fetchAll();

foreach ($uzytkownicy as $u):
    ?>
    <div style="border:1px solid #ccc; padding:10px; margin:5px;">
        <b><?= $u['username'] ?></b> (<?= $u['email'] ?>) – rola: <b><?= ($u['role']) ?></b>
        <?php if ($u['role'] !== 'admin'): ?>
            | <a href="zmien_role.php?id=<?= $u['id'] ?>&na=author">Ustaw jako author</a>
            | <a href="zmien_role.php?id=<?= $u['id'] ?>&na=user">Ustaw jako user</a>
            | <a href="usun_uzytkownika.php?id=<?= $u['id'] ?>" onclick="return confirm('Na pewno?')">🗑️ Usuń</a>
        <?php endif; ?>
    </div>
<?php endforeach; ?>

<h2>📰 Posty</h2>

<?php
$stmt = $pdo->query("SELECT posts.*, users.username FROM posts LEFT JOIN users ON posts.author_id = users.id ORDER BY created_at DESC");
$posty = $stmt->fetchAll();

foreach ($posty as $p): ?>
    <div style="border:1px solid #aaa; padding:10px; margin-bottom:10px;">
        <b><?= ($p['title']) ?></b> (<?= isset($p['username']) ? $p['username'] : 'Nieznany' ?>, <?= $p['created_at'] ?>)
        <br>
        <a href="edytuj_post.php?id=<?= $p['id'] ?>">✏️ Edytuj</a> |
        <a href="usun_post.php?id=<?= $p['id'] ?>" onclick="return confirm('Usunąć post?')">🗑️ Usuń</a>
    </div>
<?php endforeach; ?>

</body>
</html>