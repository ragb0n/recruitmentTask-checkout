<?php

require_once("Order.php");
require_once("Cart.php");

$response = [];

$cart = new Cart();
$newOrder = new Order($_POST, $cart);
$orderId = $newOrder->placeOrder(); //składanie zamówienia

$response['orderId'] = $orderId;  //numer zamówienia, potrzebny do wyświetlenia w podziękowaniu

echo json_encode($response);