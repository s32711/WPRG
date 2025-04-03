<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 3</title>
    <style>
        div {
            height: 50px;
            margin: 5px;
            align-content: center;
        }
        .row {
            display: flex;
        }
        .equal-width {
            flex: 1;
            text-align: center;
            background-color: lightblue;
        }
        .row2 {
            display: flex;
        }
        .fixed-percentage {
            width: 40%;
            text-align: center;
            background-color: lightblue;
        }
        .flexible {
            flex: 1;
            text-align: center;
            background-color: lightblue;
        }
    </style>
</head>
<body>
<div class="row">
    <div class="equal-width">Element 1</div>
    <div class="equal-width">Element 2</div>
    <div class="equal-width">Element 3</div>
</div>
<div class="row2">
    <div class="fixed-percentage">Element 4</div>
    <div class="flexible">Element 5</div>
</div>
</body>
</html>