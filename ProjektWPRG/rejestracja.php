<?php
require_once 'db.php';

$blad = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nazwa = isset($_POST['nazwa']) ? $_POST['nazwa'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $haslo = isset($_POST['haslo']) ? $_POST['haslo'] : '';

    if ($nazwa && $email && $haslo) {
        $haslo_hash = password_hash($haslo, PASSWORD_DEFAULT);
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");

        try {
            $stmt->execute([$nazwa, $email, $haslo_hash]);
            header("Location: logowanie.php");
            exit;
        } catch (PDOException $e) {
            $blad = "Błąd rejestracji: użytkownik już istnieje.";
        }
    } else {
        $blad = "Wszystkie pola są wymagane.";
    }
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<p><a href="strona_glowna.php">🏠 Strona główna</a></p>

<h2>Rejestracja</h2>
<form method="post">
    <label>Nazwa użytkownika: <input type="text" name="nazwa"></label><br>
    <label>Email: <input type="email" name="email"></label><br>
    <label>Hasło: <input type="password" name="haslo"></label><br>
    <button type="submit">Zarejestruj się</button>
</form>
<p style="color:red"><?= htmlspecialchars($blad) ?></p>

</body>
</html>