<?php
require_once 'db.php';
require_once 'sesja.php';

if ($_SESSION['rola'] !== 'admin') {
    die("Brak dostępu.");
}

$id = (int)(isset($_GET['id']) ? $_GET['id'] : 0);
$nowa_rola = isset($_GET['na']) ? $_GET['na'] : '';

if (in_array($nowa_rola, ['user', 'author'])) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE users SET role = ? WHERE id = ?");
    $stmt->execute([$nowa_rola, $id]);
}

header("Location: admin.php");
exit;
