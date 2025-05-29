<?php
$db = new PDO("mysql:host=localhost;dbname=cwiczenia_12", "root", "");

$db->exec("CREATE TABLE IF NOT EXISTS Person (
    Person_id INT AUTO_INCREMENT PRIMARY KEY,
    Person_firstname VARCHAR(255),
    Person_secondname VARCHAR(255)
)");

$db->exec("CREATE TABLE IF NOT EXISTS Cars (
    Cars_id INT AUTO_INCREMENT PRIMARY KEY,
    Cars_model VARCHAR(255),
    Cars_price FLOAT,
    Cars_day_of_buy DATETIME,
    Person_id INT,
    FOREIGN KEY (Person_id) REFERENCES Person(Person_id)
)");

if (isset($_POST['dodaj_osobe'])) {
    $statement = $db->prepare("INSERT INTO Person (Person_firstname, Person_secondname) VALUES (?, ?)");
    $statement->execute([$_POST['imie'], $_POST['nazwisko']]);
    echo "Dodano osobę.<br>";
}

if (isset($_POST['dodaj_auto'])) {
    $statement = $db->prepare("INSERT INTO Cars (Cars_model, Cars_price, Cars_day_of_buy, Person_id) VALUES (?, ?, ?, ?)");
    $statement->execute([$_POST['model'], $_POST['cena'], $_POST['data_zakupu'], $_POST['person_id']]);
    echo "Dodano auto.<br>";
}

if (isset($_GET['usun_osobe'])) {
    $statement = $db->prepare("DELETE FROM Person WHERE Person_id = ?");
    $statement->execute([$_GET['usun_osobe']]);
    echo "Usunięto osobę.<br>";
}

if (isset($_GET['usun_auto'])) {
    $statement = $db->prepare("DELETE FROM Cars WHERE Cars_id = ?");
    $statement->execute([$_GET['usun_auto']]);
    echo "Usunięto auto.<br>";
}

if (isset($_POST['edytuj_osobe'])) {
    $statement = $db->prepare("UPDATE Person SET Person_firstname = ?, Person_secondname = ? WHERE Person_id = ?");
    $statement->execute([$_POST['edytuj_imie'], $_POST['edytuj_nazwisko'], $_POST['edytuj_id']]);
    echo "Zmieniono dane osoby.<br>";
}

$gdzie = "";
$porzadek = "";
if (!empty($_GET['szukaj'])) {
    $gdzie = "WHERE Person_firstname LIKE '%" . $_GET['szukaj'] . "%'";
}
if (!empty($_GET['sortuj'])) {
    $porzadek = "ORDER BY " . $_GET['sortuj'];
}

$person = $db->query("SELECT * FROM Person $gdzie $porzadek")->fetchAll(PDO::FETCH_ASSOC);
$cars = $db->query("SELECT Cars.Cars_id, Cars.Cars_model, Cars.Cars_price, Cars.Cars_day_of_buy, Person.Person_firstname 
                    FROM Cars 
                    LEFT JOIN Person ON Cars.Person_id = Person.Person_id")->fetchAll(PDO::FETCH_ASSOC);
$personList = $db->query("SELECT * FROM Person")->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Dodaj osobę</h2>
<form method="POST">
    Imię: <input type="text" name="imie">
    Nazwisko: <input type="text" name="nazwisko">
    <input type="submit" name="dodaj_osobe" value="Dodaj osobę">
</form>

<h2>Dodaj auto</h2>
<form method="POST">
    Model: <input type="text" name="model">
    Cena: <input type="number" step="0.01" name="cena">
    Data zakupu: <input type="datetime-local" name="data_zakupu">
    Właściciel:
    <select name="person_id">
        <?php foreach ($personList as $p): ?>
            <option value="<?= $p['Person_id'] ?>">
                <?= $p['Person_firstname'] . " " . $p['Person_secondname'] ?>
            </option>
        <?php endforeach; ?>
    </select>
    <input type="submit" name="dodaj_auto" value="Dodaj auto">
</form>

<h2>Wyszukiwanie osób</h2>
<form method="GET">
    Szukaj imienia: <input type="text" name="szukaj">
    Sortuj według:
    <select name="sortuj">
        <option value="">-- wybierz --</option>
        <option value="Person_firstname">Imię</option>
        <option value="Person_secondname">Nazwisko</option>
    </select>
    <input type="submit" value="Szukaj/Sortuj">
</form>

<h2>Osoby</h2>
<table border="1">
    <tr><th>ID</th><th>Imię</th><th>Nazwisko</th><th>Usuń</th><th>Edytuj</th></tr>
    <?php foreach ($person as $p): ?>
        <tr>
            <td><?= $p['Person_id'] ?></td>
            <td><?= $p['Person_firstname'] ?></td>
            <td><?= $p['Person_secondname'] ?></td>
            <td><a href="?usun_osobe=<?= $p['Person_id'] ?>">Usuń</a></td>
            <td>
                <form method="GET" style="display:inline;">
                    <input type="hidden" name="tryb_edycji" value="<?= $p['Person_id'] ?>">
                    <input type="submit" value="Edytuj">
                </form>
            </td>
        </tr>

        <?php if (isset($_GET['tryb_edycji']) && $_GET['tryb_edycji'] == $p['Person_id']): ?>
            <tr>
                <td colspan="5">
                    <form method="POST">
                        <input type="hidden" name="edytuj_id" value="<?= $p['Person_id'] ?>">
                        Imię: <input type="text" name="edytuj_imie" value="<?= $p['Person_firstname'] ?>">
                        Nazwisko: <input type="text" name="edytuj_nazwisko" value="<?= $p['Person_secondname'] ?>">
                        <input type="submit" name="edytuj_osobe" value="Zapisz zmiany">
                    </form>
                </td>
            </tr>
        <?php endif; ?>

    <?php endforeach; ?>
</table>


<h2>Auta</h2>
<table border="1">
    <tr><th>ID</th><th>Model</th><th>Cena</th><th>Data zakupu</th><th>Właściciel</th><th>Usuń</th></tr>
    <?php foreach ($cars as $c): ?>
        <tr>
            <td><?= $c['Cars_id'] ?></td>
            <td><?= $c['Cars_model'] ?></td>
            <td><?= $c['Cars_price'] ?></td>
            <td><?= $c['Cars_day_of_buy'] ?></td>
            <td><?= $c['Person_firstname'] ?></td>
            <td><a href="?usun_auto=<?= $c['Cars_id'] ?>">Usuń</a></td>
        </tr>
    <?php endforeach; ?>
</table>