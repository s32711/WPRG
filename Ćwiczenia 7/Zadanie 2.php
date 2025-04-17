<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 2</title>
</head>
<body>
<?php
function dollar($tablica, $n){

    if ($n > count($tablica)-1 || $n < 0) {
        echo "BŁĄD";
        return;
    }

    array_splice($tablica, $n, 0, "$");
    print_r($tablica);
}
$tablica = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
dollar($tablica, 5);
?>
</body>
</html>