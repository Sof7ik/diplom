<?php
    if (empty($_COOKIE['user'])) {
        header('Location: /');
    }

    require $_SERVER['DOCUMENT_ROOT'].'/src/php/connection.php';

    $incomingParcels = Database::select('`products`, `incoming-parcels`, `income-parcels-goods`',
        '`incoming-parcels`.`id` AS "parcel-id", 
        `incoming-parcels`.`date` AS "parcel-date", 
        `products`.`name` AS "product-name",
        `products`.`image` as "product-image",
        `products`.`description` AS "product-desc",
        `income-parcels-goods`.`product-quantity` as "income-product-quantity"',
        '`income-parcels-goods`.`id-income` = `incoming-parcels`.`id` AND
        `income-parcels-goods`.`id-product` = `products`.`id`
        ORDER BY `incoming-parcels`.`date` DESC');

    $categories = Database::select(
        '`categories`'
    );
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Принять товары - система товароучёта CompCity</title>

    <link rel="shortcut icon" href="/favicon.ico" type="image/jpg">

    <link rel="stylesheet" href="/dist/css/main.css">

    <link rel="stylesheet" href="/dist/css/income-parcel.css">

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

<!--    <script defer src="/dist/js/open-newParcel-modal.min.js"></script>-->

    <script src="/src/js/open-newParcel-modal.js" defer></script>
</head>
<body>
<? require $_SERVER['DOCUMENT_ROOT'].'/includes/header/header.php'?>

<div class="container-1440">
    <h2 class="page-title">Вхоядщие привозки</h2>

    <button class="new-parcel" id="openNewParcelModal">
        <span>Новая привозка</span>
    </button>

    <div class="incoming-list">
        <?php
            foreach($incomingParcels as $parcel)
            {
                $dateTimeFormatter = new DateTime($parcel['parcel-date']);
                $normalDate = $dateTimeFormatter -> format('d.m.Y в H:m:s');

                ?>
                    <div class="income-item">
                        <p class="income-item-date"><?=$normalDate?></p>

                        <div class="income-item__product">
                            <?php
                                $imageSrc = $parcel['product-image'] == '' ? 
                                    'https://via.placeholder.com/120' : $parcel['product-image'];
                            ?>

                            <img src="<?=$imageSrc?>" alt="image" class="product-photo">

                            <div class="product-text">
                                <p class="product-text__name"><?=$parcel['product-name']?></p>

                                <p class="product-text__desc"><?=$parcel['product-desc']?></p>

                                <p class="product-text__quantity">
                                    Товара принято: <span><?=$parcel['income-product-quantity']?> шт.</span>
                                </p>
                            </div>
                        </div>
                    </div>
                <?
            }
        ?>
    </div>
</div>

<div class="new-income-parcel-modal">

    <div class="modal-content">
        <div class="content-wrapper">
            <h2 class="page-title">Принять новые товары</h2>

            <form action="/src/php/accept-new-parcel.php" method="POST" class="new-parcel-form">
                <div class="product-add-wrapper">
                    <div class="input-wrapper">
                        <label for="">Название товара</label>
                        <input type="text" name="product-name[]" id="" required>
                    </div>

                    <div class="input-wrapper">
                        <label for="">Количество</label>
                        <input type="number" name="product-quantity[]" id="" required>
                    </div>

                    <div class="input-wrapper">
                        <label for="">Категория</label>
                        <select name="product-category[]" id="" required>
                            <?php
                                foreach($categories as $cat)
                                {?>
                                    <option value="<?=$cat['id']?>"><?=$cat['name']?></option>
                                <?}
                            ?>
                        </select>
                    </div>
                </div>

                <button id="add-new-field">Добавить поле</button>

                <input type="submit" value="Принять" class="accept-parcel" id="accept-parcel-button">
            </form>
        </div>

        <img src="/src/icons/close-modal.svg" alt="close" id="close-modal">
    </div>

</div>

<? require $_SERVER['DOCUMENT_ROOT'].'/includes/footer/footer.php'?>