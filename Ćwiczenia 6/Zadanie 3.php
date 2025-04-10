<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 1</title>
</head>
<body>
<?php
function sequences($start, $modyfikator, $n){
    if ($n < 0) {
        echo "N must be positive number!";
        return;
    }

    if (!is_numeric($start) || !is_numeric($modyfikator) || !is_numeric($n)) {
        echo "Parameters must be numeric!";
        return;
    }

    echo "Arithmetic: ", $start;
    $next = $start;
    for ($i = 1; $i < $n; $i++) {
        $next += $modyfikator;
        echo ", ", $next;
    }

    echo "<br/>Geometric: ", $start;
    $next = $start;
    for ($i = 1; $i < $n; $i++) {
        $next *= $modyfikator;
        echo ", ", $next;
    }
}
sequences(5,2,10)
?>
</body>
</html>