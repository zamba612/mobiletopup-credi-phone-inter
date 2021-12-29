<?php

namespace Panda\Mobiletopup;

use Panda\Mobiletopup\Token;

class countries{
private $countrystatecityApi="emJndWxuSzN6bjFjWk1DRWF1VkROOHBITmw2NDF0N2Z5NEowSGtpVg==";
public $countriesByCityApi_rest=array();
    private  $response;
 public function __construct() {

    }

function countries_(){
    $token=new Token();
    $access_token=json_decode($token->token());
 

    $curl = curl_init();
    curl_setopt_array(
        $curl, array(
            CURLOPT_URL => 'https://topups.reloadly.com/countries?page=1&size=1',
            CURLOPT_RETURNTRANSFER => true,  CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,  CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/com.reloadly.topups-v1+json',
            "Authorization: Bearer $access_token->access_token"
            ),));
            $this->response = curl_exec($curl);
            curl_close($curl);
            return $this->response;

}
function countrie_2(){
$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://ajayakv-rest-countries-v1.p.rapidapi.com/rest/v1/all",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: ajayakv-rest-countries-v1.p.rapidapi.com",
		"x-rapidapi-key: 33aede1fccmshd696f79f698ab4ap1f37aajsn1c0a608f7e0d"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	return "cURL Error #:" . $err;
} else {
	return $response;
}
}
public function countriesByCityApi(){
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.countrystatecity.in/v1/countries',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HTTPHEADER => array(
        "X-CSCAPI-KEY: emJndWxuSzN6bjFjWk1DRWF1VkROOHBITmw2NDF0N2Z5NEowSGtpVg=="
      ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    echo $response; 
}
function countriesByCitydetails($countryISo){
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.countrystatecity.in/v1/countries/$countryISo",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HTTPHEADER => array(
        "X-CSCAPI-KEY: $this->countrystatecityApi"
      ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    return $response;
}
function statesByCitydetails(){
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.countrystatecity.in/v1/states',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HTTPHEADER => array(
        "X-CSCAPI-KEY: $this->countrystatecityApi"
      ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    return $response;
}
function statesByCountry($countryISo){
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.countrystatecity.in/v1/countries/$countryISo/states",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HTTPHEADER => array(
        "X-CSCAPI-KEY: $this->countrystatecityApi"
      ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    return $response;
}
function statesDetails($countryISo,$state){
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.countrystatecity.in/v1/countries/$countryISo/states/$state",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HTTPHEADER => array(
        "X-CSCAPI-KEY: $this->countrystatecityApi"
      ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    return $response;
}
function stateandcity($countryISo,$state){
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.countrystatecity.in/v1/countries/$countryISo/states/$state/cities",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HTTPHEADER => array(
        "X-CSCAPI-KEY: $this->countrystatecityApi"
      ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    return $response;
}
function citiesByCountry($countryISo){
  
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.countrystatecity.in/v1/countries/$countryISo/cities",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HTTPHEADER => array(
    "X-CSCAPI-KEY: $this->countrystatecityApi"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
    return $response;
    "https://countrystatecity.in/";
}
}
