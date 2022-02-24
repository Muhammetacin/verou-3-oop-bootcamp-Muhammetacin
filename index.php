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

echo 'Use Case 1 No Class<br>';
echo '<br>Total price of basket without class: €' . $totalPrice;
echo '<br>Tax of basket without class: €' . $taxBasket;

echo '<br><br>';

// Use Case 1 With Class & Use Case 2
require 'BasketItem.php';

echo 'Use Case 1 With Class<br>';

$totalPriceBasket = 0;
$taxPriceBasket = 0;

$bananas = new BasketItem(6, 1);
$apples = new BasketItem(3, 1.5);
$bottlesOfWine = new BasketItem(2, 10);

$totalPriceBasket += $bananas->calcTotalPriceItem() + $apples->calcTotalPriceItem() + $bottlesOfWine->calcTotalPriceItem();
$taxPriceBasket += $bananas->calcTaxItem(0.06) + $apples->calcTaxItem(0.06) + $bottlesOfWine->calcTaxItem(0.21);

echo '<br>Total price of basket with class: €' . $totalPriceBasket;
echo '<br>Tax of basket with class: €' . $taxPriceBasket;

echo '<br><br>';

echo 'Use Case 1 With Class - Discount<br>';

$totalDiscountedPrice = $bananas->applyDiscountToItem(0.5) + $apples->applyDiscountToItem(0.5) + $bottlesOfWine->applyDiscountToItem(0.5);
echo '<br>Total discounted price of basket with class: €' . $totalDiscountedPrice;

echo '<br><br>';

// Use Case 3
echo 'Use Case 3<br>';