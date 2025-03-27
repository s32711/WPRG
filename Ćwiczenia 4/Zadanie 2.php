<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 2</title>
    <style>
        form {
            display: block;
            margin: 0 auto;
            max-width: 500px;
            padding: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input {
            display: block;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 500px;
        }
        span {
            display: inline;
            width: 30px;
            text-align: center;
        }
        button {
            display: block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<form>
    <label>
        <input type="email" placeholder="e-mail">
        <input type="tel" placeholder="telefon">
        <input type="text" placeholder="imię i nazwisko">
    </label>
    <span>
        <button>Wyślij</button>
    </span>
</form>
</body>
</html>