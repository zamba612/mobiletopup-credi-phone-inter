<?php

namespace Panda\Mobiletopup;


class travelsPayoutsByMe
{
    private $travelpayoutApi = array("api"=>array("e62bf3b620a5533a19b36007834783de","321d6a221f8926b5ec41ae89a3b2ae7b"));
 
    public function __construct() {

    } 
    function hostelsLocation()
    {
        //echo json_encode($travelpayoutApi['api']);
        for ($i=0; $i < count($this->travelpayoutApi['api']); $i++) { 
            $apicode= $this->travelpayoutApi['api'][$i];
    
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://engine.hotellook.com/api/v2/lookup.json?query=55.0291,82.9059&lang=ru&lookFor=both&limit=1&token=$apicode",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

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


    function flightseachfromcity($city)
    {
        //echo json_encode($travelpayoutApi['api']);
        for ($i=0; $i < count($this->travelpayoutApi['api']); $i++) { 
            $apicode= $this->travelpayoutApi['api'][$i];
    
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.travelpayouts.com/v1/city-directions?origin=$city&currency=usd",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "GET",
              CURLOPT_HTTPHEADER => array(
                "x-access-token: $apicode"
              ),
            ));
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            
            curl_close($curl);
            
            if ($err) {
              echo "cURL Error #:" . $err;
            } else {
              echo $response;
            }
    }
    }
    function AeroportsInfosByICIAO($iciao){
   

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://airport-info.p.rapidapi.com/airport?icao=$iciao",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: airport-info.p.rapidapi.com",
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
