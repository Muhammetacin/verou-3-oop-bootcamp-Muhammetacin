<?php

class Article extends Content
{
    private bool $isBreakingNews;

    public function __construct($title, $text, $isBreakingNews)
    {
        parent::__construct($title, $text);
        $this->isBreakingNews = $isBreakingNews;
    }

    public function showTitle() : string
    {
        if($this->isBreakingNews) {
            return '<h3>BREAKING: ' . parent::showTitle() . '</h3>';
        }
        return '<h3>' . parent::showTitle() . '</h3>';
    }
}