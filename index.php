<?php
    if (!empty($_COOKIE['user']))
    {
        header('Location: /start/index.php');
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация - система складского учёта CompCity</title>

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="/dist/css/main.css">

    <link rel="stylesheet" href="/dist/css/auth.css">
</head>
<body>

<? require $_SERVER['DOCUMENT_ROOT'].'/includes/header/header.php'?>

    <div class="container-1440">
        <h2 class="hello-heading">Здравствуйте</h2>
        <p class="first">Для начала работы необходимо авторизоваться в системе. Давайте сделаем это ниже</p>

        <form class="auth" action="/src/php/auth-handler.php" method="POST">
            <div class="input-wrapper">
                <label for="login">Введите свой логин</label>
                <input type="text" name="login" placeholder="Логин" required>
            </div>

            <div class="input-wrapper">
                <label for="password">Введите свой пароль</label>
                <input type="password" name="password" placeholder="Пароль" required>
            </div>

            <input type="submit" value="Войти">
        </form>
    </div>
    
<? require $_SERVER['DOCUMENT_ROOT'].'/includes/footer/footer.php'?>