<?php

$productIds = $_POST['product-id'];
$productQuantities = $_POST['product-quantity'];

$normalProductsArray = [];

// делаем из двух POST-массивов один нормальный
foreach($productIds as $key => $productId)
{
    $normalProductsArray[$key] = [
        'product-id' => $productId,
        'product-quantity' => $productQuantities[$key]
    ];
}

require $_SERVER['DOCUMENT_ROOT'].'/src/php/connection.php';

// делаем красивую дату для MySQL
$date = new DateTime('NOW');
$date = $date->format('Y-m-d H:m:s');

// вставляем в главную таблицу отгрузок
Database::insert(
 '`outcoming-parcels`(`id`, `date`)',
 ':id, :date',
 [
     [':id', NULL],
     [':date', $date]
 ]
);

//берем последнюю отгрузку
$lastOutcomeId = Database::select(
 '`outcoming-parcels`',
 'id',
 '1 ORDER BY id DESC LIMIT 1'
)[0]['id'];

foreach($normalProductsArray as $normalProduct)
{
    // для каждого товара вставляем запись в связывающую таблицу отгрузок и товаров
    Database::insert(
     '`outcome-parcels-goods`(`id-outcome`, `id-product`, `quantity`)',
     ':outcomeID, :productID, :productQuantity',
         [
             [':outcomeID', $lastOutcomeId],
             [':productID', $normalProduct['product-id']],
             [':productQuantity', $normalProduct['product-quantity']]
         ]
    );
    // в продуктах обновляем данные о количестве
    Database::update(
        'products',
        '`quantity` = quantity - :outcomeQuantity',
        '`id` = :productID',
        [
            [':outcomeQuantity', $normalProduct['product-quantity']],
            [':productID', $normalProduct['product-id']]
        ]
    );
}

header('Location: /outcome-parcels/');