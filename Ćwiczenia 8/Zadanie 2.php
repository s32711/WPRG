<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 2</title>
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
    $wyczyszczony = preg_replace('/[\\\\\/:*?"<>|+]/', '', $ciag);

    echo "Wyczyszczony ciąg: " . $wyczyszczony;
}
?>
</body>
</html>