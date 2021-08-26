<?php

namespace App;

use App\Exceptions\NotFoundException;

/**
 *
 */
abstract class Model
{
    protected const TABLE = 'articles';

    /**
     * @param int $id - ид записи
     * @param string $class - название модели, объекты который мы хотим получить
     * @return mixed
     * @throws Exceptions\DBException
     * @throws NotFoundException
     */
    public static function findById(int $id, string $class)
    {
        $db = new DB();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $data = ['id' => $id];
        $article = $db->queryOne($sql, $class, $data);

        if (null === $article) {
            throw new NotFoundException('Такой записи нет');
        }

        return $article;
    }

    /**
     * @return array
     * @throws Exceptions\DBException
     */
    public static function findAll()
    {
        $db = new DB();
        $sql = 'SELECT * FROM ' . static::TABLE . ';';
        foreach ($db->queryEach($sql) as $item) {
            yield $item;
        }
    }

    /**
     * @param $number
     * @return array
     * @throws Exceptions\DBException
     */
    public static function findSome($number): array
    {
        $db = new DB();
        $sql = 'SELECT * FROM ' . static::TABLE . ' LIMIT ' . (int)$number . ';';
        return $db->query(static::class, $sql);
    }

    /**
     * @return bool
     * @throws Exceptions\DBException
     */
    public function insert(): bool
    {
        $columnsAndData = $this->getColumnsAndDataForInsert();
        $columns = $columnsAndData['columns'];
        $data = $columnsAndData['data'];
        $sql = 'INSERT INTO ' . static::TABLE .
            '(' .
            implode(', ', $columns) .
            ') VALUES (' . implode(',', array_keys($data)) . ');';

        $db = new DB();
        $isInserted = $db->execute($sql, $data);
        $this->id = (int)$db->getLastId();
        return $isInserted;
    }

    /**
     * @return array
     */
    protected function getColumnsAndDataForInsert(): array
    {
        $fields = get_object_vars($this);
        $columns = [];
        $data = [];
        foreach ($fields as $name => $value) {
            if ('id' == $name) {
                continue;
            }
            $columns[] = $name;
            $data[':' . $name] = $value;
        }
        return [
            'columns' => $columns,
            'data' => $data
        ];
    }

    /**
     * @return bool
     * @throws Exceptions\DBException
     */
    public function update(): bool
    {
        $columnsAndData = $this->getColumnsAndDataForUpdate();
        $dataForImplode = $columnsAndData['dataForImplode'];
        $data = $columnsAndData['data'];
        $sql = 'UPDATE ' . static::TABLE . ' SET ' . implode(', ', $dataForImplode) . ' WHERE id=:id';
        $db = new DB();
        return $db->execute($sql, $data);
    }

    /**
     * @return array
     */
    protected function getColumnsAndDataForUpdate(): array
    {
        $fields = get_object_vars($this);
        $dataForImplode = [];
        $data = [];
        foreach ($fields as $name => $value) {
            $dataForImplode[] = $name . '=:' . $name;
            $data[':' . $name] = $value;
        }
        return [
            'dataForImplode' => $dataForImplode,
            'data' => $data
        ];
    }

    /**
     * @return bool
     * @throws Exceptions\DBException
     * @throws NotFoundException
     */
    public function save(string $class): bool
    {
        $fields = get_object_vars($this);
        if (!isset($fields['id']) || !static::findById($fields['id'], $class)) {
            return $this->insert();
        }
        return $this->update();
    }

    /**
     * @throws Exceptions\DBException
     */
    public function delete(): bool
    {
        $id = get_object_vars($this)['id'];
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=:id';
        $params = [':id' => $id];
        $db = new DB();
        return $db->execute($sql, $params);
    }

}
