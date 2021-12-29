<?php
require(dirname(__FILE__) . '/../vendor/autoload.php'); 
use Panda\Mobiletopup\citiesByMe;
use Panda\Mobiletopup\countries;


$citiesByMe=new citiesByMe();
$countries=new countries();
echo $countries->countriesByCitydetails($_POST['countrieiso']);
//echo $citiesByMe->parameters_1($_POST['countrieiso']);

