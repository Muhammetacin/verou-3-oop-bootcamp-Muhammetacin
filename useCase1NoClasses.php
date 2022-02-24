<?php

declare(strict_types=1);

ini_set('display_errors', value: '1');
ini_set ( option: 'display_startup_errors', value: '1');
error_reporting(error_level: E_ALL);

function pre_r($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

$basket = [
    'bananas' => ['price' => 1, 'pieces' => 6],
    'apples' => ['price' => 1.5, 'pieces' => 3],
    'bottles of wine' => ['price' => 10, 'pieces' => 2],
];

$totalPrice = 0;
$taxBasket = 0;

foreach($basket as $key => $value) {
    $price = $value['price'];
    $pieces = $value['pieces'];
    $totalPrice += $price * $pieces;

    if($key === 'bottles of wine') {
        $taxBasket += ($price * $pieces) * 0.21;
    }
    else {
        $taxBasket += ($price * $pieces) * 0.06;
    }
}

echo '<br>Total price of basket: ' . $totalPrice;
echo '<br>Tax of basket: ' . $taxBasket;