<?php

require '../vendor/autoload.php';
require '../conf.php'; 

use \Mailjet\Resources;
$mj = new \Mailjet\Client($apiKey, $secretKey);
$body = [
    'FromEmail' => $fromEmail,
    'FromName' => $fromName,
    'Subject' => "Client contact!",
    // 'Text-part' => "Dear passenger, welcome to Mailjet! May the delivery force be with you!",
    'Html-part' => "<h3>Cordev.xyz contact for submission!</h3><br/>" .
        $_POST["name"] . " has contact you.<br/>" .
        "Their email is: " . $_POST["email"] . "<br/>
        And their message is: <br/>" .
         $_POST["message"],
    'Recipients' => [
        [
            'Email' => $fromEmail
        ]
    ]
];
$response = $mj->post(Resources::$Email, ['body' => $body]);
//$response->success();
//var_dump($response->getData());

header('Location: http://www.cordev.xyz/thankyou.html');