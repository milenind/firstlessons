<?php

namespace App;

trait ViewTrait
{

    protected array $data = [];

    /**
     * @param $name
     * @return mixed|null
     */
    public function __get($name)
    {
        return $this->data[$name] ?? null;
    }

    public function __set($name, $value): void
    {
        $this->data[$name] = $value;
    }

    public function __isset($name): bool
    {
        return isset($this->data[$name]);
    }
}