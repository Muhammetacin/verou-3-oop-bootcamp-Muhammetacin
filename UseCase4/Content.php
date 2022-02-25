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

    protected function showTitle(): string
    {
        return $this->title;
    }

    public function showText(): string
    {
        return '<p>' . $this->text . '</p>';
    }
}