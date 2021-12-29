<?php
$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://qrcode-monkey.p.rapidapi.com/qr/custom",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => "{\r
    \"data\": \"https://www.qrcode-monkey.com\",\r
    \"config\": {\r
        \"body\": \"rounded-pointed\",\r
        \"eye\": \"frame14\",\r
        \"eyeBall\": \"ball16\",\r
        \"erf1\": [],\r
        \"erf2\": [\r
            \"fh\"\r
        ],\r
        \"erf3\": [\r
            \"fv\"\r
        ],\r
        \"brf1\": [],\r
        \"brf2\": [\r
            \"fh\"\r
        ],\r
        \"brf3\": [\r
            \"fv\"\r
        ],\r
        \"bodyColor\": \"#5C8B29\",\r
        \"bgColor\": \"#FFFFFF\",\r
        \"eye1Color\": \"#3F6B2B\",\r
        \"eye2Color\": \"#3F6B2B\",\r
        \"eye3Color\": \"#3F6B2B\",\r
        \"eyeBall1Color\": \"#60A541\",\r
        \"eyeBall2Color\": \"#60A541\",\r
        \"eyeBall3Color\": \"#60A541\",\r
        \"gradientColor1\": \"#5C8B29\",\r
        \"gradientColor2\": \"#25492F\",\r
        \"gradientType\": \"radial\",\r
        \"gradientOnEyes\": false,\r
        \"logo\": \"\"\r
    },\r
    \"size\": 300,\r
    \"download\": false,\r
    \"file\": \"png\"\r
}",
	CURLOPT_HTTPHEADER => [
		"content-type: application/json",
		"x-rapidapi-host: qrcode-monkey.p.rapidapi.com",
		"x-rapidapi-key: 33aede1fccmshd696f79f698ab4ap1f37aajsn1c0a608f7e0d"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}
?>