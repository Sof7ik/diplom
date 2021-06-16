<?php
    if (empty($_COOKIE['user'])) {
        header('Location: /');
    }
    else
    {
        $user = unserialize($_COOKIE['user']);
    }

    require $_SERVER['DOCUMENT_ROOT'].'/src/php/connection.php';

    $userInfo = Database::select('users',
        'id, login, password, name, surname, father',
        '`id` = :id',
        [[':id', $user['id']]]);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Личный кабинет</title>

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="/dist/css/main.css">

    <link rel="stylesheet" href="/dist/css/personal-cabinet.css">
</head>
<body>
        <? require $_SERVER['DOCUMENT_ROOT'].'/includes/header/header.php'?>

        <div class="container-1440">
            <h2 class="personal-cabinet-title">
                Личный кабинет
                <span><?=$user['surname'].' '.$user['name'].' ' .$user['father']?></span>
            </h2>

            <form action="/src/php/updateUser.php" method="POST" class="personal-info">

                <div class="personal-info__field-wrapper">
                    <label class="personal-info__field-name" for="user-name">Имя</label>
                    <input type="text" name="user-name" id="user-name" value="<?=$userInfo[0]['name']?>">
                </div>

                <div class="personal-info__field-wrapper">
                    <label class="personal-info__field-name" for="user-surname">Фамилия</label>
                    <input type="text" id="user-surname" name="user-surname" value="<?=$userInfo[0]['surname']?>">
                </div>

                <div class="personal-info__field-wrapper">
                    <label class="personal-info__field-name" for="user-father">Отчество</label>

                    <input type="text" name="user-father" id="user-father" value="<?=$userInfo[0]['father']?>">
                </div>

                <div class="personal-info__field-wrapper">
                    <label class="personal-info__field-name" for="user-login">Логин</label>

                    <input type="text" name="user-login" id="user-login" value="<?=$userInfo[0]['login']?>">
                </div>

                <div class="personal-info__field-wrapper">
                    <label class="personal-info__field-name" for="user-pass">Пароль</label>

                    <input type="password" name="user-password" id="user-pass">
                </div>

                <input type="submit" value="Применить изменения">

            </form>

        </div>

        <? require $_SERVER['DOCUMENT_ROOT'].'/includes/footer/footer.php'?>
</body>
</html>