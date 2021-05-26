<?php
    $productNames = $_POST['product-name'];
    $productQuantities = $_POST['product-quantity'];
    $productCategories = $_POST['product-category'];

    $normalArray = [];
    
    foreach($productNames as $key => $productName)
    {
        array_push($normalArray,
        [
            'product-name' => $productName,
            'product-quantity' => $productQuantities[$key],
            'product-category' => $productCategories[$key]
        ]);
    }

    require $_SERVER['DOCUMENT_ROOT'].'/src/php/connection.php';

    foreach($normalArray as $newProduct)
    {
        $productName = $newProduct['product-name'];
        $productQuantity = $newProduct['product-quantity'];
        $productCat = $newProduct['product-category'];
        
        $isInDB = Database::select(
            '`products`',
            'id as "product-id", quantity as "product-quantity"',
            '`products`.`name` = :productName',
            [[':productName', $productName]]);
        
        if (count($isInDB) > 0)
        {
            $foundProductId = $isInDB[0]['product-id'];
            $foundProductQuantity = $isInDB[0]['product-quantity'];

            $newProductQuantity = $foundProductQuantity + $productQuantity;

            Database::update(
                '`products`',
            '`quantity` = :newQuantity',
                '`id` = :productId',
                [
                    ['newQuantity', $newProductQuantity],
                    ['productId', $foundProductId]
                ]
            );

            header('Location: /income-parcel/');
        }
        else
        {
            // вставляем этот продукт как новый
            Database::insert(
                '`products` (`id`, `name`, `description`, `image`, `quantity`, `cat-id`)',
                ':id, :name, :description, :image, :quantity, :catID',
                [
                    ['id', NULL],
                    ['name', $productName],
                    ['description', NULL],
                    ['image', NULL],
                    ['quantity', $productQuantity],
                    ['catID', $productCat]
                ]);

            // берем последний вставленный продукт
            $lastAddedProduct = Database::select(
                'products',
                '`id`',
                '1 ORDER BY `id` DESC LIMIT 1'
            )[0]['id'];

            // вставляем новую поставку
            $sqlDateTimeFormatter = new DateTime('NOW');
            $sqlDate = $sqlDateTimeFormatter -> format('Y-m-d H:m:s');

            Database::insert(
                '`incoming-parcels` (`id`, `date`)',
                ':id, :date',
                [
                    [':id', NULL],
                    [':date', $sqlDate ]
                ]
            );

            // берем последнюю вставленную поставку
            $lastParcel = Database::select(
                '`incoming-parcels`',
                '`id`',
                '1 ORDER BY `id` DESC LIMIT 1'
            )[0]['id'];

            // вставляем новую запись поставка-товар
            Database::insert(
                '`income-parcels-goods` (`id-income`, `id-product`, `product-quantity`)',
                ':idIncome, :idProduct, :productQuantity',
                [
                    [':idIncome', $lastParcel],
                    [':idProduct', $lastAddedProduct],
                    [':productQuantity', $productQuantity]
                ]
            );

            header('Location: /income-parcel/');
        }
    }