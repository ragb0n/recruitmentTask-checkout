<?php

require_once('Order.php');
require_once('Cart.php');

$errors = [];
$data = [];

if(!empty($_POST['password']) && empty($_POST['repeatPassword'])){
    $errors['repeatPassword'] = 'Podaj hasło ponownie!';
}

if(empty($_POST['password']) && !empty($_POST['repeatPassword'])){
    $errors['password'] = 'Podaj hasło!';
}

if(!empty($_POST['password'] && !empty($_POST['repeatPassword']))){
    if($_POST['password'] != $_POST['repeatPassword']){
        $errors['repeatPassword'] = 'Hasła nie są identyczne!';
    }
}

if (empty($_POST['name'])) {
    $errors['name'] = 'To pole nie może być puste!';
}else{
    if(strlen($_POST['name']) > 20){
        $errors['name'] = 'Maksymalnie 20 znaków!';
    }
    if(!preg_match('/^[a-zA-ZąęćżźńłóśĄĆĘŁŃÓŚŹŻ\s]+$/', $_POST['name'])){
        $errors['name'] = 'Imię może zawierać wyłącznie litery!';
    }
}

if (empty($_POST['surname'])) {
    $errors['surname'] = 'To pole nie może być puste!';
}else{
    if(strlen($_POST['surname']) > 20){
        $errors['surname'] = 'Maksymalnie 30 znaków!';
    }
    if(!preg_match('/^[a-zA-ZąęćżźńłóśĄĆĘŁŃÓŚŹŻ\s]+$/', $_POST['surname'])){
        $errors['surname'] = 'Nazwisko może zawierać wyłącznie litery!';
    }
}

if (empty($_POST['address'])) {
    $errors['address'] = 'To pole nie może być puste!';
}else{
    if(strlen($_POST['address']) > 50){
        $errors['address'] = 'Maksymalnie 30 znaków!';
    }
}

if (empty($_POST['postalCode'])) {
    $errors['postalCode'] = 'To pole nie może być puste!';
}else{
    if(!preg_match('/^[0-9]{2}-?[0-9]{3}$/Du', $_POST['postalCode'])){
        $errors['postalCode'] = 'Niepoprawny format kodu pocztowego!';
    }
}

if (empty($_POST['city'])) {
    $errors['city'] = 'To pole nie może być puste!';
}else{
    if(strlen($_POST['city']) > 50){
        $errors['city'] = 'Maksymalnie 50 znaków!';
    }
}

if (isset($_POST['diffAddress']) && empty($_POST['diffAddress'])) {
    $errors['diffAddress'] = 'To pole nie może być puste!';
}else{
    if(isset($_POST['diffAddress']) && strlen($_POST['diffAddress']) > 50){
        $errors['diffAddress'] = 'Maksymalnie 30 znaków!';
    }
}

if (isset($_POST['diffPostalCode']) && empty($_POST['diffPostalCode'])) {
    $errors['diffPostalCode'] = 'To pole nie może być puste!';
}else{
    if(isset($_POST['diffPostalCode']) && !preg_match('/^[0-9]{2}-?[0-9]{3}$/Du', $_POST['diffPostalCode'])){
        $errors['diffPostalCode'] = 'Niepoprawny format kodu pocztowego!';
    }
}

if (isset($_POST['diffCity']) && empty($_POST['diffCity'])) {
    $errors['diffCity'] = 'To pole nie może być puste!';
}else{
    if(isset($_POST['diffPostalCode']) && strlen($_POST['diffCity']) > 50){
        $errors['diffCity'] = 'Maksymalnie 50 znaków!';
    }
}

if (empty($_POST['phone'])) {
    $errors['phone'] = 'To pole nie może być puste!';
}else{
    if(!preg_match('/^[0-9]{9}$/Du', $_POST['phone'])){
        $errors['phone'] = 'Niepoprawny format numeru telefonu!';
    }
}

if (empty($_POST['delivery'])) {
    $errors['delivery'] = 'To pole nie może być puste!';
}

if (empty($_POST['payment'])) {
    $errors['payment'] = 'To pole nie może być puste!';
}

if (!empty($_POST['comment']) && strlen($_POST['comment']) > 100) {
    $errors['comment'] = 'Komentarz do zamówienia może zawierać maksymalnie 100 znaków!';
}

if (!empty($_POST['rules']) && $_POST['rules'] == 'false') {
    $errors['rules'] = 'Musisz zaakceptować regulamin!';
}

if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $data['success'] = true;
    $data['message'] = 'Success!';
}

echo json_encode($data);