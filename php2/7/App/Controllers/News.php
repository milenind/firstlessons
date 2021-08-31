<?php

namespace App\Controllers;

include_once __DIR__ . '/../autoload.php';

use App\Controller;

class News extends Controller
{
    /**
     * @param null $params - параметры
     * @throws \App\Exceptions\DBException - обработчик ошибок
     */
    protected function handle($params = null): void
    {
        $this->view->news = \App\Models\News::findSome(10); // отобразить послдние новостей
        echo $this->view->display(__DIR__ . '/../../Views/news.php');
    }

    /**
     * @param null $params - параметры
     * @throws \App\Exceptions\DBException|\App\Exceptions\NotFoundException - обработчик ошибок
     */
    protected function viewNew($params = null): void
    {
        // проверка на существование get id
        if ( !empty( $_GET['id'] ) )
        {
            $id = $_GET['id'];
        } else{ die('Введите id записи!');}
        $this->view->new = \App\Models\News::findById($id, \App\Models\News::class);
        echo $this->view->display(__DIR__ . '/../../Views/new.php');
    }
}
