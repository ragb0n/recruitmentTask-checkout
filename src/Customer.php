<?php

declare(strict_types=1);

require_once('Database.php');

class Customer{
    public $login;
    public $password;
    public $name;
    public $surname;
    public $country;
    public $address;
    public $postalCode;
    public $city;
    public $phone;
    private $newsletter;
    private Database $conn;

    public function __construct(array $customer){
        $this->login = $customer['login'] ?? null;
        if(!isset($customer['password'])){
            $this->password = null;
        }else{
            $this->password = password_hash($customer['password'], PASSWORD_BCRYPT);
        }
        $this->name = $customer['name'];
        $this->surname = $customer['surname'];
        $this->country = $customer['country'];
        $this->address = $customer['address'];
        $this->postalCode = $customer['postalCode'];
        $this->city = $customer['city'];
        $this->phone = $customer['phone'];
        $this->newsletter = $customer['newsletter'];
    }

    //dodawanie klienta do bazy
    public function addCustomer(): int{
        try{
            $login = $this->login;
            $password = $this->password;
            $name = $this->name;
            $surname = $this->surname;
            $address = $this->address;
            $postalCode = $this->postalCode;
            $city = $this->city;
            $country = $this->country;
            $phone = $this->phone;

            $query = "INSERT INTO customers(login, password, name, surname, address, postal_code, city, country, phone) VALUES (
                '$login', 
                '$password', 
                '$name', 
                '$surname', 
                '$address',
                '$postalCode',
                '$city',
                '$country',
                '$phone'
                );";
            $this->conn = new Database();
            $this->conn->connection->query($query);
            $newUserId = intval($this->conn->connection->lastInsertId());
            if($this->newsletter == 'true'){
                $this->newsletterSignUp($newUserId);
            }return $newUserId;
        }catch(Throwable $e){
            echo $e;
        }
    }

    public function newsletterSignUp(int $userId): void{
        try{
            $query = "INSERT INTO newsletter_list VALUES ('$userId');";
            $this->conn = new Database();
            $this->conn->connection->query($query);
        }catch(Throwable $e){
            echo $e;
        }
    }
}