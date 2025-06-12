<?php
require_once 'db.php';

$id = isset($_GET['id']) ? $_GET['id'] : 0;
$blad = '';

global $pdo;
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch();

if (!$user) {
    die("Nie znaleziono użytkownika.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $haslo = isset($_POST['haslo']) ? $_POST['haslo'] : '';
    $haslo2 = isset($_POST['haslo2']) ? $_POST['haslo2'] : '';

    if ($haslo && $haslo === $haslo2) {
        $hash = password_hash($haslo, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
        $stmt->execute([$hash, $id]);

        header("Location: logowanie.php?reset=1");
        exit;
    } else {
        $blad = "Hasła są puste lub się nie zgadzają.";
    }
}
?>
<head>
    <meta charset="UTF-8">
    <title>Reset</title>
    <link rel="stylesheet" href="style.css">
</head>

<h2>Nowe hasło dla konta: <?= $user['username'] ?></h2>
<form method="post">
    <label>Nowe hasło: <input type="password" name="haslo"></label><br>
    <label>Powtórz hasło: <input type="password" name="haslo2"></label><br>
    <button type="submit">Zmień hasło</button>
</form>
<p style="color:red"><?= $blad ?></p>
