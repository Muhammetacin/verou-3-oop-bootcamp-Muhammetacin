<?php

class Vacancy extends Content
{
    public function __construct($title, $text)
    {
        parent::__construct($title, $text);
    }

    public function showTitle() : string
    {
        return parent::showTitle() . ' - Apply now!';
    }

    public function showOriginalTitle(): string
    {
        return parent::showTitle();
    }
}