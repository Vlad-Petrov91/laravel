<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel course</title>
</head>
<body>

<?php include_once "news/menu.php"; ?>

<h2>Авторизация</h2>
<form action="post">
    <label for="login">Login:</label><br>
    <input type="text" id="login" name="login"><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password"><br>
    <input type="submit" value="Войти">
</form>
</body>
</html>
