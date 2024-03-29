<?php

namespace App\Controllers;

use App\Controller;

class DBException extends Controller
{
    /**
     * @param null $exception
     */
    protected function handle($exception = null): void
    {
        $this->view->exception = $exception;
        echo $this->view->display(__DIR__ . '/../../Views/dbException.php');
    }
}