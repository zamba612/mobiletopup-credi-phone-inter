<?php
namespace Panda\Mobiletopup;

class Token{
  public function __construct() {

  }

public function token(){
  $curl = curl_init();
  $connection=new DBSQL();
  $result=$connection->DB_TOKEN_RELOADLY_CLIENT_ID_SECRET();
  curl_setopt($curl,CURLOPT_URL , 'https://auth.reloadly.com/oauth/token');
  curl_setopt($curl,CURLOPT_RETURNTRANSFER , true);
  curl_setopt($curl,CURLOPT_ENCODING , '');
  curl_setopt($curl,CURLOPT_MAXREDIRS , 10);
  curl_setopt($curl,CURLOPT_TIMEOUT , 0);
  
  curl_setopt($curl,CURLOPT_FOLLOWLOCATION , true);
  curl_setopt($curl,CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1);
  curl_setopt($curl,CURLOPT_CUSTOMREQUEST , 'POST');
  curl_setopt($curl,CURLOPT_POSTFIELDS ,"{
      \"client_id\":\"$connection->client_id\",
      \"client_secret\":\"$connection->client_secret\",
    \"grant_type\":\"client_credentials\",
    \"audience\":\"https://topups.reloadly.com\"
    }");
    curl_setopt($curl,CURLOPT_HTTPHEADER , array(
      'Content-Type: application/json'
    ));
    $response = curl_exec($curl);
  
  curl_close($curl);
return $response;
}
public function Token_Gift_Card(){
$curl = curl_init();
$connection=new DBSQL();
$result=$connection->DB_TOKEN_RELOADLY_CLIENT_ID_SECRET();
curl_setopt($curl,CURLOPT_URL , 'https://auth.reloadly.com/oauth/token');
curl_setopt($curl,CURLOPT_RETURNTRANSFER , true);
curl_setopt($curl,CURLOPT_ENCODING , '');
curl_setopt($curl,CURLOPT_MAXREDIRS , 10);
curl_setopt($curl,CURLOPT_TIMEOUT , 0);

curl_setopt($curl,CURLOPT_FOLLOWLOCATION , true);
curl_setopt($curl,CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1);
curl_setopt($curl,CURLOPT_CUSTOMREQUEST , 'POST');
curl_setopt($curl,CURLOPT_POSTFIELDS ,"{
    \"client_id\":\"$connection->client_id\",
    \"client_secret\":\"$connection->client_secret\",
  \"grant_type\":\"client_credentials\",
  \"audience\":\"https://giftcards.reloadly.com\"
  }");
  curl_setopt($curl,CURLOPT_HTTPHEADER , array(
    'Content-Type: application/json'
  ));
  $response = curl_exec($curl);
curl_close($curl);
return $response;
}
/*
public function token(){
    $curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://auth.reloadly.com/oauth/token',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
	"client_id":"Aqs7NIjQgL09JOtbZlsl1kZe71YZv9Du",
	"client_secret":"9UYHh9bBkM-hz5Wynzxw9bShz4IIP1-aqefN12wnLMrMgHIcZ7TM9XMILGA1aOw",
	"grant_type":"client_credentials",
	"audience":"https://topups.reloadly.com"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));
$response = curl_exec($curl);
curl_close($curl);
return $response;
}
public function Token_Gift_Card(){
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://auth.reloadly.com/oauth/token',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
	"client_id":"Aqs7NIjQgL09JOtbZlsl1kZe71YZv9Du",
	"client_secret":"9UYHh9bBkM-hz5Wynzxw9bShz4IIP1-aqefN12wnLMrMgHIcZ7TM9XMILGA1aOw",
	"grant_type":"client_credentials",
	"audience":"https://giftcards.reloadly.com"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
return $response;
}*/
}
