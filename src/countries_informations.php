<?php
namespace Panda\Mobiletopup;


use Exception;

class countries_informations{

    public function __construct() {

    }

    private $countries_iif;
    function countries_cities_peoples(){
       
        $req_url = ' https://countriesnow.space/api/v0.1/countries/population/cities';
        $response_json = file_get_contents($req_url);
        
        // Continuing if we got a result
        if(false !== $response_json) {
        
            // Try/catch for json_decode operation
            try {
        
                // Decoding
                $response = json_decode($response_json);
                $this->countries_iif=$response;
                // Check for success
                if('success' === $response->result) {
        
                    // YOUR APPLICATION CODE HERE, e.g.
                   // $base_price = 12; // Your price in USD
                 //   $EUR_price = round(($base_price * $response->conversion_rates->USD), 2);
                  //  echo $EUR_price;
                 //   echo $response_json;
                    $this->countries_iif=$response->conversion_rates->USD;
        
                }
        
            }
            catch(Exception $e) {
                $this->countries_iif=$e;
            }
    }

return json_encode($this->countries_iif);
    }
}
