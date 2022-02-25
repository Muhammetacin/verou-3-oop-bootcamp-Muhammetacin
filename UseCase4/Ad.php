<?php

class Ad extends Content
{
    public function __construct($title, $text)
    {
        parent::__construct($title, $text);
    }

    public function showTitle() : string
    {
        return '<h3>' . strtoupper(parent::showTitle()) . '</h3>';
    }

    public function showOriginalTitle(): string
    {
        return '<h2>' . parent::showTitle() . '</h2>';
    }
}