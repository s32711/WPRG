<!DOCTYPE html>
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
        <label>Ścieżka: </label>
        <input type="text" name="sciezka" value="./php/images/">
    </div>
    <div>
        <label>Nazwa katalogu: </label>
        <input type="text" name="nazwa" required>
    </div>
    <div>
        <label>Operacja: </label>
            <select name="operacja">
                <option value="odczyt">Odczytaj</option>
                <option value="tworzenie">Utwórz</option>
                <option value="usuwanie">Usuń</option>
            </select>
    </div>
    <input type="submit" value="Dalej">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sciezka = $_POST['sciezka'];
    $nazwa = $_POST['nazwa'];
    $operacja = $_POST['operacja'];

    function Katalog($sciezka, $nazwa, $operacja = 'read') {
        if (substr($sciezka, -1) !== '/') {
            $sciezka .= '/';
        }

        $pelnaSciezka = $sciezka . $nazwa;

        switch ($operacja) {
            case 'odczyt':
                if (!is_dir($pelnaSciezka)) {
                    return "Katalog $pelnaSciezka nie istnieje.";
                }
                $zawartosc = scandir($pelnaSciezka);
                $zawartosc = array_diff($zawartosc, ['.', '..']);
                if (empty($zawartosc)) {
                    return "Katalog $pelnaSciezka jest pusty.";
                }
                return "Zawartość katalogu $pelnaSciezka:<ul><li>" . implode("</li><li>", $zawartosc) . "</li></ul>";

            case 'tworzenie':
                if (is_dir($pelnaSciezka)) {
                    return "Katalog $pelnaSciezka już istnieje.";
                }
                if (mkdir($pelnaSciezka)) {
                    return "Katalog $pelnaSciezka został utworzony.";
                } else {
                    return "Nie udało się utworzyć katalogu $pelnaSciezka.";
                }

            case 'usuwanie':
                if (!is_dir($pelnaSciezka)) {
                    return "Katalog $pelnaSciezka nie istnieje.";
                }
                $zawartosc = array_diff(scandir($pelnaSciezka), ['.', '..']);
                if (!empty($zawartosc)) {
                    return "Nie można usunąć katalogu $pelnaSciezka – katalog nie jest pusty.";
                }
                if (rmdir($pelnaSciezka)) {
                    return "Katalog $pelnaSciezka został usunięty.";
                } else {
                    return "Nie udało się usunąć katalogu $pelnaSciezka.";
                }

            default:
                return "Nieznana operacja: $operacja";
        }
    }
    echo Katalog($sciezka, $nazwa, $operacja);
}
?>
</body>
</html>
