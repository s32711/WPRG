<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 3</title>
</head>
<body>
<h1>Odwiedzono stronę</h1>
<?php
$plik = 'licznik.txt';
if (!file_exists($plik)) {
    file_put_contents($plik, "1");
}

$liczba = (int) file_get_contents($plik);
$liczba++;

file_put_contents($plik, $liczba);

echo "<h2>Liczba odwiedzin: $liczba</h2>";
?>
</body>
</html>