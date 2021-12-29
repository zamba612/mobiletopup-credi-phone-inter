<?php
$citie=$_POST['citie'];
$url = "api.openweathermap.org/data/2.5/weather?q=$citie&appid=69954df3183ef6533be3a0831f34aa13";

$curlSession = curl_init();
curl_setopt($curlSession, CURLOPT_URL, $url);
curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

$jsonData = json_decode(curl_exec($curlSession));
echo json_encode($jsonData);


//https://travelpayouts.github.io/slate/?php#,https://rapidapi.com/Travelpayouts/api/flight-data/,https://app.travelpayouts.com/programs/100/tools/landings