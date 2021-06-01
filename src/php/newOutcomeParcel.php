<?php

$productIds = $_POST['product-id'];
$productQuantities = $_POST['product-quantity'];

$normalProductsArray = [];

foreach($productIds as $key => $productId)
{
    $normalProductsArray[$key] = [
        'product-id' => $productId,
        'product-quantity' => $productQuantities[$key]
    ];
}

print_r($normalProductsArray);

require $_SERVER['DOCUMENT_ROOT'].'/src/php/connection.php';

// делаем красивую дату для MySQL
$date = new DateTime('NOW');
$date = $date->format('Y-m-d H:m:s');

$remainGoods = [];

foreach($normalProductsArray as $key => $product)
{
    $currentQuantity = Database::select(
        '`products`',
        '`products`.`quantity`',
        '`products`.`id` = :productID',
        [
            [':productID', $product['product-id']]
        ]
    )[0]['quantity'];

    $difference = $currentQuantity - $product['product-quantity'];

    echo "<br> Difference = ".$difference;

    array_push($remainGoods, $difference);
}

$lowerThenNull = false;

foreach($remainGoods as $remain)
{
    if ($remain < 0)
    {
        $lowerThenNull = true;
    }
}


if (!$lowerThenNull)
{
    echo "можно вставлять";

    // вставляем в главную таблицу отгрузок
// Database::insert(
//     '`outcoming-parcels`(`id`, `date`)',
//     ':id, :date',
//     [
//         [':id', NULL],
//         [':date', $date]
//     ]
// );

//берем последнюю отгрузку
// $lastOutcomeId = Database::select(
//     '`outcoming-parcels`',
//     'id',
//     '1 ORDER BY id DESC LIMIT 1'
// )[0]['id'];

// foreach($normalProductsArray as $normalProduct)
// {
//     print_r($normalProduct);

//     // для каждого товара вставляем запись в связывающую таблицу отгрузок и товаров
//     Database::insert(
//         '`outcome-parcels-goods`(`id-outcome`, `id-product`, `quantity`)',
//         ':outcomeID, :productID, :productQuantity',
//         [
//             [':outcomeID', $lastOutcomeId],
//             [':productID', $normalProduct['product-id']],
//             [':productQuantity', $normalProduct['product-quantity']]
//         ]
//     );
// } 
}
else
{
    //error;
}