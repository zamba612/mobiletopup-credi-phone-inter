<?php

require(dirname(__FILE__) . '/../vendor/autoload.php'); 
use Panda\Mobiletopup\DBSQL;

$DB=new DBSQL();
    use PayPalCheckoutSdk\Core\PayPalHttpClient;
    use PayPalCheckoutSdk\Core\SandboxEnvironment;
  $DB->DB_PAYPAL_API();
    
    // Creating an environment
    $clientId = "$DB->client_id";
    $clientSecret = "$DB->client_secret";
        $environment = new SandboxEnvironment($clientId, $clientSecret);
      $client = new PayPalHttpClient($environment);
      echo json_encode($client);
    
