<?php
    if (empty($_COOKIE['user']))
    {
        header('Location: /');
    }

    require $_SERVER['DOCUMENT_ROOT'].'/src/php/connection.php';

    $goodsList = Database::select(
            'products',
        '*'
    );
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Товары на складе - система складского учёта CompCity</title>

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="/dist/css/main.css">

    <link rel="stylesheet" href="/dist/css/edit-goods.css">

    <script src="/src/js/deleteProduct.js" defer></script>
    <script src="/src/js/editProduct-modal.js" defer></script>
</head>
<body>

<? require $_SERVER['DOCUMENT_ROOT'].'/includes/header/header.php'?>
    <div class="container-1440">
        <h2 class="page-title">Товары на складе</h2>

        <div class="goods-list">
            <?php
                foreach ($goodsList as $goodItem)
                {
                    $imageSrc = $goodItem['image'] == '' ? 'https://via.placeholder.com/150' : $goodItem['image'];
                    ?>
                    <div class="product-item" data-product-id="<?=$goodItem['id']?>">

                        <div class="up-product-info">
                            <img src="<?=$imageSrc?>" alt="product-image">

                            <div class="product-text">
                                <p class="product-item__name"><?=$goodItem['name']?></p>

                                <p class="product-item__desc"><?=$goodItem['description']?></p>
                            </div>
                        </div>

                        <p class="product-quantity">Количество на складе: <span><?=$goodItem['quantity']?></span></p>

                        <div class="buttons">
                            <button class="manage-button delete">Удалить</button>
                            <button class="manage-button edit">Изменить</button>
                        </div>
                    </div>
                <?}
            ?>
        </div>
    </div>

    <div class="edit-product-modal">
        <form class="content-wrapper">
            <img src="/src/icons/close-modal.svg" alt="close" class="close-modal">

            <input type="hidden" name="product-id" value="" id="product-id">

            <div class="input-wrapper">
                <label for="product-name">Навзание товара</label>
                <input type="text" value="" id="product-name" name="product-name" required>
            </div>

            <div class="input-wrapper">
                <label for="product-desc">Описание товара</label>
                <textarea id="product-desc" name="product-desc" required></textarea>
            </div>

            <div class="input-wrapper">
                <label for="product-quantity">Количество товара на складе</label>
                <input type="number" value="" id="product-quantity" min="1" name="product-quantity" required>
            </div>

            <div class="input-wrapper image">
                <label for="product-image">Изображение товара</label>
                <img src="" alt="product-old-image" id="product-old-image">
                <input type="url" name="product-new-image" id="" required placeholder="Ссылка на новую картинку">
            </div>

            <input type="submit" value="Изменить" id="editProductButton">
        </form>
    </div>
<? require $_SERVER['DOCUMENT_ROOT'].'/includes/footer/footer.php'?>