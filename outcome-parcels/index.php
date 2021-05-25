<?php

function printArray($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

if (empty($_COOKIE['user']))
{
    header('Location: /');
}

require $_SERVER['DOCUMENT_ROOT'].'/src/php/connection.php';

$goods = Database::select(
    '`outcoming-parcels`,
    `outcome-parcels-goods`,
    `products`',

    '`outcoming-parcels`.`id` as "outcome-id",
    `outcoming-parcels`.`date` as "outcome-date",
    `products`.`id` as "product-id",
    `products`.`name` as "product-name",
    `products`.`image` as "product-image",
    `outcome-parcels-goods`.`quantity` as "product-quantity"',

    '`outcome-parcels-goods`.`id-outcome` = `outcoming-parcels`.`id` AND
     `outcome-parcels-goods`.`id-product` = `products`.`id`
    ORDER BY `outcoming-parcels`.`date` DESC'
);

//printArray($goods);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Отгрузить товары со склада - система складского учёта CompCity</title>

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="/dist/css/main.css">

    <link rel="stylesheet" href="/dist/css/outcome-parsel.css">
</head>
<body>

<? require $_SERVER['DOCUMENT_ROOT'].'/includes/header/header.php'?>
    <div class="container-1440">
        <h2 class="page-title">Отгрузить товары</h2>

        <button id="new-outcome">Новая отгрузка</button>

        <div class="outcoming-list">
            <?
            foreach ($goods as $outcomeItem)
            {?>
                <div class="outcome-item">
                    <p class="outcome-item__date"><?=$outcomeItem['outcome-date']?></p>

                    <p class="outcome-item__name"><?=$outcomeItem['product-name']?></p>

                    <img src="<?=$outcomeItem['product-image']?>" class="outcome-item__image">

                    <p class="outcome-item__quantity">Отгружено со склада: <span><?=$outcomeItem['product-quantity']?></span></p>
                </div>
            <?}
            ?>
        </div>
    </div>
<? require $_SERVER['DOCUMENT_ROOT'].'/includes/footer/footer.php'?>
