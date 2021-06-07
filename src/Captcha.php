<?php

$captchaValidationResponse = [];

if($_POST['captchaResponse']) {

    $captcha = $_POST['captchaResponse'];
    $secret = "6LeUeRcbAAAAAOeE5g81X8PhusOjvC0fLGSzJ8RY";

    $captchaResponse = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=". $secret . "&response=" . $captcha));
    $captchaValidationResponse['answer'] = $captchaResponse;

    if($captchaResponse->success === true) {
        $captchaValidationResponse['status'] = 'valid';
     }else{
        $captchaValidationResponse['status'] = 'invalid';
        $captchaValidationResponse['message'] = 'Test niezaliczony!';
        }
}else{
    $captchaValidationResponse['status'] = 'noCaptcha';
    $captchaValidationResponse['message'] = 'Potwierdź, ze nie jesteś robotem!';

}

echo json_encode($captchaValidationResponse);