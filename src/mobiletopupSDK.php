<?php
namespace Panda\Mobiletopup;

use Panda\Mobiletopup\Token;

class mobiletopupSDK{
  public $isoName;
  public  $name;
  public  $currencyCode;
  public  $currencyName;
  public  $currencySymbol;
  public  $flag;
  public  $callingCodes;
 public $id;
  public $operatorId;
  public $operatorname;
  public $bundle;
  public $data;
  public $pin;
  public $supportsLocalAmounts;
  public $supportsGeographicalRechargePlans;
  public $denominationType;
  public $senderCurrencyCode;
  public $senderCurrencySymbol;
  public $destinationCurrencyCode;
 public  $destinationCurrencySymbol;
 public  $commission;
  public $internationalDiscount;
  public $localDiscount;
 public $mostPopularAmount;
 public  $mostPopularLocalAmount;
 public $minAmount;
 public $maxAmount;
 public $localMinAmount;
 public $localMaxAmount;
 public $cisoNameex;
 public $cname;
 public $rate;
 public $ccurrencyCode;
 public $logoUrls;
 public $fixedAmounts;
public  $fixedAmountsDescriptions;
 public $localFixedAmounts;
 public $localFixedAmountsDescriptions;
 public $suggestedAmounts;
 public $suggestedAmountsMap;
 public $geographicalRechargePlans;
 public $promotions;
 



    function __construct() {

  }
function getAllTransanctions(){
    $token=new Token();
    $access_token=json_decode($token->token());
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://topups.reloadly.com/topups/reports/transactions',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer $access_token->access_token",
    'Accept: application/com.reloadly.topups-v1+json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
return $response;
}
function GET_FROM_RELOADLY_COUNTRIE_DETAILS($countrieisocode){
  $token=new Token();
  $access_token=json_decode($token->token());
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://topups.reloadly.com/countries/$countrieisocode",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => '',
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => 'GET',
CURLOPT_HTTPHEADER => array(
  "Authorization: Bearer $access_token->access_token",
  'Accept: application/com.reloadly.topups-v1+json'
),
));

$response = curl_exec($curl);

curl_close($curl);
$json=json_decode($response,true);
if ($json !==null) {
  $this->publicisoName=$json['isoName'];
  $this->name=$json['name'];
  $this->currencyCode=$json['currencyCode'];
  $this->currencyName=$json['currencyName'];
  $this->currencySymbol=$json['currencySymbol'];
  $this->flag=$json['flag'];
  $this->callingCodes=$json['callingCodes'];
}

return $this;

}
function GET_FROM_RELOADLY_OPERATOR_DETAILS($operatorCode){
  $token=new Token();
  $access_token=json_decode($token->token());
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://topups.reloadly.com/operators/$operatorCode?suggestedAmounts=true&suggestedAmountsMap=true",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => '',
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => 'GET',
CURLOPT_HTTPHEADER => array(
  "Authorization: Bearer $access_token->access_token",
  'Accept: application/com.reloadly.topups-v1+json'
),
));

$response = curl_exec($curl);
//echo $response;
curl_close($curl);
$json=json_decode($response,true);
if ($json !==null) {
 $this->id=$json['id'];
  $this->operatorId=$json['id'];
  $this->operatorname=$json['name'];
  $this->bundle=$json['bundle'];
  $this->data=$json['data'];;
  $this->pin=$json['pin'];
  $this->supportsLocalAmounts=$json['supportsLocalAmounts'];
  $this->supportsGeographicalRechargePlans=$json['supportsGeographicalRechargePlans'];
  $this->denominationType=$json['denominationType'];
  $this->senderCurrencyCode=$json['senderCurrencyCode'];
  $this->senderCurrencySymbol=$json['senderCurrencySymbol'];
  $this->destinationCurrencyCode=$json['destinationCurrencyCode'];
 $this->destinationCurrencySymbol=$json['destinationCurrencySymbol'];
 $this->commission=$json['commission'];
  $this->internationalDiscount=$json['internationalDiscount'];
  $this->localDiscount=$json['localDiscount'];
 $this->mostPopularAmount=$json['mostPopularAmount'];
 $this->mostPopularLocalAmount=$json['mostPopularLocalAmount'];
 $this->minAmount=$json['minAmount'];
 $this->maxAmount=$json['maxAmount'];
 $this->localMinAmount=$json['localMinAmount'];
 $this->localMaxAmount=$json['localMaxAmount'];
 $this->cisoNameex=$json['country']['isoName'];
 $this->cname=$json['country']['name'];
 $this->rate=$json['fx']['rate'];
 $this->ccurrencyCode=$json['fx']['currencyCode'];
 for ($i=0; $i < count($json['logoUrls']); $i++) { 
  //$this->logoUrls=$json['logoUrls'][$i];
 }
 $this->logoUrls=$json['logoUrls'][0];
 $this->fixedAmounts=$json['fixedAmounts'];
$this->fixedAmountsDescriptions=$json['fixedAmountsDescriptions'];
 $this->localFixedAmounts=$json['localFixedAmounts'];
 $this->localFixedAmountsDescriptions=$json['localFixedAmountsDescriptions'];
 $this->suggestedAmounts=$json['suggestedAmounts'];
 $this->suggestedAmountsMap=$json['suggestedAmountsMap'];
 $this->geographicalRechargePlans=$json['geographicalRechargePlans'];
 $this->promotions=$json['promotions'];
}else{
 // echo $response;
}

return $this;

  
}
public function GET_ALL_PROMOTIONS(){
  $token=new Token();
  $access_token=json_decode($token->token());
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://topups.reloadly.com/promotions',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer $access_token->access_token",
    "Accept: application/com.reloadly.topups-v1+json"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
return $response;

}
public function GET_ALL_OPERATORS_(){
  $token=new Token();
  $access_token=json_decode($token->token());

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://topups.reloadly.com/operators',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer $access_token->access_token",
    'Accept: application/com.reloadly.topups-v1+json',
  ),
));

$response = curl_exec($curl);

curl_close($curl);
return $response;
}
}