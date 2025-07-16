<?php

class Database
{
    private $connection;

    public function __construct()
    {
        $dsn ='mysql:host=127.0.0.1;dbname=web-php;charset=utf8mb4';

        $this->connection = new PDO($dsn,'root','1213123Shape');
    }

    public function query($sql)
    {
        return $this->connection->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}