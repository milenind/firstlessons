<?php

namespace App;

trait ViewTrait
{

    protected array $data = [];

    /**
     * @param $name - передаем имя
     * @return mixed|null
     */
    public function __get($name)
    {
        return $this->data[$name] ?? null;
    }

    /**
     * @param $name - передаем имя
     * @param $value
     */
    public function __set($name, $value): void
    {
        $this->data[$name] = $value;
    }

    /**
     * @param $name - передаем имя
     * @return bool
     */
    public function __isset($name): bool
    {
        return isset($this->data[$name]);
    }
}