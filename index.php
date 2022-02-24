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

// Use Case 1 Without Class
require 'useCase1NoClasses.php';

echo '<br>Total price of basket without class: €' . $totalPrice;
echo '<br>Tax of basket without class: €' . $taxBasket;

echo '<br>';

// Use Case 1 With Class
require 'BasketItem.php';

$totalPriceBasket = 0;
$taxPriceBasket = 0;

$bananas = new BasketItem(6, 1);
$apples = new BasketItem(3, 1.5);
$bottlesOfWine = new BasketItem(2, 10);

$totalPriceBasket += $bananas->calcTotalPriceItem() + $apples->calcTotalPriceItem() + $bottlesOfWine->calcTotalPriceItem();
$taxPriceBasket += $bananas->calcTax(0.06) + $apples->calcTax(0.06) + $bottlesOfWine->calcTax(0.21);

echo '<br>Total price of basket with class: €' . $totalPriceBasket;
echo '<br>Tax of basket with class: €' . $taxPriceBasket;

echo '<br>';