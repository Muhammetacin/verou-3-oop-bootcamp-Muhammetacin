<?php

class BasketItem
{
    private float $price;
    private int $pieces;
    private bool $isFruit;

    public function __construct(int $pieces, float $price, bool $isFruit)
    {
        $this->pieces = $pieces;
        $this->price = $price;
        $this->isFruit = $isFruit;
    }

    private function calcTotalPriceItem() : float
    {
        return $this->price * $this->pieces;
    }

    private function calcTaxItem() : float
    {
        return $this->isFruit ? $this->calcTotalPriceItem() * 0.06 : $this->calcTotalPriceItem() * 0.21;
    }

    public function applyDiscountToItem()
    {
        return $this->isFruit ? $this->calcTotalPriceItem() * 0.5 : $this->calcTotalPriceItem();
    }

    public function getTotalPrice()
    {
        return $this->calcTotalPriceItem();
    }

    public function getTaxPrice()
    {
        return $this->calcTaxItem();
    }
}