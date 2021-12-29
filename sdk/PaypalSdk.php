<?php

require(dirname(__FILE__) . '/../vendor/autoload.php'); 

    use PayPalCheckoutSdk\Core\PayPalHttpClient;
    use PayPalCheckoutSdk\Core\SandboxEnvironment;
  
    
    // Creating an environment
    $clientId = "AYHfbIk5WU4wf0ZPfOaVakJ4m8S9KHkMvaNMs8lx3EV2Lu0R7GkAfBRTgX4siJNPAEi1hk7VarNFcrvg";
    $clientSecret = "EPnQJraDW9FkwbhvqgJb1-JS5WAy0iJz5rjRLugVnSB66qw4PFwSlOsWsmnWpxzhpw4uuxB9KbV_H7o2";
        $environment = new SandboxEnvironment($clientId, $clientSecret);
      $client = new PayPalHttpClient($environment);
      echo json_encode($client);
   
    $client = new MongoDB\Client(
        'mongodb://edWYFLDxD9UoAjRB:edWYFLDxD9UoAjRB@cluster0-shard-00-00.ewz3u.gcp.mongodb.net:27017,cluster0-shard-00-01.ewz3u.gcp.mongodb.net:27017,cluster0-shard-00-02.ewz3u.gcp.mongodb.net:27017/mobiletopup?ssl=true&replicaSet=atlas-j16f6n-shard-0&authSource=admin&retryWrites=true&w=majority');
    $db = $client->mobiletopup;
    $insertOneResult = $db->paiements_list->insertOne([
        'item' => 'canvas',
        'qty' => 100,
        'tags' => ['cotton'],
        'size' => ['h' => 28, 'w' => 35.5, 'uom' => 'cm'],
    ]);
    echo json_encode($insertOneResult);
    