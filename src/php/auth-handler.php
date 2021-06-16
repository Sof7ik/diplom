<?php

require $_SERVER['DOCUMENT_ROOT'].'/src/php/connection.php';

$login = $_POST['login'];
$pass = $_POST['password'];

$user = Database::select('users',
    'id, password, name, surname, father, role',
    '`login` = :login',
    [[':login', $login]]);

if (!empty($user[0]))
{
    if (password_verify($pass, $user[0]['password']))
    {
        setcookie('user', serialize($user[0]), time()+84600, '/');

        if($user[0]['role'] == 1)
        {
            header('Location: /admin');
        }
        else
        {
            header('Location: /start');
        }
    }
    else
    {
        header('Location: /');
    }
}
else
{
    header('Location: /');
}