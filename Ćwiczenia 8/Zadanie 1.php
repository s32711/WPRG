<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 1</title>
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

    echo "Dużymi literami: " . strtoupper($ciag) . "<br>";
    echo "Małymi literami: " . strtolower($ciag) . "<br>";
    echo "Pierwsza litera dużą: " . ucfirst(strtolower($ciag)) . "<br>";
    echo "Pierwsze litery każdego słowa dużą: " . ucwords(strtolower($ciag)) . "<br>";
}
?>
</body>
</html>