<?php
$zaglosowano = false;
$wybor = "";

if (isset($_COOKIE['zaglosowano'])) {
    $zaglosowano = true;
    $wybor = $_COOKIE['zaglosowano'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$zaglosowano) {
    if (isset($_POST['option']) && $_POST['option'] !== "") {
        $wybor = $_POST['option'];
        setcookie('zaglosowano', $wybor, time() + 10);
        echo 'Oddano głos!';
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Sonda internetowa</title>
</head>
<body>
<h1>Ananas na pizzy: Tak czy nie?</h1>

<?php
if ($zaglosowano) {
    echo "<p>Dziękujemy za oddanie głosu!</p>";
    echo "<p>Twój wybór to: <strong>" . $wybor . "</strong></p>";
} else {
    echo '<form method="post">';
    echo '<input type="radio" name="option" value="Tak">Tak<br>';
    echo '<input type="radio" name="option" value="Nie">Nie<br>';
    echo '<input type="radio" name="option" value="Nie mam zdania">Nie mam zdania<br>';
    echo '<input type="submit" value="Głosuj">';
    echo '</form>';
}
?>
</body>
</html>
