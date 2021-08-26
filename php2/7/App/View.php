<?php

namespace App;

class View implements \Countable, \Iterator
{
    use ViewTrait;

    private array $keysOfData;
    private int $position;

    public function __construct()
    {
        $this->position = 0;
    }

    public function rewind(): void
    {
        $this->keysOfData = array_keys($this->data);
        $this->position = 0;
    }

    public function current()
    {
        return $this->data[$this->keysOfData[$this->position]];
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        ++$this->position;
    }

    public function valid(): bool
    {
        return isset($this->keysOfData[$this->position]);
    }


    public function render($template): void
    {
        include_once $template;
    }

    public function display($template): string
    {
        ob_start();
        include_once $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function count()
    {
        return count($this->data);
    }

}