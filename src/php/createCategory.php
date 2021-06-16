<?php
$cat = $_POST['cat-name'];

require $_SERVER['DOCUMENT_ROOT'].'/src/php/connection.php';

if (Database::insert('categories (`name`)', '(:catName)', [[':catName', $cat]]))
{
    header('Location: /admin');
}