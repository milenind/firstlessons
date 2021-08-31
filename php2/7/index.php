<?php

use App\Config;

require_once __DIR__ . '/App/autoload.php';


$uri = $_SERVER['REQUEST_URI'];
$parts = explode('/', $uri);


$controller = $parts[1] ? ucfirst($parts[1]) : 'News';


$action = $parts[2] ? lcfirst($parts[2]) : 'handle';
$class = '\App\Controllers\\' . $controller;

try {
    $controller = new $class;
    $controller($action);
} catch (\App\Exceptions\DBException $exception) {
    \App\Logger::write($exception);
    if ('Ошибка подключения к базе данных' === $exception->getMessage()) {
        \App\Mailer::send(new \App\Models\Message(
                'Ошибка подключения к бд',
                'Срочно чините подключение к бд!!!'
            )
        );
    }
    $controller = new \App\Controllers\DBException();
    $controller('handle', $exception);
} catch (\App\Exceptions\NotFoundException $exception) {
    \App\Logger::write($exception);
    $controller = new \App\Controllers\NotFoundException();
    $controller('handle', $exception);
} catch (\App\Exceptions $exceptions) {
    foreach ($exceptions->all() as $exception) {
        \App\Logger::write($exception);
    }
    $controller = new \App\Controllers\MultipleExceptions();
    $controller('handle', $exceptions);
} catch (TypeError $error) {
    echo $error->getMessage();
}
