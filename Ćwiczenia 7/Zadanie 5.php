<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 5</title>
    <style>
        .background {
            background-color: black;
            width: fit-content;
            height: fit-content;
        }

        .tekst {
            color: lightgrey;
        }
        p {
            color: lightgrey;
        }
    </style>
</head>
<body>
<div class="background">
    <h1 class="tekst">Kalkulator</h1>
    <hr class="tekst">
    <h2 class="tekst">Prosty</h2>
    <form method="post">
        <div>
            <input type="number" name="a">
            <select name="wybor">
                <option>Dodawanie</option>
                <option>Odejmowanie</option>
                <option>Mnożenie</option>
                <option>Dzielenie</option>
            </select>
            <input type="number" name="b">
        </div>
        <button type="submit" name="prosty">Oblicz</button>
    </form>
    <hr class="tekst">
    <h2 class="tekst">Zaawansowany</h2>
    <form method="post">
        <div>
            <input type="number" name="a">
            <select name="wybor">
                <option>Cosinus</option>
                <option>Sinus</option>
                <option>Tangens</option>
                <option>Binarne na dziesiętne</option>
                <option>Dziesiętne na binarne</option>
                <option>Dziesiętne na szesnastkowe</option>
                <option>Szesnastkowe na dziesiętne</option>
            </select>
        </div>
        <button type="submit" name="zaawansowany">Oblicz</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $wynik = 0;

        if (isset($_POST['prosty'])) {
            $a = $_POST['a'];
            $b = $_POST['b'];
            $wybor = $_POST['wybor'];

            switch ($wybor) {
                case "Dodawanie":
                    $wynik = $a + $b;
                    break;
                case "Odejmowanie":
                    $wynik = $a - $b;
                    break;
                case "Mnożenie":
                    $wynik = $a * $b;
                    break;
                case "Dzielenie":
                    if ($b == 0) {
                        echo "<p>Nie można dzielić przez 0!</p>";
                        return;
                    } else {
                        $wynik = $a / $b;
                    }
                    break;
            }
        }

        if (isset($_POST['zaawansowany'])) {
            $a = $_POST['a'];
            $wybor = $_POST['wybor'];

            switch ($wybor) {
                case "Cosinus":
                    $wynik = cos($a);
                    break;
                case "Sinus":
                    $wynik = sin($a);
                    break;
                case "Tangens":
                    $wynik = tan($a);
                    break;
                case "Binarne na dziesiętne":
                    if (preg_match('/^[01]+$/', $a)) {
                        $wynik = bindec($a);
                    } else {
                        echo "<p>Podaj poprawną liczbę binarną (tylko 0 i 1).</p>";
                        return;
                    }
                    break;
                case "Dziesiętne na binarne":
                    if (is_numeric($a)) {
                        $wynik = decbin($a);
                    } else {
                        echo "<p>Podaj poprawną liczbę dziesiętną.</p>";
                        return;
                    }
                    break;
                case "Dziesiętne na szesnastkowe":
                    if (is_numeric($a)) {
                        $wynik = dechex($a);
                    } else {
                        echo "<p>Podaj poprawną liczbę dziesiętną.</p>";
                        return;
                    }
                    break;
                case "Szesnastkowe na dziesiętne":
                    if (preg_match('/^[0-9a-fA-F]+$/', $a)) {
                        $wynik = hexdec($a);
                    } else {
                        echo "<p>Podaj poprawną liczbę szesnastkową (0-9, A-F).</p>";
                        return;
                    }
                    break;
            }
        }

        echo "<p>Wynik: $wynik</p>";
    }
    ?>

</div>
</body>
</html>