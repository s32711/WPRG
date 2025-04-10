<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 1</title>
</head>
<body>
<?php
function numbers($liczba) {
    if (!is_numeric($liczba)) {
        echo "Parameter must be numeric!";
        return;
    }

    $liczba = abs($liczba);
    $ciag = str_replace(".", "", (string)$liczba);
    $liczba = (int)$ciag;

    while ($liczba >= 10) {
        $suma = 0;
        $ciag = (string)$liczba;
        for ($i = 0; $i < strlen($ciag); $i++) {
            $suma += (int)$ciag[$i];
        }
        $liczba = $suma;
    }

    echo $liczba;
}

numbers(5210.5);
?>

</body>
</html>