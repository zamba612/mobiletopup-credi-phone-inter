<?php
namespace Panda\Mobiletopup;

use Panda\Mobiletopup\Token;


class topup{

  private $response;

   public function __construct($messageavotrerecepteur,$operatorcode, $amounttopay, $countrieIso, $phonenumber) {
      $token=new Token();
      $access_token=json_decode($token->token());
$ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, "https://topups.reloadly.com/topups");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($ch, CURLOPT_HEADER, FALSE);

  curl_setopt($ch, CURLOPT_POST, TRUE);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      "Content-Type: application/json",
      "Accept: application/com.reloadly.topups-v1+json",
      "Authorization: Bearer $access_token->access_token"
  ));
  
  curl_setopt($ch, CURLOPT_POSTFIELDS, "{
\"recipientPhone\": {
\"countryCode\": \"$countrieIso\",
\"number\": \"$phonenumber\" 
},
\"operatorId\": $operatorcode,
\"amount\": $amounttopay,
\"customIdentifier\": \"$messageavotrerecepteur\"
}");

  $this->response = curl_exec($ch);
  curl_close($ch);
  return $this->response;
    }

}