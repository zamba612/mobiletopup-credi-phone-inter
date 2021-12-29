<?php
require(dirname(__FILE__) . '/../vendor/autoload.php'); 
//require 'vendor/autoload.php';
use Panda\Mobiletopup\Token;
$token=new Token();
$access_token=json_decode($token->token());
$phonenumber=$_POST['phonenumber'];
$countrieIso=$_POST['countrieIso'];
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://topups.reloadly.com/operators/auto-detect/phone/$phonenumber/countries/$countrieIso?suggestedAmountsMap=true&SuggestedAmounts=true",
  /*CURLOPT_URL => 'https://topups.reloadly.com/operators/auto-detect/phone/'.$phonenumber.'\/countries/'.$countrieIso.'?suggestedAmountsMap=true&SuggestedAmounts=true',*/
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/com.reloadly.topups-v1+json',
    "Authorization: Bearer $access_token->access_token"
  ),
));
$response = curl_exec($curl);
curl_close($curl);
echo $response;
