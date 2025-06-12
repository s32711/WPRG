<?php
require_once 'db.php';
require_once 'sesja.php';

if ($_SESSION['rola'] !== 'admin') {
    die("Brak dostępu.");
}

$id = (isset($_GET['id']) ? $_GET['id'] : 0);

if ($id !== $_SESSION['uzytkownik_id']) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$id]);
}

header("Location: admin.php");
exit;
