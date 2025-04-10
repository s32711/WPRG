<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 1</title>
</head>
<body>
<?php
function macierze($a, $b) {
    $wiersze_a = count($a);
    $kolumny_a = count($a[0]);
    $wiersze_b = count($b);
    $kolumny_b = count($b[0]);

    if ($kolumny_a !== $wiersze_b) {
        echo "Błędne wymiary macierzy!";
        return;
    }

    $wynik = array();
    for ($i = 0; $i < $wiersze_a; $i++) {
        for ($j = 0; $j < $kolumny_b; $j++) {
            $wynik[$i][$j] = 0;
            for ($k = 0; $k < $kolumny_a; $k++) {
                $wynik[$i][$j] += $a[$i][$k] * $b[$k][$j];
            }
        }
    }

    foreach ($wynik as $wiersz) {
        foreach ($wiersz as $wartosc) {
            echo $wartosc, " ";
        }
        echo "<br/>";
    }

}
$macierz_a = [
    [1, 2, 3],
    [3, 4, 5]
];

$macierz_b = [
    [5, 6],
    [7, 8],
    [9, 9]
];

macierze($macierz_a, $macierz_b);
?>
</body>
</html>