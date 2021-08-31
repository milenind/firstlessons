<?php

namespace App\Controllers;

use App\Controller;

class MultipleExceptions extends Controller
{
    /**
     * @param null $exceptions
     */
    protected function handle($exceptions = null): void
    {
        $this->view->exceptions = $exceptions;
        echo $this->view->display(__DIR__ . '/../../Views/MultipleExceptions.php');
    }
}