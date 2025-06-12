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

$blad = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tytul = isset($_POST['tytul']) ? $_POST['tytul'] : '';
    $tresc = isset($_POST['tresc']) ? $_POST['tresc'] : '';
    $obrazek = $post['image'];

    if (!empty($_FILES['obrazek']['name'])) {
        $nazwa_pliku = basename($_FILES['obrazek']['name']);
        $sciezka_docelowa = 'zdjecia/' . time() . '_' . $nazwa_pliku;

        if (!move_uploaded_file($_FILES['obrazek']['tmp_name'], $sciezka_docelowa)) {
            $blad = "Nie udało się przesłać obrazka.";
        } else {
            $obrazek = $sciezka_docelowa;
        }
    }

    if ($tytul && $tresc && !$blad) {
        $stmt = $pdo->prepare("UPDATE posts SET title = ?, content = ?, image = ? WHERE id = ?");
        $stmt->execute([$tytul, $tresc, $obrazek, $id]);

        header("Location: strona_glowna.php");
        exit;
    } elseif (!$blad) {
        $blad = "Wszystkie pola są wymagane.";
    }
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Edytuj post</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Edytuj post</h2>

<form method="post" enctype="multipart/form-data">
    <label>Tytuł: <input type="text" name="tytul" value="<?= $post['title']?>"></label><br>
    <label>Treść: <textarea name="tresc" rows="6" cols="50"><?= $post['content'] ?></textarea></label><br>
    <label>Nowy obrazek (jeśli chcesz zmienić): <input type="file" name="obrazek"></label><br>
    <button type="submit">Zapisz zmiany</button>
</form>

<p style="color:red"><?= $blad ?></p>

</body>
</html>
