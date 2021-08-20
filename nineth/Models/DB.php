<?php

class DB
{
    protected $db;


    public function __construct()
    {
        include "connect.php";
    }

    /**
     * @param string $sql
     * @return bool
     */
    public function execute(string $sql): bool
    {
        $sth = $this->db->prepare($sql);
        return $sth->execute();
    }

    /**
     * @param string $sql
     * @param array $data
     * @return array|false
     */
    public function query(string $sql, array $data)
    {
        $sth = $this->db->prepare($sql);
        $sth->execute($data);
        return $sth->fetchall();

    }

    public function lightquery($sql)
    {
        $sth = $this->db->prepare($sql);
        $sth->execute();
        return $sth->fetchall();
    }
}