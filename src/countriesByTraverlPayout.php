<?php
namespace Panda\Mobiletopup;

class countriesByTraverlPayout{


    public function __construct() {

    }

    function parameters_2(){
        $curl = curl_init();
    $countries_jon="https://api.travelpayouts.com/data/en/countries.json";
    curl_setopt_array($curl, [
        CURLOPT_URL => $countries_jon,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "x-access-token: e62bf3b620a5533a19b36007834783de",
            "x-rapidapi-host: travelpayouts-travelpayouts-flight-data-v1.p.rapidapi.com",
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
    

}