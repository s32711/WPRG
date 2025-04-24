<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 5</title>
    <style>
        div {
            display: block;
        }
    </style>
</head>
<body>
<form method="post">
    <div>
        <label>Wprowadź ciąg: </label>
        <input type="text" name="ciag">
    </div>
    <input type="submit" value="Dalej">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ciag = $_POST['ciag'];

    if (strpos($ciag, ',') !== false) {
        $po_przecinku = explode(',', $ciag);

        if (is_numeric($po_przecinku[0]) && is_numeric($po_przecinku[1])) {
            $liczba = strlen($po_przecinku[1]);
            echo "Liczba cyfr po przecinku: " . $liczba;
        } else {
            echo "Podany ciąg nie jest liczbą!";
        }

    } else {
        echo "Brak cyfr po przecinku!";
    }
}
?>
</body>
</html>