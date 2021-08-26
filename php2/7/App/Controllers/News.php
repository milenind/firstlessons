<?php

namespace App\Controllers;

include_once __DIR__ . '/../autoload.php';

use App\Controller;

class News extends Controller
{
    /**
     * @param null $params
     * @throws \App\Exceptions\DBException
     */
    protected function handle($params = null): void
    {
        $this->view->news = \App\Models\News::findSome(10); // отобразить послдние новостей
        echo $this->view->display(__DIR__ . '/../../Views/news.php');
    }

    /**
     * @param null $params
     * @throws \App\Exceptions\DBException|\App\Exceptions\NotFoundException
     */
    protected function viewNew($params = null): void
    {
        // проверка на существование get id todo
        $this->view->new = \App\Models\News::findById($_GET['id'], \App\Models\News::class);
        echo $this->view->display(__DIR__ . '/../../Views/new.php');
    }
}
