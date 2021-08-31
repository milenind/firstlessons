<?php

namespace App\Controllers;

use App\Controller;

class Article extends Controller
{
    /**
     * @param null $params - параметры
     * @throws \App\Exceptions\DBException -обработчик ошибок
     */
    protected function handle($params = null): void
    {
        $this->view->articles = \App\Models\Article::findSome(10);
        echo $this->view->display(__DIR__ . '/../../Views/articles.php');
    }

    /**
     * @throws \App\Exceptions -обработчик ошибок
     * @throws \App\Exceptions\DBException -обработчик ошибок
     * @throws \App\Exceptions\NotFoundException -обработчик ошибок
     */
    protected function fill()
    {
        if (isset($_GET['id'])) {
            $articleModel = new \App\Models\Article();
            $findedArticle = \App\Models\Article::findById($_GET['id'], \App\Models\Article::class);
            $articleModel->fill($findedArticle);
            $this->view->article = $articleModel;
        }
    }

    /**
     * @param null $params - параметры
     * @throws \App\Exceptions\DBException|\App\Exceptions\NotFoundException -обработчик ошибок
     */
    protected function viewArticle($params = null): void
    {
        // проверка на существование get id
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            die('Введите id записи!');
        }

        $this->view->article = \App\Models\Article::findById($id, \App\Models\Article::class);
        echo $this->view->display(__DIR__ . '/../../Views/article.php');
    }
}
