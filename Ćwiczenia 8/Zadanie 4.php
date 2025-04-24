<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 4</title>
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
    $ciag = strtolower($_POST['ciag']);
    $liczba = preg_match_all('/[aeiou]/', $ciag);
    echo "Liczba samogłosek: " . $liczba;
}
?>
</body>
</html>