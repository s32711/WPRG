<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "cwiczenia_12";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if (isset($_POST['usun'])) {
    $conn->query("DROP TABLE IF EXISTS osoby");
    echo "Tabela została usunięta.<br>";
}

$conn->query("CREATE TABLE IF NOT EXISTS student (
    StudentID INT AUTO_INCREMENT PRIMARY KEY,
    Firstname VARCHAR(255),
    Secondname VARCHAR(255),
    Salary INT,
    DateOfBirth DATE
)");

echo "Tabela została utworzona.<br>";

$conn->close();
?>

<form method="POST">
    <h1>Zarządzanie tabelą</h1>
    <button type="submit" name="usun">Usuń tabelę</button>
</form>
