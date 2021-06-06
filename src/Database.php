<?php 

declare(strict_types=1);

class Database{
    private $host = 'localhost';
    private $database = 'smartbees';
    private $user = 'pmarcinkow';
    private $password = 'qwerty';
    public PDO $connection;

    public function __construct(){
        $this->connect();
    }

    public function connect(){
        $dsn = "mysql:dbname={$this->database};host={$this->host}";
        $this->connection = new PDO($dsn, $this->user, $this->password);
    }
}