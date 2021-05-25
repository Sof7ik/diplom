<?php

$productID = $_POST['productID'];
$newProductName = $_POST['productName'];
$newProductDesc = $_POST['productDesc'];
$newProductQuantity = $_POST['productQuantity'];
$newProductImage = $_POST['productNewImage'];

require $_SERVER['DOCUMENT_ROOT'].'/src/php/connection.php';

$response = Database::update(
    '`products`',
    '`name` = :prodName, `description` = :prodDesc, `image` = :prodImage, `quantity` = :prodQuantity',
    '`id` = :prodID',
    [
        [':prodName', $newProductName],
        [':prodDesc', $newProductDesc],
        [':prodImage', $newProductImage, PDO::PARAM_STR],
        [':prodQuantity', $newProductQuantity],
        [':prodID', $productID]
    ]
);

echo json_encode($response, JSON_UNESCAPED_UNICODE);