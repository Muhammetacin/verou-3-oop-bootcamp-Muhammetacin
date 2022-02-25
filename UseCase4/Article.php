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
            return 'BREAKING: ' . parent::showTitle();
        }
        return parent::showTitle();
    }
}