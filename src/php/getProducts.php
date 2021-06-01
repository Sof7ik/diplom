<?php

require $_SERVER['DOCUMENT_ROOT'].'/src/php/connection.php';

$productsArray = Database::select(
    '`products`, `categories`',
    '`products`.`id` as "product-id",
    `products`.`name` as "product-name"',
    '`products`.`cat-id` = `categories`.`id`'
);

if (!empty($productsArray))
{
    echo json_encode($productsArray, 256);
}