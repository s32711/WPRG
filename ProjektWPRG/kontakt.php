<?php
require_once 'db.php';
require_once 'sesja.php';

if (!isset($_SESSION['uzytkownik_id'])) {
    die("Musisz być zalogowany, aby wysłać wiadomość.");
}

$autor_id = isset($_GET['autor_id']) ? (int)$_GET['autor_id'] : 0;

global $pdo;
$stmt = $pdo->prepare("SELECT username, email FROM users WHERE id = ?");
$stmt->execute([$autor_id]);
$autor = $stmt->fetch();

$wiadomosc = '';
$blad = '';
$sukces = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $wiadomosc = trim(isset($_POST['wiadomosc']) ? $_POST['wiadomosc'] : '');

    if ($wiadomosc) {
        $sukces = true;
    } else {
        $blad = "Wiadomość nie może być pusta.";
    }
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Kontakt z autorem</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<p><a href="strona_glowna.php">🏠 Strona główna</a></p>

<h2>Kontakt z autorem: <?= htmlspecialchars($autor['username']) ?></h2>

<?php if ($sukces): ?>
    <p style="color:green">✅ Wiadomość została wysłana.</p>
<?php else: ?>
    <form method="post">
        <label>Twoja wiadomość do autora:</label><br>
        <textarea name="wiadomosc" rows="6" cols="60"><?= htmlspecialchars($wiadomosc) ?></textarea><br>
        <button type="submit">📤 Wyślij wiadomość</button>
    </form>
    <p style="color:red"><?= htmlspecialchars($blad) ?></p>
<?php endif; ?>

</body>
</html>