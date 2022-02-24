<?php

class BasketItem
{
    public float $price;
    public int $pieces;

    public function __construct(int $pieces, float $price)
    {
        $this->pieces = $pieces;
        $this->price = $price;
    }

    public function calcTotalPriceItem() : float{
        return $this->price * $this->pieces;
    }

    public function calcTax(float $taxValue) : float {
        return $this->calcTotalPriceItem() * $taxValue;
    }
}