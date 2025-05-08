<!DOCTYPE html>
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
<form method="get">
    <div>
        <label>Data urodzenia: </label>
        <input type="date" name="urodziny">
    </div>
    <input type="submit" value="Dalej">
</form>
<?php
if (!empty($_GET['urodziny'])) {
    $dataUrodzin = $_GET['urodziny'];
    list($rok, $miesiac, $dzien) = explode('-', $dataUrodzin);

    function dzienTygodnia($rok, $miesiac, $dzien) {
        $dni = ['niedziela', 'poniedziałek', 'wtorek', 'środa', 'czwartek', 'piątek', 'sobota'];
        $timestamp = mktime(0, 0, 0, $miesiac, $dzien, $rok);
        $dzienTyg = date("w", $timestamp);
        return $dni[$dzienTyg];
    }

    function ileLat($rok, $miesiac, $dzien) {
        $teraz = getdate();
        $wiek = $teraz['year'] - $rok;

        if ($teraz['mon'] < $miesiac || ($teraz['mon'] == $miesiac && $teraz['mday'] < $dzien)) {
            $wiek--;
        }

        return $wiek;
    }

    function dniDoUrodzin($miesiac, $dzien) {
        $teraz = getdate();
        $rok = $teraz['year'];

        $urodzinyTimestamp = mktime(0, 0, 0, $miesiac, $dzien, $rok);
        $terazTimestamp = mktime(0, 0, 0, $teraz['mon'], $teraz['mday'], $rok);

        if ($urodzinyTimestamp < $terazTimestamp) {
            $urodzinyTimestamp = mktime(0, 0, 0, $miesiac, $dzien, $rok + 1);
        }

        $roznicaSekund = $urodzinyTimestamp - $terazTimestamp;
        return floor($roznicaSekund / (60 * 60 * 24));
    }

    echo "Urodziłeś się w : ", dzienTygodnia($rok, $miesiac, $dzien);
    echo "<br>Masz lat: ", ileLat($rok, $miesiac, $dzien);
    echo "<br>Do Twoich najbliższych urodzin zostało: ", dniDoUrodzin($miesiac, $dzien), " dni.";
}
?>
</body>
</html>