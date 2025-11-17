<?php

class Database
{
    private $db_connection;
    private static $instances = [];

    private function __construct($db_name)
    {
        $this->db_connection = new SQLite3($db_name);
    }

    public static function getInstance($db_name)
    {
        if (!isset(self::$instances[$db_name])) {
            self::$instances[$db_name] = new Database($db_name);
        }
        return self::$instances[$db_name];
    }

    public function exec($sql)
    {
        return $this->db_connection->exec($sql);
    }

    public function query($sql)
    {
        return $this->db_connection->query($sql);
    }
}