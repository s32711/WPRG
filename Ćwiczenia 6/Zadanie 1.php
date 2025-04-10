<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 1</title>
</head>
<body>
<?php
function print_primes($a, $b) {

    if (!is_numeric($a) || !is_numeric($b)) {
        echo "Start and stop must be numeric!";
        return;
    }

    if ($a < 0 || $b < 0) {
        echo "Start and stop must be positive number! Given ", $a, ", ", $b, "!";
        return;
    }

    $poczatek = round(min($a, $b));
    $koniec = round(max($a, $b));

    for ($i = $poczatek; $i <= $koniec; $i++) {
        if ($poczatek < 2) continue;
        $dzielniki = 0;

        for ($j = 2; $j < $i; $j++) {
            if ($i % $j == 0) {
                $dzielniki++;
            }
        }
        if ($dzielniki == 0) {
            echo $i, " ";
        }
    }
}
print_primes(5, 10);
?>
</body>
</html>