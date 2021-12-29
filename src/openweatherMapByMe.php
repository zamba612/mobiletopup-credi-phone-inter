<?php
namespace Panda\Mobiletopup;

class openweatherMapByMe{
    public function __construct() {

    }
   function weatherByMe($citiesByMe){
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://community-open-weather-map.p.rapidapi.com/climate/month?q=$citiesByMe",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "x-rapidapi-host: community-open-weather-map.p.rapidapi.com",
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


    