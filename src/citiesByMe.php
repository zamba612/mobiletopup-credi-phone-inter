<?php
namespace Panda\Mobiletopup;

class citiesByMe{

    public function __construct() {

    }


    function parameters_1($countrieisocode){
        $curl = curl_init();
    
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://wft-geo-db.p.rapidapi.com/v1/geo/cities?countryIds=$countrieisocode",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "x-rapidapi-host: wft-geo-db.p.rapidapi.com",
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
    function parameters_2(){
        $curl = curl_init();
    
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://geodb-cities-graphql.p.rapidapi.com/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "content-type: application/json",
                "x-rapidapi-host: geodb-cities-graphql.p.rapidapi.com",
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