<?php

$secretKey = '6Lf1tBAbAAAAAF-NmibYnM-NwXeCC5UErKesjnBP';
$response= null;
$url =  "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey";
$verify = file_get_contents($url);

$responseData = json_encode($verify);

if($responseData->success):
    $email = !empty($_POST['email'])?$_POST['email']:'';
    $password = !empty($_POST['password'])?$_POST['password']:'';
    echo "captacha validated successfully.";
else:
    echo "Robot verification failed, please try again.";
endif;
else:
 echo 'invalid captcha';
endif;
else:
//Nothing
endif;
?>