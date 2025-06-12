<?php
require_once 'db.php';
require_once 'sesja.php';

if (!isset($_SESSION['uzytkownik_id']) || !in_array($_SESSION['rola'], ['admin', 'author'])) {
    die("Brak dostępu!");
}

$blad = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tytul = isset($_POST['tytul']) ? $_POST['tytul'] : '';
    $tresc = isset($_POST['tresc']) ? $_POST['tresc'] : '';
    $obrazek_nazwa = null;

    if (!empty($_FILES['obrazek']['name'])) {
        $nazwa_pliku = basename($_FILES['obrazek']['name']);
        $sciezka_docelowa = 'zdjecia/' . time() . '_' . $nazwa_pliku;

        if (!move_uploaded_file($_FILES['obrazek']['tmp_name'], $sciezka_docelowa)) {
            $blad = "Nie udało się przesłać obrazka.";
        } else {
            $obrazek_nazwa = $sciezka_docelowa;
        }
    }

    if ($tytul && $tresc && !$blad) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO posts (title, content, image, author_id) VALUES (?, ?, ?, ?)");
        $stmt->execute([$tytul, $tresc, $obrazek_nazwa, $_SESSION['uzytkownik_id']]);

        header("Location: strona_glowna.php");
        exit;
    } elseif (!$blad) {
        $blad = "Tytuł i treść są wymagane.";
    }
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dodaj nowy post</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Dodaj nowy post</h2>

<form method="post" enctype="multipart/form-data">
    <label>Tytuł: <input type="text" name="tytul" value="<?= isset($_POST['tytul']) ? $_POST['tytul'] : '' ?>"></label><br>
    <label>Treść: <textarea name="tresc" rows="6" cols="50"><?= isset($_POST['tresc']) ? $_POST['tresc'] : '' ?></textarea></label><br>
    <label>Obrazek (opcjonalnie): <input type="file" name="obrazek"></label><br>
    <button type="submit">Dodaj post</button>
</form>

<p style="color:red"><?= $blad ?></p>

</body>
</html>
