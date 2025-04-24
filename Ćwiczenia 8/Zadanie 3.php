<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 3</title>
    <style>
        div {
            display: block;
        }
        form {
            padding: 20px;
            border-radius: 10px;
            max-width: 400px;
            margin: auto;
        }
        select, input {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<form method="post">
<div>
    <label>Wprowadź ciąg: </label>
    <input type="text" name="ciag">
    <select name="wybor">
        <option value="odwrocenie">Odwrócenie ciągu</option>
        <option value="duze">Wielkie litery</option>
        <option value="male">Małe litery</option>
        <option value="liczenie">Liczenie znaków</option>
        <option value="usuwanie">Usuwanie białych znaków z początku i końca</option>
    </select>
</div>
    <input type="submit" value="Wykonaj">
</form>
<?php
$wynik = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ciag = $_POST["ciag"];
    $wybor = $_POST["wybor"];

    if (empty($ciag)) {
        echo "Ciąg nie może być pusty!";
    } else {
        switch ($wybor) {
            case "odwrocenie":
                $wynik = strrev($ciag);
                break;
            case "duze":
                $wynik = strtoupper($ciag);
                break;
            case "male":
                $wynik = strtolower($ciag);
                break;
            case "liczenie":
                $wynik = strlen($ciag);
                break;
            case "usuwanie":
                $wynik = trim($ciag);
                break;
        }
    }
    if (!empty($wynik)) {
        echo "<p>Wynik: " . $wynik . "</p>";
    }
}
?>
</body>
</html>