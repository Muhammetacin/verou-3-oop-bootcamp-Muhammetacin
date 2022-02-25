<?php

class Ad extends Content
{
    public function __construct($title, $text)
    {
        parent::__construct($title, $text);
    }

    public function showTitle() : string
    {
        return strtoupper(parent::showTitle());
    }

    public function showOriginalTitle(): string
    {
        return parent::showTitle();
    }
}