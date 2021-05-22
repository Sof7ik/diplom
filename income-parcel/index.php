<?php
    if (empty($_COOKIE['user'])) {
        header('Location: /');
    }
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

    <script defer src="/dist/js/open-newParcel-modal.min.js"></script>
</head>
<body>
<? require $_SERVER['DOCUMENT_ROOT'].'/includes/header/header.php'?>

<div class="container-1440">
    <h2 class="page-title">Вхоядщие привозки</h2>

    <button class="new-parcel" id="openNewParcelModal">
        <span>Новая привозка</span>
    </button>

    <div class="income-date-wrapper">
        <p class="date">Сегодня</p>

        <div class="incoming-list">
            <div class="income-item">
                <p class="income-item-date">09:24:40</p>

                <div class="products">
                    <div class="income-item__product">
                        <img src="/src/images/test.jpg" alt="product-photo" class="product-photo">

                        <div class="product-text">
                            <p class="product-text__name">Товар 1</p>

                            <p class="product-text__desc">Товар 1 является товаром 1 потому что он товар 1</p>
                        </div>
                    </div>

                    <div class="income-item__product">
                        <img src="/src/images/test.jpg" alt="product-photo" class="product-photo">

                        <div class="product-text">
                            <p class="product-text__name">Товар 1</p>

                            <p class="product-text__desc">Товар 1 является товаром 1 потому что он товар 1</p>
                        </div>
                    </div>

                    <div class="income-item__product">
                        <img src="/src/images/test.jpg" alt="product-photo" class="product-photo">

                        <div class="product-text">
                            <p class="product-text__name">Товар 1</p>

                            <p class="product-text__desc">Товар 1 является товаром 1 потому что он товар 1</p>
                        </div>
                    </div>

                    <div class="income-item__product">
                        <img src="/src/images/test.jpg" alt="product-photo" class="product-photo">

                        <div class="product-text">
                            <p class="product-text__name">Товар 1</p>

                            <p class="product-text__desc">Товар 1 является товаром 1 потому что он товар 1</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="income-item">
                <p class="income-item-date">09:24:40</p>

                <div class="products">
                    <div class="income-item__product">
                        <img src="/src/images/test.jpg" alt="product-photo" class="product-photo">

                        <div class="product-text">
                            <p class="product-text__name">Товар 1</p>

                            <p class="product-text__desc">Товар 1 является товаром 1 потому что он товар 1</p>
                        </div>
                    </div>

                    <div class="income-item__product">
                        <img src="/src/images/test.jpg" alt="product-photo" class="product-photo">

                        <div class="product-text">
                            <p class="product-text__name">Товар 1</p>

                            <p class="product-text__desc">Товар 1 является товаром 1 потому что он товар 1</p>
                        </div>
                    </div>

                    <div class="income-item__product">
                        <img src="/src/images/test.jpg" alt="product-photo" class="product-photo">

                        <div class="product-text">
                            <p class="product-text__name">Товар 1</p>

                            <p class="product-text__desc">Товар 1 является товаром 1 потому что он товар 1</p>
                        </div>
                    </div>

                    <div class="income-item__product">
                        <img src="/src/images/test.jpg" alt="product-photo" class="product-photo">

                        <div class="product-text">
                            <p class="product-text__name">Товар 1</p>

                            <p class="product-text__desc">Товар 1 является товаром 1 потому что он товар 1</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="income-date-wrapper">
        <p class="date">Вчера</p>

        <div class="incoming-list">
            <div class="income-item">
                <p class="income-item-date">09:24:40</p>

                <div class="products">
                    <div class="income-item__product">
                        <img src="/src/images/test.jpg" alt="product-photo" class="product-photo">

                        <div class="product-text">
                            <p class="product-text__name">Товар 1</p>

                            <p class="product-text__desc">Товар 1 является товаром 1 потому что он товар 1</p>
                        </div>
                    </div>

                    <div class="income-item__product">
                        <img src="/src/images/test.jpg" alt="product-photo" class="product-photo">

                        <div class="product-text">
                            <p class="product-text__name">Товар 1</p>

                            <p class="product-text__desc">Товар 1 является товаром 1 потому что он товар 1</p>
                        </div>
                    </div>

                    <div class="income-item__product">
                        <img src="/src/images/test.jpg" alt="product-photo" class="product-photo">

                        <div class="product-text">
                            <p class="product-text__name">Товар 1</p>

                            <p class="product-text__desc">Товар 1 является товаром 1 потому что он товар 1</p>
                        </div>
                    </div>

                    <div class="income-item__product">
                        <img src="/src/images/test.jpg" alt="product-photo" class="product-photo">

                        <div class="product-text">
                            <p class="product-text__name">Товар 1</p>

                            <p class="product-text__desc">Товар 1 является товаром 1 потому что он товар 1</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="new-income-parcel-modal">

    <div class="modal-content">
        <div class="content-wrapper">
            <h2 class="page-title">Принять новые товары</h2>

            <form action="" method="POST" class="new-parcel-form">
                <div class="product-add-wrapper">
                    <div class="input-wrapper">
                        <label for="">Название товара</label>
                        <input type="text" name="product-name[]" id="" required>
                    </div>

                    <div class="input-wrapper">
                        <label for="">Количество</label>
                        <input type="text" name="product-quantity[]" id="" required>
                    </div>
                </div>

                <div class="product-add-wrapper">
                    <div class="input-wrapper">
                        <label for="">Название товара</label>
                        <input type="text" name="product-name[]" id="" required>
                    </div>

                    <div class="input-wrapper">
                        <label for="">Количество</label>
                        <input type="text" name="product-quantity[]" id="" required>
                    </div>
                </div>
            </form>
        </div>

        <img src="/src/icons/close-modal.svg" alt="close" id="close-modal">
    </div>

</div>

<? require $_SERVER['DOCUMENT_ROOT'].'/includes/footer/footer.php'?>