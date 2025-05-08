<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 4</title>
</head>
<body>
<?php
$plik = "linki.txt";

if (!file_exists($plik)) {
    echo "<p>Plik z linkami nie istnieje.</p>";
    exit;
}

$linie = file($plik);

echo "<h1>Lista odnośników:</h1>";
echo "<ul>";

foreach ($linie as $wiersz) {
    $separator = explode(";", $wiersz);

    if (count($separator) === 2) {
        $adres = trim($separator[0]);
        $opis = trim($separator[1]);

        echo "<li><a href=\"$adres\">$opis</a></li>";
    }
}
echo "</ul>";
?>
</body>
</html>