<?php

require $_SERVER['DOCUMENT_ROOT'].'/src/php/connection.php';

$categories = Database::select(
    'categories',
    '*'
);

if ( !empty($categories) )
{
    echo json_encode($categories, JSON_UNESCAPED_UNICODE);
}