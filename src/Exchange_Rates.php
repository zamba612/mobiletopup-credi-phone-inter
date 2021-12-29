<?php
namespace Panda\Mobiletopup;
use Exception;


class Exchange_Rates{
private $rater;
public function __construct() {

}
    function Exchange_Rates_fun(){
        $req_url = 'https://v6.exchangerate-api.com/v6/a37688b5496dc3c2b226870a/latest/EUR';
        $response_json = file_get_contents($req_url);
        
        // Continuing if we got a result
        if(false !== $response_json) {
        
            // Try/catch for json_decode operation
            try {
        
                // Decoding
                $response = json_decode($response_json);
        
                // Check for success
                if('success' === $response->result) {
        
                    // YOUR APPLICATION CODE HERE, e.g.
                   // $base_price = 12; // Your price in USD
                 //   $EUR_price = round(($base_price * $response->conversion_rates->USD), 2);
                  //  echo $EUR_price;
                 //   echo $response_json;
                    $this->rater=$response->conversion_rates->USD;
        
                }
        
            }
            catch(Exception $e) {
                $this->rater=$e;
            }
    }

return $this->rater;

}





}