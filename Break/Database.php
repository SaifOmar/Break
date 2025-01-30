<?php

namespace Break;

use PDO;

class DataBase
{
    public $connection;
    public $statement;

    public function __construct($dsn, $username = "root", $password = "")
    {
        $this->connection = new PDO("mysql:" . $dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);

        $this->statement->execute($params);

        return $this;
    }


    public function get()
    {
        return $this->statement->fetchAll();
    }

    public function find()
    {
        return $this->statement->fetch();
    }
}
