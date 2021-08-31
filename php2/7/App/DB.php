<?php

namespace App;


use App\Exceptions\DBException;
use PDO;

/**
 *
 */
class DB
{
    /** @var PDO -  */
    protected \PDO $dbh;

    /**
     * @throws DBException
     */
    public function __construct()
    {
        try {
            $config = Config::getInstance()->getData()['db'];
            $this->dbh = new \PDO(
                'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'],
                $config['user'],
                $config['password']
            );
        } catch (\PDOException $exception) {
            throw new DBException('Ошибка подключения к базе данных');
        }
    }

    /**
     * @param string $class - класс,объекты которого мы хотим получить
     * @param string $sql - текст запроса
     * @param array $data - параметры запроса
     * @return array|false
     * @throws DBException
     */
    public function query(string $class, string $sql, array $data = []): array
    {
        $sth = $this->dbh->prepare($sql);
        $result = $sth->execute($data);
        if (!$result) {
            throw new DBException('Ошибка запроса');
        }
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    /**
     * @param string $sql - текст запроса
     * @param array $data - параметры запроса
     * @return \Generator
     * @throws DBException
     */
    public function queryEach(string $sql, array $data = []): \Generator
    {
        $sth = $this->dbh->prepare($sql);
        $result = $sth->execute($data);
        if (!$result) {
            throw new DBException('Ошибка запроса');
        }
        while ($fetchedItem = $sth->fetch(\PDO::FETCH_ASSOC)) {
            yield $fetchedItem;
        }
    }

    /**
     * @param string $sql - текст запроса
     * @param string $class - класс объекты которого мы хотим получить
     * @param array $data - параметры запроса
     * @throws DBException
     */
    public function queryOne(string $sql, string $class, array $data = [])
    {
        $sth = $this->dbh->prepare($sql);
        $result = $sth->execute($data);
        if (!$result) {
            throw new DBException('Ошибка запроса');
        }
        $result = $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        return $result[0];
    }

    /**
     * @param string $sql - текст запроса
     * @param array $parameters - параметры запроса
     * @return bool
     * @throws DBException
     */
    public function execute(string $sql, array $parameters = []): bool
    {
        $sth = $this->dbh->prepare($sql);
        $result = $sth->execute($parameters);

        if (!$result) {
            throw new DBException('Ошибка запроса');
        }
        return true;
    }

    /**
     * @return string
     */
    public function getLastId(): string
    {
        return $this->dbh->lastInsertId();
    }
}