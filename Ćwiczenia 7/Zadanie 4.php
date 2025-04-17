<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 4</title>
    <style>
        div {
            display: block;
        }
        th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<form method="post">
    <div>
        <label>Imię: </label>
        <input type="text" name="imie" required>
    </div>
    <div>
        <label>Nazwisko: </label>
        <input type="text" name="nazwisko" required>
    </div>
    <div>
        <label>Adres email: </label>
        <input type="email" name="email" required>
    </div>
    <div>
        <label>Hasło: </label>
        <input type="password" name="haslo" required>
    </div>
    <div>
        <label>Potwierdź hasło: </label>
        <input type="password" name="potwhaslo" required>
    </div>
    <div>
        <label>Wiek: </label>
        <input type="number" name="wiek" required>
    </div>
    <button type="submit">Zarejestruj się</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$email = $_POST['email'];
$haslo = $_POST['haslo'];
$potwhaslo = $_POST['potwhaslo'];
$wiek = $_POST['wiek'];

    if ($haslo !== $potwhaslo) {
        echo "Hasła nie są takie same!";
        return;
    }else{
        echo "<table>
<tr>
<th>Imię:</th>
<td>$imie</td>
</tr>

<tr>
<th>Nazwisko:</th>
<td>$nazwisko</td>
</tr>

<tr>
<th>Email:</th>
<td>$email</td>
</tr>

<tr>
<th>Hasło:</th>
<td>$haslo</td>
</tr>

<tr>
<th>Wiek:</th>
<td>$wiek</td>
</tr>
</table>";
    }
}
?>
</body>
</html>