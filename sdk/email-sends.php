<?php
require(dirname(__FILE__) . '/../vendor/autoload.php'); 
use Panda\Mobiletopup\countries_informations;

/*$countriesApi=new countries_informations();
echo json_encode($countriesApi);*/
$url = 'https://countriesnow.space/api/v0.1/countries/population/cities';

$curlSession = curl_init();
curl_setopt($curlSession, CURLOPT_URL, $url);
curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

$jsonData = json_decode(curl_exec($curlSession));
echo json_encode($jsonData);
/*use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//require $_SERVER['DOCUMENT_ROOT'] . '/mail/Exception.php';
//require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailer.php';
//require $_SERVER['DOCUMENT_ROOT'] . '/mail/SMTP.php';
//require './Exception.php';
//require './PHPMailer.php';
//require './SMTP.php';
$mail = new PHPMailer();
$mail->isSMTP(); 
$mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 587; // TLS only
$mail->SMTPSecure = 'tls'; // ssl is deprecated
$mail->SMTPAuth = true;
$mail->Username = 'mantemotusiaminabob@gmail.com'; // email
$mail->Password = 'diakanua'; // password
$mail->setFrom($_POST['email'], $_POST['nom']); // From email and name
$mail->addAddress($_POST['email'], $_POST['nom']); // to email and name
//$mail->addReplyTo('paydirectwithme@gmail.com', "Reply");
$mail->addReplyTo('mantemotusiaminabob@gmail.com', "Reply");
//CC and BCC
//$mail->addCC('paydirectwithme@gmail.com');
$mail->addBCC('mantemotusiaminabob@gmail.com');
$mail->Subject = $_POST['subject'];
$mail->msgHTML($_POST['message']); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
$mail->AltBody =$_POST['message']; // If html emails is not supported by the receiver, show this body
// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
$mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
if(!$mail->send()){
    echo "Mailer Error: " . $mail->ErrorInfo;
}else{
    echo "Message sent!";
}*/

