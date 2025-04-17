<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 3</title>
</head>
<body>
<?php
function tablica($a, $b, $c, $d) {
    $tablica = [];
    if ($b < $a) {
        echo "Wartość b musi być większa lub równa a.\n";
        return;
    }

    if ($d < $c) {
        echo "Wartość d musi być większa lub równa c.\n";
        return;
    }

    $indeks = $a;
    $wartosc = $c;

    while ($indeks <= $b) {
        while ($wartosc <= $d && $indeks <= $b) {
            $tablica[$indeks] = $wartosc;
            $indeks++;
            $wartosc++;
        }
        $wartosc = $c;
    }
    
    print_r($tablica);
}

tablica(3, 10, 10, 14);
?>
</body>
</html>