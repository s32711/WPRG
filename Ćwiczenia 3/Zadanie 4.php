<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 4</title>
    <style>
        .parent {
            background-color: lightgrey;
        }
        .grandchild {
            color: red;
            font-size: small;
        }
        .grandchild + .child {
            color: red;
        }
    </style>
</head>
<body>
<div class="parent">
    <div>Tekst w elemencie potomnym</div>
    <div>Tekst w elemencie potomnym</div>
    <div class="grandchild">Tekst w elemencie wnuku</div>
    <div class="child">Tekst w elemencie potomnym</div>
</div>
</body>
</html>