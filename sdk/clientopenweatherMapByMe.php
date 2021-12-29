<?php


require(dirname(__FILE__) . '/../vendor/autoload.php'); 
use Panda\Mobiletopup\openweatherMapByMe;

$openweatherMapByMe=new openweatherMapByMe();
echo $openweatherMapByMe->weatherByMe($_POST['citie']);


