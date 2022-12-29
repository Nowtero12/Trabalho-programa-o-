<?php

class Database
{
    private $host = "localhost";
    
    private $db_name = "trabalho";
    
    private $username = "root";
    
    private $password = "";
    
    private $connection;
    
    public function __construct()
    {
        $this->setConnection();
    }
    
    public function getConnection()
    {
        return $this->connection;
    }
    
    private function setConnection()
    {
        $dsn = "mysql:host={$this->host};dbname={$this->db_name}";
        $connection = new PDO($dsn, $this->username, $this->password, [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION
        ]);
        $this->connection = $connection;
    }
}