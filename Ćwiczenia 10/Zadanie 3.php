<?php
session_start();

$poprawny_login = "login";
$poprawne_haslo = "haslo";

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login']) && isset($_POST['haslo'])) {
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];

        if ($login === $poprawny_login && $haslo === $poprawne_haslo) {
            $_SESSION['zalogowany'] = true;
            $_SESSION['uzytkownik'] = $login;
        } else {
            $blad_logowania = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Logowanie</title>
</head>
<body>
<?php
if (isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] === true) {
    echo '<p>Zalogowano pomyślnie.</p>';
    echo '<a href="' . $_SERVER['PHP_SELF'] . '?logout=true">Wyloguj</a>';
} else {
    if (isset($blad_logowania)) {
        echo "<p style='color: red;'>Błędny login lub hasło.</p>";
    }

    echo '<h2>Logowanie</h2>';
    echo '<form method="post">';
    echo 'Login: <input type="text" name="login"><br>';
    echo 'Hasło: <input type="password" name="haslo"><br><br>';
    echo '<input type="submit" value="Zaloguj">';
    echo '</form>';
}
?>
</body>
</html>
