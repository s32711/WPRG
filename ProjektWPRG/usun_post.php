<?php
require_once 'db.php';
require_once 'sesja.php';

if (!isset($_SESSION['uzytkownik_id'])) {
    die("Brak dostępu!");
}

$id = isset($_GET['id']) ? $_GET['id'] : 0;

global $pdo;
$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch();

$stmt = $pdo->prepare("DELETE FROM posts WHERE id = ?");
$stmt->execute([$id]);

header("Location: strona_glowna.php");
exit;
?>