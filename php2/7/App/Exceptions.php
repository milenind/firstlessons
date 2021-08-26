<?php

namespace App;

class Exceptions extends \Exception
{
    protected array $exceptions = [];

    /**
     * @param \Exception $exception
     */
    public function add(\Exception $exception): void
    {
        $this->exceptions[] = $exception;
    }

    /**
     * @return array
     */
    public function all(): array
    {
        return $this->exceptions;
    }

    /**
     * @return bool
     */
    public function empty(): bool
    {
        return empty($this->exceptions);
    }
}