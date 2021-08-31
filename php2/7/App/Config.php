<?php

namespace App;

class Config
{
    /**
     * @var null
     */
    protected static $object = null;
    protected array $data;

    public function __construct()
    {
        $this->data = include __DIR__ . '/configArray.php';
    }

    /**
     * @return Config|null
     */
    public static function getInstance(): Config
    {
        if (null === self::$object) {
            self::$object = new self();
        }
        return self::$object;
    }

    /**
     * @return array|mixed
     */
    public function getData(): array
    {
        return $this->data;
    }
}