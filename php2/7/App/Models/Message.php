<?php

namespace App\Models;

class Message
{
    protected string $title;
    protected string $content;

    /**
     * @param string $title
     * @param string $content
     */
    public function __construct(string $title, string $content)
    {
        $this->title= $title;
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }
}