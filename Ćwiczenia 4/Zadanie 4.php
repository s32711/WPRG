<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 4</title>
    <style>
        .box {
            width: 100%;
            height: 50%;
            position: absolute;
        }
        .white-block {
            background-color: white;
            z-index: 2;
            top: 0;
            left: 0;
        }
        .red-block {
            background-color: red;
            z-index: 1;
            bottom: 0;
            left: 0;
        }
        .orange-text {
            color: orange;
            z-index: 3;
            position: relative;
            text-align: center;
            line-height: 200px;
        }
        .container {
            position: relative;
            height: 200px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="box white-block"></div>
    <div class="box red-block"></div>
    <p class="orange-text">Hello world!</p>
</div>
</body>
</html>