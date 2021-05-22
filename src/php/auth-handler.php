<?php

require $_SERVER['DOCUMENT_ROOT'].'/src/php/connection.php';

$login = $_POST['login'];
$pass = $_POST['password'];

$user = Database::select('users',
    'id, password, name, surname, father',
    '`login` = :login',
    [[':login', $login]]);

if (!empty($user[0]))
{
    if (password_verify($pass, $user[0]['password']))
    {
        setcookie('user', serialize($user[0]), time()+84600, '/');
        header('Location: /start');
    }
}
else
{
    print_r($user);
}