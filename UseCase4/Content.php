<?php

class Content
{
    private string $title;
    private string $text;

    protected function __construct($title, $text)
    {
        $this->title = $title;
        $this->text = $text;
    }

    public function showTitle(): string
    {
        return $this->title;
    }

    public function showText(): string
    {
        return $this->text;
    }
}