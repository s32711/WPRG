<?php
require_once 'db.php';

$blad = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    if ($email) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user) {
            header("Location: reset_hasla_zmien.php?id=" . $user['id']);
            exit;
        } else {
            $blad = "Nie znaleziono konta z tym adresem e-mail.";
        }
    } else {
        $blad = "Podaj adres e-mail.";
    }
}
?>
<head>
    <meta charset="UTF-8">
    <title>Reset</title>
    <link rel="stylesheet" href="style.css">
</head>

<h2>Resetowanie hasła</h2>
<form method="post">
    <label>Email: <input type="email" name="email"></label><br>
    <button type="submit">Dalej</button>
</form>
<p style="color:red"><?= $blad ?></p>