<?php

require_once './vendor/autoload.php';

use Twilio\Rest\Client;

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

// Your Account Sid and Auth Token from twilio.com/console
$sid    = getenv("TWILIO_ACCOUNT_SID");
$token  = getenv("TWILIO_AUTH_TOKEN");
$twilio = new Client($sid, $token);
<?php
//...
$codes = ["chocolate", "vanilla", "strawberry", "mint-chocolate-chip", "cookies-n-cream"];

$message = $twilio->messages
   ->create("whatsapp:".getenv("MY_WHATSAPP_NUMBER"),
       [
           "body" => "Your ice-cream code is ".$codes[rand(0,4)],
           "from" => "whatsapp:".getenv("TWILIO_WHATSAPP_NUMBER")
       ]
   );

print($message->sid);