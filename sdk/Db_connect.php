<?php
//require 'vendor/autoload.php';
require(dirname(__FILE__) . '/../vendor/autoload.php'); 
use Panda\Mobiletopup\DBSQL;

$DBSQL = new DBSQL();
if (isset($_POST['register']) == "register") {
    echo $DBSQL->DB_INSERT($_POST['username'], $_POST['password'], $_POST['country']);    
}
if (isset($_POST['update_username_by_id']) == "update_username_by_id") {
    echo $DBSQL->DB_UPDATE_USERNAME($_POST['username'], $_POST['id']);
}
if (isset($_POST['update_password_by_id']) == "update_password_by_id") {
    echo $DBSQL->DB_UPDATE_PASSWORD($_POST['password'], $_POST['id']);
}
if (isset($_POST['login']) == "login") {
    $DBSQL->DB_SELECT_USER($_POST['username'], $_POST['password']);
}
if (isset($_POST['get_only_by_username']) == "get_only_by_username") {
    $DBSQL->DB_SELECT_USER_BY_USERNAME($_POST['username']);
}
if (isset($_POST['get_only_by_password']) == "get_only_by_password") {
    $DBSQL->DB_SELECT_USER_BY_PASSWORD($_POST['password']);
}
if (isset($_POST['get_only_by_id']) == "get_only_by_id") {
    $DBSQL->DB_SELECT_USER_BY_ID($_POST['id']);
}
if (isset($_POST['get_only_by_password']) == "get_only_by_password") {
    $DBSQL->DB_SELECT_USER_BY_PASSWORD($_POST['password']);
}
if (isset($_POST['delete_only_from_id']) == "delete_only_from_id") {
    $DBSQL->DB_DELETE_USER($_POST['id']);
}
if (isset($_POST['insert_transanction'])=="paypal") {
  echo $DBSQL->DB_CREATE_PAYPAL_DATAS($_POST['firebaseid'],
  $_POST['payid'],$_POST['amount'],$_POST['currency'],$_POST['status'],$_POST['username']);
}
if (isset($_POST['insert_transanction'])=="topup") {
    echo $DBSQL->DB_CREATE_MOBILE_TOPUP_DATAS($_POST['firebaseid'],
    $_POST['Tocountry'],
    $_POST['payamount'],
    $_POST['paycurrency'],
    $_POST['rechargeNumber'],
    $_POST['transanctionid'],
    $_POST['date_heure'],
    $_POST['operatorName'],
    $_POST['operatorId'],
    $_POST['username']);
  }
  if (isset($_POST['deconnect_to_system'])=="deconnect_now") {
      echo $DBSQL->DB_SELECT_USER_BY_ID_DECONNECT_SYSTEM($_POST['id']);
  }
  if (isset($_POST['when_system_is_active'])=="deconnect_now") {
    echo $DBSQL->DB_SELECT_USERNAME_VERIFICATION_ACTIVITIES($_POST['username']);
}
if (isset($_POST['commencerAchats'])=="Rechargefacile") {
  
     $DBSQL->DB_PAGES_WEB_ACTION($_POST['page']);
    // echo $DBSQL->pageid;
    // echo $DBSQL->page;
     echo $DBSQL->pagehash;
  
}
/*
$connection=mysqli_connect('localhost','root','','habitants-gresilles');
$query="select * from habitants";
if($jquery=mysqli_query($connection, $query)){{
while($conditions=mysqli_fetch_array($jquery)){
echo json_encode($conditions);
}
}}
$curl = curl_init();
curl_setopt_array(
    $curl, array(
        CURLOPT_URL => 'https://topups.reloadly.com/countries?page=1&size=1',
        CURLOPT_RETURNTRANSFER => true,  CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,  CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Accept: application/com.reloadly.topups-v1+json',
        'Authorization: Bearer eyJraWQiOiIwMDA1YzFmMC0xMjQ3LTRmNmUtYjU2ZC1jM2ZkZDVmMzhhOTIiLCJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiI3Njc4IiwiaXNzIjoiaHR0cHM6Ly9yZWxvYWRseS5hdXRoMC5jb20vIiwiaHR0cHM6Ly9yZWxvYWRseS5jb20vc2FuZGJveCI6ZmFsc2UsImh0dHBzOi8vcmVsb2FkbHkuY29tL3ByZXBhaWRVc2VySWQiOiI3Njc4IiwiZ3R5IjoiY2xpZW50LWNyZWRlbnRpYWxzIiwiYXVkIjoiaHR0cHM6Ly90b3B1cHMtaHMyNTYucmVsb2FkbHkuY29tIiwibmJmIjoxNjMxODc2ODE3LCJhenAiOiI3Njc4Iiwic2NvcGUiOiJzZW5kLXRvcHVwcyByZWFkLW9wZXJhdG9ycyByZWFkLXByb21vdGlvbnMgcmVhZC10b3B1cHMtaGlzdG9yeSByZWFkLXByZXBhaWQtYmFsYW5jZSByZWFkLXByZXBhaWQtY29tbWlzc2lvbnMiLCJleHAiOjE2MzcwNjQ0MTcsImh0dHBzOi8vcmVsb2FkbHkuY29tL2p0aSI6ImJlMWJkOGJhLWY5MTMtNGRlZi05M2JmLTc1ZWZkMWJlYjkwMSIsImlhdCI6MTYzMTg3NjgxNywianRpIjoiNDVjYzc5MmQtOTY1NC00YWU4LWIwNTItN2M2NWM1ZmMyZDcyIn0.z06tGoqhs90B1589skDtcHo9oUYLPKsMPTWd_usNREw'
        ),));
        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
        */