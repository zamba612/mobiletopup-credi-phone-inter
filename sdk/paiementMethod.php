<?php
require(dirname(__FILE__) . '/../vendor/autoload.php'); 
//use Stripe\StripeClient;
$stripe = new \Stripe\StripeClient(
  'sk_test_51IKnFMJQ32cgRl5WkyhKDLDF3JtqNhpw0V041ngooz3QFVYSCmfywDAbIBQmZhCPthQeH9kMX6UWvTVOFZotpWnS000RhxVgjq'
);
//$stripe = new \Stripe\StripeClient//('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');
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
