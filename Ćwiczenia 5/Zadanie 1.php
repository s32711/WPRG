<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 1</title>
    <style>
        #container {
            display: flex;
            width: 500px;
        }
        .flex-container {
            border: 2px solid;
            justify-content: space-between;
        }
        .column {
            text-align: center;
            background-color: lightblue;
            width: 150px;
            height: 200px;
            margin: 10px;
        }
        .flex-container2 {
            border: 2px solid;
            justify-content: center;
            height: 200px;
            align-items: center;
        }
        .box {
            text-align: center;
            align-content: center;
            width: 100px;
            height: 50px;
            margin: 10px;
            background-color: lightblue;
        }
    </style>
</head>
<body>
<div id="container" class="flex-container">
    <div class="column">Kolumna 1</div>
    <div class="column">Kolumna 2</div>
    <div class="column">Kolumna 3</div>
</div>
<hr>
<div id="container" class="flex-container2">
    <div class="box">Element 1</div>
    <div class="box">Element 2</div>
    <div class="box">Element 3</div>
</div>
</body>
</html>