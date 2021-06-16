<?php
if (empty($_COOKIE['user'])) {
    header('Location: /');
}

if (unserialize($_COOKIE['user'])['role'] != 1)
{
    header('Location: /lk');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Управление складом</title>

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="/dist/css/main.css">

    <link rel="stylesheet" href="/dist/css/personal-cabinet.css">
    <link rel="stylesheet" href="/dist/css/admin-form.css">
</head>
<body>
<? require $_SERVER['DOCUMENT_ROOT'] . '/includes/header/header.php' ?>

<div class="container-1440">
    <h2 class="personal-cabinet-title">Управление категориями</h2>

    <form action="/src/php/createCategory.php" method="POST" class="personal-info">
        <div class="personal-info__field-wrapper">
            <label class="personal-info__field-name" for="cat-name">Введите название категории</label>
            <input type="text" name="cat-name" id="cat-name">
        </div>

        <input type="submit" value="Создать категорию">
    </form>
</div>

<? require $_SERVER['DOCUMENT_ROOT'] . '/includes/footer/footer.php' ?>
</body>
</html>