<?php




 require 'PaypalSdk.php';

 $id="55223666";
 use PayPalHttp\HttpException;
 use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
 $response=array();
 $request = new OrdersCreateRequest();
 $request->prefer('return=representation');
 $request->body = [
    "intent" => "CAPTURE",
    "purchase_units" => [[
        "reference_id" => "699556699",
        "amount" => [
            "value" => '2,30',
            "currency_code" => 'eur'
        ]
    ]],
    "application_context" => [
         "cancel_url" => "https://webhostzamba.000webhostapp.com/wallets/Firebase/return.php?id=$id",
         "return_url" => "https://webhostzamba.000webhostapp.com/wallets/Firebase/return.php?id=$id"
    ] 
];
/* $request->body = [
                      "intent" => "CAPTURE",
                      "purchase_units" => [[
                          "reference_id" => $_GET['referenceID'],
                          "amount" => [
                              "value" => $_GET['amount'],
                              "currency_code" => $_GET['currency']
                          ]
                      ]],
                      "application_context" => [
                           "cancel_url" => "https://webhostzamba.000webhostapp.com/wallets/Firebase/return.php?id=$id",
                           "return_url" => "https://webhostzamba.000webhostapp.com/wallets/Firebase/return.php?id=$id"
                      ] 
                  ];*/
 
 try {
     $response = $client->execute($request);
    
 }catch (HttpException $ex) {
     $response= $ex->statusCode;
  
 }





 /*if (isset($_GET['amount']) && isset($_GET['currency']) && isset($_GET['referenceID']) && isset($_GET['currentid'])) {
  

 } else {
     $response="Nothing to show";
 }*/
 echo json_encode($response);
 
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/assets.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
   
    <title>TopUP</title>
</head>
<body>
<div class="choisir-paiement-method">


  
            <div class="pay-pal">
            PayPal

            </div>
            <div class="bank-account">
                Bank
            </div>
            <div class="card-paiement-temp">Card</div>
        </div>
     
   <div id="paypal-button-container"></div>

   <script src="https://www.paypal.com/sdk/js?client-id=EFWl2MDWNNws6Pa8WdWaC-ZRZ9d4y9oGWio5Kd9Fu3t4UjCBT1udmv9UX2XGNiHTpbK7ur0xusyT4u6I"> // Required. Replace YOUR_CLIENT_ID with your sandbox client ID.
  </script>
 <script>paypal.Buttons().render('body');</script>

</body>
</html>