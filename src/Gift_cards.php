<?php

namespace Panda\Mobiletopup;

use Panda\Mobiletopup\Token;

class Gift_cards
{

    public function __construct() {

    }
    function getAllProducts()
    {
        $token = new Token();
        $access_token = json_decode($token->Token_Gift_Card());

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://giftcards.reloadly.com/products',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $access_token->access_token",
                'Accept: application/com.reloadly.giftcards-v1+json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
    public function getGift_Product_By_ISO($the_Iso)
    {
        $token = new Token();
        $access_token = json_decode($token->Token_Gift_Card());

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://giftcards.reloadly.com/countries/$the_Iso/products",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $access_token->access_token",
                'Accept: application/com.reloadly.giftcards-v1+json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
    public function BY_GIFT_CARD($productID, $countrycode, $quantity, $unitprice, $identifier, $senderName, $reciepientemail, $countrycoder, $phoneNumber){
        $token = new Token();
        $access_token = json_decode($token->Token_Gift_Card());

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL , 'https://giftcards.reloadly.com/orders' );
curl_setopt($curl, CURLOPT_RETURNTRANSFER , TRUE);
curl_setopt($curl, CURLOPT_ENCODING , '');
curl_setopt($curl,  CURLOPT_MAXREDIRS , 10);
curl_setopt($curl, CURLOPT_TIMEOUT , 0);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION , TRUE);
curl_setopt($curl, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1);
curl_setopt($curl,  CURLOPT_CUSTOMREQUEST , 'POST');
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json",
    "Accept: application/com.reloadly.topups-v1+json",
    "Authorization: Bearer $access_token->access_token"
));
curl_setopt($curl, CURLOPT_POSTFIELDS ,"{
    \"productId\": \"$productID\",
    \"countryCode\": \"$countrycode\",
    \"quantity\": \"$quantity\",
    \"unitPrice\": \"$unitprice\",
    \"customIdentifier\": \"$identifier\",
    \"senderName\": \"$senderName\",
    \"recipientEmail\": \"$reciepientemail\",
    \"recipientPhoneDetails\": {
      \"countryCode\": \"$countrycoder\",
      \"phoneNumber\": \"$phoneNumber\"
    }
}");

/*curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://giftcards.reloadly.com/orders',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "productId": $productID,
    "countryCode": "US",
    "quantity": 1,
    "unitPrice": 1,
    "customIdentifier": "obucks10",
    "senderName": "John Doe",
    "recipientEmail": "anyone@email.com",
    "recipientPhoneDetails": {
      "countryCode": "NG",
      "phoneNumber": "8031934751"
    }
}',
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer $access_token->access_token",
    'Content-Type: application/json',
    'Accept: application/com.reloadly.giftcards-v1+json'
  ),
));*/

$response = curl_exec($curl);

curl_close($curl);
return $response;
    }
}
