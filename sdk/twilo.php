<?php
require(dirname(__FILE__) . '/../vendor/autoload.php'); 

use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$account_sid = 'ACfec3a90672a88013559be154ed4d8b80';
$auth_token = 'c16b4f4b1744390b91dbc508c83df3fa';
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

// A Twilio number you own with SMS capabilities
$twilio_number = "+18129682008";

$client = new Client($account_sid, $auth_token);
$messageResponse= $client->messages->create(
    // Where to send a text message (your cell phone?)
    $_POST['phonenumber'],
    array(
        'from' => $twilio_number,
        'body' =>  $_POST['message']
    )
);
if ($messageResponse) {
    echo "Message envoyé";
}
