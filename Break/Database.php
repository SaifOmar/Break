<?php

namespace Break;

use PDO;

class DataBase
{
    public static $connection;
    public static $statement;
    public static $dsn;
    public static string $table;

    public function __construct($dsn, $username = "root", $password = "")
    {
        self::$dsn = $dsn;
        self::$connection = new PDO("mysql:" . $dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public static function query($query, $params = [])
    {
        self::$statement = self::$connection->prepare($query);

        self::$statement->execute($params);

        return self::$statement;
    }

    private static function chain()
    {
        return new static(self::$dsn);
    }

    public static function table(string $table)
    {
        self::$table = $table;
        return self::chain();
    }
    public static function all()
    {
        $sql = "select * from " . self::$table;
        self::query($sql);
        return self::get();
    }

    public static function get()
    {
        return self::$statement->fetchAll();
    }

    public static function find(string $id)
    {
        return self::$statement->fetch();
    }
}
