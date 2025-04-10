<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 1</title>
</head>
<body>
<?php
function pangram($ciag){
    $tablica_ciagu = str_split($ciag);
    $n = count($tablica_ciagu);

    $alfabet = "ABCDEFGHIJKLMNOPRSTUVWXYZabcdefghijklmnoprstuvwxyz";
    $tablica_liter = str_split($alfabet);

    $znalezione_litery = 0;

    for ($i = 0; $i <= 48; $i++) {
        $szukana = $tablica_liter[$i];
        $wystapienia_litery = 0;
        for ($j = 0; $j < $n; $j++) {
            if ($szukana == $tablica_ciagu[$j]) {
                $wystapienia_litery++;
            }
        }
        if ($wystapienia_litery > 0) {
            $znalezione_litery++;
        }
    }
    if ($znalezione_litery == 25) {
        echo "True";
    }else {
        echo "False";
    }
}
pangram("The quick brown fox jumps over the lazy dog.");
?>
</body>
</html>