<?php

namespace App;

class Logger
{
    /**
     * @param $exception - обработчик ошибок
     */
    public static function write($exception): void
    {
        file_put_contents(
            __DIR__ . '/log.txt',
            'Путь: ' . $exception->getFile() .
            ' дата: ' . date('m.d.y H:i:s') .
            ' сообщение: ' . $exception->getMessage() . PHP_EOL,
            FILE_APPEND
        );
    }
}