<?php

declare(strict_types=1);

require_once('Database.php');

class Item{
    public $id; //id przedmiotu w bazie danych
    public $name; //nazwa przedmiotu
    public $price; //cena jednostkowa przedmiotu
    public $quantity = 1; //ilość przedmiotów danego typu

    //konstruktor obiektu przedmiotu
    public function __construct(int $id){
        $this->id = $id;
        $productInfo = $this->getItemInfo($id);
        $this->name = $productInfo['name'];
        $this->price = $productInfo['price'];
    }

    //pobieranie z bazy danych informacji o przedmiocie o danym id
    private function getItemInfo(int $productId): array{
        $query = "SELECT * FROM products WHERE id = '$productId';";
        $this->conn = new Database();
        $result = $this->conn->connection->query($query);
        $queryResult = $result->fetch(PDO::FETCH_ASSOC);
        return $queryResult; 
    }
}