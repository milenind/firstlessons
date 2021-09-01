<?php

namespace App\Controllers;

use App\Controller;
use App\Models\AdminDataTable;


class Admin extends Controller
{
    /**
     * @throws \App\Exceptions -обработчик ошибок
     * @throws \App\Exceptions\DBException -обработчик ошибок
     * @throws \App\Exceptions\NotFoundException -обработчик ошибок
     */
    protected function saveArticle(): void
    {
        if (isset($_POST['authorId']) && isset($_POST['title']) && isset($_POST['content'])) {
            $article = new \App\Models\Article();
            if ('' !== $_POST['id']) {
                $id = $_POST['id'];
            }
            if ('' === $_POST['authorId']) {
                throw new \App\Exceptions\NotFoundException('Нет автора с таким id');
            }
            $data = [
                'id' => $id ?? null,
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'authorId' => $_POST['authorId']
            ];
            $article->fill($data);
            $article->save(\App\Models\Article::class);

        }
        header('Location: /admin/');
    }

    /**
     * @throws \App\Exceptions\DBException -обработчик ошибок
     * @throws \App\Exceptions\NotFoundException -обработчик ошибок
     */
    protected function delete(): void
    {
        if ('' === $_POST['id']) {
            throw new \App\Exceptions\NotFoundException('Нужно ввести id, чтобы удалить запись');
        }
        $article = new \App\Models\Article();
        $article->id = $_POST['id'];
        $article->delete();
        header('Location: /admin/');
    }

    /**
     * @throws \App\Exceptions -обработчик ошибок
     * @throws \App\Exceptions\DBException -обработчик ошибок
     */
    protected function getTable()
    {
        $adminTable = new AdminDataTable(
            [
                'title' => function (\App\Models\Article $article) {
                    return $article->title;
                },
                'trimmedText' => function (\App\Models\Article $article) {
                    return mb_strimwidth($article->content, 0, 50) . '...';
                },
                'id' => function (\App\Models\Article $article) {
                    return $article->id;
                }

            ]
        );
        $news = [];
        foreach (\App\Models\Article::findAll() as $item) {
            $article = new \App\Models\Article();
            $article->fill($item);
            $news[] = $article;
        }
        $adminTable->render($news);
        $this->view->table = $adminTable->render($news);
        echo $this->view->display(__DIR__ . '/../../Views/adminDataTable.php');
    }

    /**
     * @param null $params - параметры
     * @throws \App\Exceptions\DBException
     */
    protected function handle($params = null): void
    {
        $news = [];
        foreach (\App\Models\Article::findAll() as $item) {
            $article = new \App\Models\Article();
            $article->fill($item);
            $news[] = $article;
        }
        $this->view->news = $news;
        echo $this->view->display(__DIR__ . '/../../Views/admin.php');
    }
}