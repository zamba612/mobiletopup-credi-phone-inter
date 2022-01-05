<?php
$stripeEnv=array('test','live');

use Panda\Mobiletopup\DBSQL;

require(dirname(__FILE__) . '/../vendor/autoload.php'); 
$DB=new DBSQL();
for ($i=0; $i < count($stripeEnv); $i++) { 
  echo $stripeEnv[$i];
  $DB->DB_SELECT_STRIPE_CLIENT($stripeEnv[$i]);
  $stripe = new \Stripe\StripeClient(
    "$DB->stripeAp"
  );
  $cardnumber = $_POST['cardnumber'];
  $expiremonth = $_POST['expiremonth'];
  $expireyear = $_POST['expireyear'];
  $cvcnumber = $_POST['cvcnumber'];
  $amounttopay = $_POST['amount'] * 100;
  $currency = $_POST['currency'];
  $Method = $stripe->paymentMethods->create([
    'type' => 'card',
    'card' => [
      'number' => $cardnumber,
      'exp_month' => $expiremonth,
      'exp_year' => $expireyear,
      'cvc' => $cvcnumber,
    ],
  ]);
  
  $PayIntent = $stripe->paymentIntents->create([
    'amount' => $amounttopay,
    'currency' => $currency,
    'payment_method_types' => ['card']
  ]);
  
  $confirmpay = $stripe->paymentIntents->confirm(
    $PayIntent->id,
    ['payment_method' =>  $Method->id]
  );
  $array = array("data" => $confirmpay);
  echo json_encode($confirmpay);

 }


