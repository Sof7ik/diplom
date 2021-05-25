<?php

$productId = $_POST['product-id'];

require $_SERVER['DOCUMENT_ROOT'].'/src/php/connection.php';

$productData = Database::select(
    'products',
    '*',
    '`id` = :productID',
    [
        [':productID', $productId]
    ]
);

if (!empty($productData))
{
    echo json_encode($productData, JSON_UNESCAPED_UNICODE);
}