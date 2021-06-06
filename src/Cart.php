<?php

declare(strict_types=1);

require_once('Item.php');

class Cart{
    public $items = []; //tablica przedmiotów (obiektów klasy "Item") znajdujących się w koszyku
    private $itemsNumber = 0; //liczba przedmiotów (różnych obiektów klasy "Item") w koszyku
    public $value = 0.00; //wartość łączna przedmiotów w koszyku

    //w przypadku niniejszego zadania "na sztywno" tworzony oraz dodawany do koszyka jest jeden obiekt przedmiotu o id = 1
    public function __construct(){
        $newItem = new Item(1);
        $this->addToCart($newItem);
    }

    //dodawanie do koszyka przedmiotu
    public function addToCart(Item $item): void{
        array_push($this->items, $item);
        $this->value += $item->price;
        ++$this->itemsNumber;
    }
}