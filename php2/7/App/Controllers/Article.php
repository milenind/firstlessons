<?php

namespace App\Controllers;

use App\Controller;

class Article extends Controller
{
    /**
     * @param null $params
     * @throws \App\Exceptions\DBException
     */
    protected function handle($params = null): void
    {
        $this->view->articles = \App\Models\Article::findSome(10);
        echo $this->view->display(__DIR__ . '/../../Views/articles.php');
    }

    /**
     * @throws \App\Exceptions
     * @throws \App\Exceptions\DBException
     * @throws \App\Exceptions\NotFoundException
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
     * @param null $params
     * @throws \App\Exceptions\DBException|\App\Exceptions\NotFoundException
     */
    protected function viewArticle($params = null): void
    {
        // проверка на существование get id
        $this->view->article = \App\Models\Article::findById($_GET['id'], \App\Models\Article::class);
        echo $this->view->display(__DIR__ . '/../../Views/article.php');
    }
}
