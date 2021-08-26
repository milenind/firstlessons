<?php

namespace App\Controllers;

use App\Controller;

class NotFoundException extends Controller
{
    /**
     * @param null $exception
     */
    protected function handle($exception=null): void
    {
        $this->view->exception = $exception;
        echo $this->view->display(__DIR__ . '/../../Views/notFoundException.php');
    }
}