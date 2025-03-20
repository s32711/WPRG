<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 1</title>
    <style>
        h1 + p {
            color: red;
        }
        div ul {
            background-color: blue;
        }
        a + span {
            color: green;
        }
        .container + h2{
            font-style: italic;
        }
        .title {
            margin-left: 40px;
        }
        .title + ul {
            background-color: yellow;
        }
    </style>
</head>
<body>
<h1>Tytuł</h1>
<p>Tekst</p>
<div>
    <ul>
        <li>Element 1</li>
        <li>Element 2</li>
    </ul>
</div>
<a href="">Link</a>
<span>tekst</span>
<p>tekst</p>
<div class="container"></div>
<h2>tytuł</h2>
<h3 class="title">Tytuł</h3>
<ul>
    <li>Element 1</li>
    <li>Element 2</li>
    <li>Element 3</li>
</ul>
</body>
</html>