<?php
$doceloweOdwiedziny = 3;

if (isset($_POST['reset'])) {
    setcookie('odwiedziny', '');
    echo 'Wyzerowano licznik.';
    exit();
}

$odwiedziny = isset($_COOKIE['odwiedziny']) ? (int)$_COOKIE['odwiedziny'] : 0;
$odwiedziny++;
setcookie('odwiedziny', $odwiedziny);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Licznik odwiedzin</title>
</head>
<body>
<p>Liczba odwiedzin: <?php echo $odwiedziny; ?></p>

<?php
    if ($odwiedziny >= $doceloweOdwiedziny) {
        echo 'Osiągnięto ' . $doceloweOdwiedziny . ' odwiedzin!';
    }
?>

<form method="post">
    <input type="submit" name="reset" value="Zresetuj licznik">
</form>
</body>
</html>
