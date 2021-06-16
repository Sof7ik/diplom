<?php

require $_SERVER['DOCUMENT_ROOT'].'/src/php/connection.php';

$userID = unserialize($_COOKIE['user'])['id'];

if ($_POST['user-password'] != '')
{
    $res = Database::update('users',
        '`name` = :name, `surname` = :surname, `father` = :father, `login` = :login, `password` = :pass',
        '`id` = :id',
        [
            [':name', $_POST['user-name']],
            [':surname', $_POST['user-surname']],
            [':father', $_POST['user-father']],
            [':login', $_POST['user-login']],
            [':pass', password_hash($_POST['user-password'], PASSWORD_DEFAULT)],
            [':id', $userID]
        ]);
}
else
{
    $res = Database::update('users',
        '`name` = :name, `surname` = :surname, `father` = :father, `login` = :login',
        '`id` = :id',
        [
            [':name', $_POST['user-name']],
            [':surname', $_POST['user-surname']],
            [':father', $_POST['user-father']],
            [':login', $_POST['user-login']],
            [':id', $userID]
        ]);
}

if ($res)
{
    header('Location: /lk');
}
