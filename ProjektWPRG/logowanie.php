<?php
require_once 'db.php';
require_once 'sesja.php';

$blad = '';
if (isset($_GET['reset']) && $_GET['reset'] == 1) {
    echo "<p style='color:green'>Hasło zostało zmienione. Możesz się teraz zalogować.</p>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nazwa = isset($_POST['nazwa']) ? $_POST['nazwa'] : '';
    $haslo = isset($_POST['haslo']) ? $_POST['haslo'] : '';

    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$nazwa]);
    $uzytkownik = $stmt->fetch();

    if ($uzytkownik && password_verify($haslo, $uzytkownik['password'])) {
        $_SESSION['uzytkownik_id'] = $uzytkownik['id'];
        $_SESSION['nazwa'] = $uzytkownik['username'];
        $_SESSION['rola'] = $uzytkownik['role'];

        setcookie('ostatni_login', $uzytkownik['username'], time() + 3600 * 24 * 30);

        header("Location: strona_glowna.php");
        exit;
    } else {
        $blad = "Błędny login lub hasło.";
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

<h2>Logowanie</h2>
<form method="post">
    <label>Nazwa użytkownika:
        <input type="text" name="nazwa"
               value="<?= isset($_COOKIE['ostatni_login']) ? $_COOKIE['ostatni_login'] : '' ?>">
    </label><br>
    <label>Hasło: <input type="password" name="haslo"></label><br>
    <button type="submit">Zaloguj się</button>
</form>
<p style="color:red"><?= $blad ?></p>
<p><a href="reset_hasla_email.php">🔑 Zapomniałeś hasła?</a></p>
</body>
</html>