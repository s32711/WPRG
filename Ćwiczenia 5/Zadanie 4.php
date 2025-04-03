<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 4</title>
    <style>
        header {
            display: flex;
            background-color: lightgrey;
            justify-content: center;
        }
        nav {
            width: 100%;
        }
        ul {
            display: flex;
            list-style: none;
            justify-content: space-around;
        }
        a {
            text-decoration: none;
            color: black;
        }
        .div-main {
            display: flex;
            justify-content: space-between;
            margin: 40px;
        }
        h1 {
            margin-top: 0;
        }
        .funkcje {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: repeat(2, 1fr);
            gap: 40px;
        }
        .box {
            border: solid 1px;
            padding-left: 10px;
        }
        .funkcja3 {
            grid-column: span 2;
        }
        .dodatkowe-informacje {
            grid-row: span 2;
            width: 300px;
        }
        footer {
            text-align: center;
            background-color: lightgrey;
            height: 50px;
            align-content: center;
        }
    </style>
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="#">Strona główna</a></li>
            <li><a href="#">O nas</a></li>
            <li><a href="#">Kontakt</a></li>
        </ul>
    </nav>
</header>
<div class="div-main">
    <h1>Witaj na naszej<br>skomplikowanej<br>stronie!</h1>
    <div class="funkcje">
        <div class="box">
            <h2>Funkcja 1</h2>
            <p>Opis funkcji 1...</p>
        </div>
        <div class="box">
            <h2>Funkcja 2</h2>
            <p>Opis funkcji 2...</p>
        </div>
        <div class="box dodatkowe-informacje">
            <h2>Dodatkowe informacje</h2>
            <p>...</p>
        </div>
        <div class="box funkcja3">
            <h2>Funkcja 3</h2>
            <p>Opis funkcji 3...</p>
        </div>
    </div>
</div>
<footer>&#169 2023 Skomplikowana strona z flexboxem. Wszelkie prawa zastrzeżone.</footer>
</body>
</html>