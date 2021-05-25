<?php

$prod = $_POST['prodID'];

require $_SERVER['DOCUMENT_ROOT'].'/src/php/connection.php';

$res = Database::delete(
    '`products`',
    '`id` = :prodID',
    [
        ['prodID', $prod]
    ]
);

echo json_encode($res, JSON_UNESCAPED_UNICODE);