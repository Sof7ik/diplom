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

$productsArray = Database::select(
    '`products`, `categories`',
    '`products`.`id` as "product-id",
    `products`.`name` as "product-name"',
    '`products`.`cat-id` = `categories`.`id`'
);

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

// printArray($productsArray);

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

    <script src="/src/js/outcome-parcel-modal.js" defer></script>
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

    <div class="outcome-modal">
        <div class="modal-content">
            <div class="modal-title">
                <h2 class="modal-title">Создать новую отгрузку товаров</h2>

                <img src="/src/icons/close-modal.svg" alt="close" id="close-outcome-parcel">
            </div>

            <form action="/src/php/newOutcomeParcel.php" method="POST">
                <div class="input-wrapper">
                    <label for="products-list">Введите название товара</label>

                    <input list="products-1" id="products-list-1" name="product-id[]"/>

                    <datalist id="products-1">
                        <?
                            foreach($productsArray as $product)
                            {?>
                                <option value="<?=$product['product-id']?>"><?=$product['product-name']?></option>
                            <?}
                        ?>
                    </datalist>

                    <input type="number" name="product-quantity[]" id="" min="1" value="1">
                </div>   
                
                <input type="submit" value="Создать отгрузку" id="submit-btn">
            </form>

            <button id="add-new-field">Добавить поле</button>
        </div>
    </div>
<? require $_SERVER['DOCUMENT_ROOT'].'/includes/footer/footer.php'?>
