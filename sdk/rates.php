<?php
require(dirname(__FILE__) . '/../vendor/autoload.php'); 
use Panda\Mobiletopup\Exchange_Rates;

$exchange=new Exchange_Rates();

echo $exchange->Exchange_Rates_fun();

?>