<?php
    if (empty($_COOKIE['user']))
    {
        header('Location: /');
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Начало работы - система складского учёта CompCity</title>

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="/dist/css/main.css">

    <link rel="stylesheet" href="/dist/css/welcome.css">
</head>
<body>

<? require $_SERVER['DOCUMENT_ROOT'].'/includes/header/header.php'?>

    <div class="container-1440">
        <h2 class="hello-heading">Добро пожаловать</h2>

        <h3 class="what-we-do">С чего начнём?</h3>

        <div class="to-do-variants">
            <a href="/income-parcel/" class="to-do-variant">
                <img src="/src/icons/income-parcel.svg" alt="incoming" class="to-do-variant__icon">
                
                <p class="to-do-variant__name">Принять товары</p>
            </a>

            <a class="to-do-variant">
                <img src="/src/icons/outcome-parcel.svg" alt="incoming" class="to-do-variant__icon">

                <p class="to-do-variant__name">Отгрузить товары</p>
            </a>

            <a class="to-do-variant">
                <img src="/src/icons/inventarization.png" alt="incoming" class="to-do-variant__icon">

                <p class="to-do-variant__name">Провести инвентаризацию</p>
            </a>

            <a class="to-do-variant">
                <img src="/src/icons/edit-goods.png" alt="incoming" class="to-do-variant__icon">

                <p class="to-do-variant__name">Изменить товары</p>
            </a>
        </div>
    </div>
    
<? require $_SERVER['DOCUMENT_ROOT'].'/includes/footer/footer.php'?>