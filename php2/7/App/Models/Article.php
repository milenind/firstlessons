<?php

namespace App\Models;

use App\DB;
use App\Exceptions;
use App\Model;

class Article extends Model
{
    protected int $id;
    protected string $title;
    protected string $content;
    protected int $authorId;



    /**
     * Добавляет новую статью переданными данными $data
     * @param array $data - данные о сстатье
     * @throws Exceptions
     */
    public function fill(array $data): void
    {
        $exceptions = new Exceptions();
        $id = $data['id'];
        $title = $data['title'];
        $content = $data['content'];
        if (strlen($title) < 3) {
            $exceptions->add(new \Exception('Слишком короткий заголовок'));
        }
        if (strlen($title) > 15) {
            $exceptions->add(new \Exception('Слишком длинный заголовок'));
        }
        if ('+' === mb_substr($title, 0, 1)) {
            $exceptions->add(new \Exception('Заголовок не должен начинаться с +'));
        }
        if (strlen($content) < 5) {
            $exceptions->add(new \Exception('Слишком короткий текст'));
        }
        if (!$exceptions->empty()) {
            throw $exceptions;
        }
        if (null !== $id) {
            $this->id = $id;
        }
        $this->title = $title;
        $this->content = $content;
        $this->authorId = $data['authorId'];
    }

    /**
     * @param $name
     * @return mixed|string
     */
    public function __get($name)
    {
        if ('author' !== $name) {
            return $this->$name;
        }
        if (null !== $this->authorId) {
            return $this->getAuthor($this->authorId);
        }
        throw new Exceptions\NotFoundException('Проблемы с полями');
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    /**
     * @param $name
     * @return mixed|string|null
     */
    public function __isset($name)
    {
        return $this->$name ?? null;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getAuthor($id)
    {
        $db = new DB();
        $sql = 'SELECT * FROM authors WHERE id=:id;';
        $data = [
            ':id' => $id
        ];
        return $db->query(Author::class, $sql, $data)[0];
    }
}