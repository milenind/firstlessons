<?php

namespace App\Models;

use App\DB;
use App\Model;

class News extends Model
{
    protected int $id;
    protected string $title;
    protected string $content;
    protected string $authorId;

    public const TABLE = 'news';

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