<?php

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