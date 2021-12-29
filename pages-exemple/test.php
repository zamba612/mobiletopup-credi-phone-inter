<?php
require 'vendor/autoload.php';

use Panda\Mobiletopup\DBSQL;
use Panda\Mobiletopup\Token;
use Panda\Mobiletopup\countries;
use Panda\Mobiletopup\citiesByMe;
use Panda\Mobiletopup\Gift_cards;
use Panda\Mobiletopup\iatacodesByMe;
use Panda\Mobiletopup\mobiletopupSDK;
use Panda\Mobiletopup\travelsPayoutsByMe;
use Google\Cloud\Firestore\FirestoreClient;

$iatas=new iatacodesByMe();
$hostelLocation=new travelsPayoutsByMe();
$flightsearch=new travelsPayoutsByMe();
$aeroportsInfo=new travelsPayoutsByMe();
$cities=new citiesByMe();
$transanction=new mobiletopupSDK();
$token=new Token();
$gift_card=new Gift_cards();
$connection=new DBSQL();
$result=$connection->DB_SELECT_USER_BY_ID("5");
echo $connection->username;
/*
echo $hostelLocation->hostelsLocation();
echo $flightsearch->flightseachfromcity("FIH");
echo $cities->parameters_2();
echo $iatas->aeroports_datas();
echo $aeroportsInfo->AeroportsInfosByICIAO("LSGG");
$countries=new countries();
$response=$countries->countriesByCityApi();

echo $countries->countriesByCitydetails("cd");


$random=random_int(125,445);
echo $connection->DB_INSERT($random,$random);
//echo $connection->DB_SELECT_USER("test 1","test 2");

echo $connection->DB_UPDATE_USERNAME($random,$random);

echo $connection->DB_UPDATE_PASSWORD($random,"5");

echo json_encode($connection->id);
echo $connection->DB_DELETE_USER($connection->id);
//echo "Result All\n".json_encode($connection->DB_SELECT_ALL_USERS())."\nENd";
$result=array();
$result=$connection->DB_SELECT_ALL_USERS();
$json1=json_decode($result, true);
foreach ($json1 as $key => $value) {
   echo $value['id'];
}

echo json_encode($connection->status);
echo json_encode($connection->username);


$curl = curl_init();
    
curl_setopt_array($curl, [
    CURLOPT_URL => "https://api-m.sandbox.paypal.com/v1/invoicing/invoices?page=3&page_size=4&total_count_required=true",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json",
        "Authorization: Bearer ew0KICAiYWxnIjogIm5vbmUiDQp9.ew0KICAiaXNzIjogImNsaWVudF9pZCIsDQogICJwYXllcl9pZCI6ICJtZXJjaGFudF9wYXllcl9pZCINCn0=."
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
echo $response;*/


/**
 * Initialize Cloud Firestore with default project ID.
 */
function setup_client_create(string $projectId = null)
{
    // Create the Cloud Firestore client
    if (empty($projectId)) {
        // The `projectId` parameter is optional and represents which project the
        // client will act on behalf of. If not supplied, the client falls back to
        // the default project inferred from the environment.
        $db = new FirestoreClient();
        printf('Created Cloud Firestore client with default project ID.' . PHP_EOL);
    } else {
        $db = new FirestoreClient([
            'projectId' => $projectId,
        ]);
        printf('Created Cloud Firestore client with project ID: %s' . PHP_EOL, $projectId);
    }
}
$projectId="mobiletopup-2f33c";
$db = new FirestoreClient([
    'projectId' => $projectId,
]);
$docRef = $db->collection('samples/php/users')->document('lovelace');
$docRef->set([
    'first' => 'Ada',
    'last' => 'Lovelace',
    'born' => 1815
]);
printf('Added data to the lovelace document in the users collection.' . PHP_EOL);
/*

$factory = (new Factory)->withServiceAccount('mobiletopup-2f33c-e1a96f7b5671.json')
->withDatabaseUri('https://mobiletopup-2f33c-default-rtdb.asia-southeast1.firebasedatabase.app/');


$firestore = $factory->createFirestore();
$database = $firestore->database();
$cityRef = $database->collection('samples/php/cities')->document('DC');
$cityRef->add([
    ['path' => 'capital', 'value' => true]
]);
# [END firestore_data_set_field]
# [END fs_update_doc]




$factory = (new Factory)
    ->withServiceAccount('mobiletopup-2f33c-e1a96f7b5671.json')
    ->withDatabaseUri('https://mobiletopup-2f33c-default-rtdb.asia-southeast1.firebasedatabase.app/');

$firestore = $factory->createFirestore();
*/

?>
<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['username'])) {
    if ($_SESSION['username'] !== '') {
        echo  $_SESSION['username'];
    } else {
        echo 'session';
    }
}
?>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/assets.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>

    <title>Recharges mobiles</title>
</head>

<body>
    <header>

        <div class="navigation">
            <div class="menu-m-left">
                <h3>Recharge mobile International</h3>
                <div class="my-account-user-interface">
                    <article>
                        <span id="username-interface-n"></span>
                    </article>
                </div>
            </div>
            <div class="menu-m-center">
                <article>

                    <img src="assets/images/mobile-iphone.jpg" alt="mobile-iphone" srcset="">
                </article>

            </div>
            <div class="menu-m-right">
                <div class="interface-user">
                    <img src="assets/images/menu.png" alt="menu-icon">


                </div>
            </div>
        </div>
    </header>


    <div class="contenair" id="contenair">
        <nav>

            <div id="regit">
                <div class="interface-users-button">
                <button id="login-interface" type="button">
                    Login
                </button>
                <button id="registration-interface" type="button">
                    Registration
                </button>
                </div>
               
                <div id="registration">

                    <div id="item-1" class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Username</span>
                        <input type="text" id="username" class="form-control">
                    </div>
                    <div id="item-2" class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Password</span>
                        <input type="text" id="password" class="form-control">
                    </div>
                    <div id="item-3" class="input-group input-group-sm mb-3">
                        <button type="button" id="p-registration" class="form-control">Registration</button>
                    </div>
                </div>
             
            </div>

        </nav>
        <div class="contenair-items" id="contenair_items_">

        </div>

        <div class="contenair-items" id="contenair_items_1">
            <article>
                <h1>Commencer votre recharge.</h1>
                <label for="countries">Choisir le pays de destination:</label><br>
                <select id="countries">
                    <?php
                    require 'vendor/autoload.php';

                   
                    use Panda\Mobiletopup\countriesByTraverlPayout;

                    $countriesByTravel = new countriesByTraverlPayout();
                    $countries = new countries();
                    //echo json_encode($countriesByTravel);
                    $result = json_decode($countriesByTravel->parameters_2(), true);
                    echo "<option>Selectionner le pays</option>";
                    /*  foreach ($result as $key => $value) {
                        echo json_encode($value);
                        echo "<option value='" . $value['code'] . "'>" . $value['name'] . "</option>";
                    }*/
                    $result = json_decode($countries->countries_(), true);
                    foreach ($result as $key => $value) {
                        echo "<option value='" . $value['isoName'] . "'>" . $value['name'] . "</option>";
                    }

                    ?>
                </select>


                <?php

                // echo json_encode($countries);
                ?>

            </article>
        </div>

        <div class="contenair-items" id="contenair_items_2">
            <div class="phone-search-items">
                <div class="image-1-details">
                    <div class="div-spans">
                        <span> <strong id="isoName"></strong></span>
                        <span> <strong id="countrieName"></strong></span>
                        <span> <strong id="currencyName"></strong></span>
                        <span> <strong id="currencyCode"></strong></span>
                        <span> <strong id="currencySymbol"></strong></span>
                    </div>

                    <div class="flags">
                        <img id="flag" alt="" srcset="">
                    </div>
                    <div class="telephone-receiver">
                        <div id="operator-syntax"></div>
                        <article>
                            <div class="title">
                                <h3>Numéro de téléphone à recharger :</h3>
                            </div>
                            <div class="telephone-bo">
                                <strong id="phonecallnumber">+243</strong>
                                <input type="number" id="phonenumber">
                                <button id="test_btn" type="button">Recherche</button>
                            </div>
                        </article>


                    </div>

                </div>
             
            </div>
           

        </div>
        <div class="contenair-items" id="contenair_items_3">
            <div class="pay-detail">
                <div class="operator-detail">
                    <div class="operatorglag">
                        <img id="operatorflag" alt="operatorflag" srcset="">
                    </div>
                    <div class="operatordetails">
                        <strong id="thephonumbertocharge"></strong>
                        <div class="operator-zam" id="operator-zam">
                            <strong id="operatorName"></strong>
                            <input type="text" id="operatorid" readonly>
                        </div>
                        <div id="suggestion_amount">
                            <strong id="montant-minimum"></strong>
                            <strong id="montant-maximum"></strong>
                            <div id="taux-echange">
                                <strong id="taux_echanges">Taux : </strong>

                                <input type="text" readonly id="rate-amount-send" value="1">
                                <strong id="sender-currency"></strong>
                                <strong id="equal-selector"> = </strong>
                                <input type="text" readonly id="rate-amount">
                                <strong id="receiver-currency"></strong>
                            </div>
                        </div>
                        <div class="sender-amount-detail">
                            <div class="sender-amount-calc">
                                <h3>Renseignez le montant de votre recharge en :
                                    <span id="sendercurrency">
                                    </span>
                                </h3>
                                <div id="suggestions-amont">

                                </div>
                                <div class="send-item" id="send-item">
                                    <strong id="sendercurrencysymbol">$</strong>
                                    <input type="number" id="montantecharge">
                                </div>
                            </div>
                            <div class="receiv-item" id="receiv-item">
                                <strong id="changecurrency">XFC</strong>
                                <input type="text" readonly id="receiveramount">
                            </div>
                            <div class="item-sender" id="item-sender">
                                <button type="button" id="make-top-up">TOP UP HERE</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
        <script src="https://www.paypal.com/sdk/js?client-id=AZk9zYQBj0WiRNkSGrGep9bhXcUULGFEO_jGWolxaIvw555J3yTk86qo3nmIa15vJR51XmkjRiQ7K5Zs&currency=EUR"></script>

        <div class="choisir-paiement-method" id="choisir-paiement-method">



            <div class="pay-pal" id="pay-pal">
                <div class="pay-direct-items">
                    <span id="amount-you-get">12$
                    </span>
                    <div id="response"></div>
                    <div class="paiement-details-1">

                        <span id="phone_number"></span>
                        <span id="receiv_amount"></span>
                        <span id="commission"></span>
                        <span id="frais_bank"></span>
                    </div>

                </div>

                <div id="paypal-button-container"></div>
                <script>
                    firebase.initializeApp({
                        apiKey: "AIzaSyCkM1-n-Bfbsrc3VmPjvQQog3ixCZ3U2CU",
                        authDomain: "mobiletopup-2f33c.firebaseapp.com",
                        databaseURL: "https://mobiletopup-2f33c-default-rtdb.asia-southeast1.firebasedatabase.app",
                        projectId: "mobiletopup-2f33c",
                        storageBucket: "mobiletopup-2f33c.appspot.com",
                        messagingSenderId: "694994186854",
                        appId: "1:694994186854:web:b73598d6129ef3b4f9b3a7",
                        measurementId: "G-6V6CC9WY7H"
                    });
                    var db = firebase.firestore();

                    paypal.Buttons({

                        createOrder: function(data, actions) {

                            return actions.order.create({

                                purchase_units: [{

                                    amount: {
                                        value: document.getElementById('montant_total').value
                                    }

                                }]

                            });

                        },


                        // Finalize the transaction after payer approval

                        onApprove: function(data, actions) {

                            return actions.order.capture().then(function(orderData) {

                                // Successful capture! For dev/demo purposes:

                                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                                var transaction = orderData.purchase_units[0].payments.captures[0];
                                if (transaction.status == "COMPLETED") {

                                    console.log('Transaction ' + transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                                    var operatorcode = document.getElementById('operatorid').value;
                                    var amounttopay = document.getElementById('montantecharge').value;
                                    var phonumber = document.getElementById('phonenumber').value;
                                    var countrieiso = document.getElementById('countries').value;
                                    var phonenumber = $('#thephonumbertocharge').text();
                                    var id = transaction.id;
                                    console.log(operatorcode + "/ " + amounttopay + "/ " + phonenumber);
                                    $.ajax({
                                        url: "mobiletop-up.php",
                                        method: "post",
                                        data: {
                                            id: id,
                                            operatorcode: operatorcode,
                                            amount: amounttopay,
                                            countrieIso: countrieiso,
                                            phonenumber: phonenumber
                                        },
                                        success: function(data) {
                                            console.log(data);
                                            data = $.parseJSON(data);
                                            if (data.errorCode) {
                                                if (data.errorCode == "INVALID_AMOUNT_FOR_OPERATOR") {
                                                    alert(data.message);
                                                    /*$(function() {
                                                     /*   $("#dialog").dialog();
                                                        document.getElementById('dialog').style.position = "block";
                                                    });*/
                                                    alert("Le montant accepté est entre " + localStorage.getItem('fixedAmount'));
                                                    $('#montantecharge').val('');
                                                    document.getElementById('montantecharge').style.fontSize = "10px";
                                                    document.getElementById('montantecharge').placeholder = "" + "Le montant accepté est entre " + localStorage.getItem('fixedAmount');

                                                    document.getElementById('choisir-paiement-method').style.display = "none";




                                                }
                                            } else {
                                                var recharge = {
                                                    recharge: {
                                                        transactionId: data.transactionId,
                                                        operatorTransactionId: data.operatorTransactionId,
                                                        customIdentifier: data.customIdentifier,
                                                        recipientPhone: data.recipientPhone,
                                                        countryCode: data.countryCode,
                                                        operatorId: data.operatorId,
                                                        operatorName: data.operatorName,
                                                        discount: data.discount,
                                                        discountCurrencyCode: data.discountCurrencyCode,
                                                        requestedAmount: data.requestedAmount,
                                                        requestedAmountCurrencyCode: data.requestedAmountCurrencyCode,
                                                        deliveredAmount: data.deliveredAmount,
                                                        deliveredAmountCurrencyCode: data.deliveredAmountCurrencyCode,
                                                        transactionDate: data.transactionDate,
                                                        balanceInfo: {
                                                            oldBalance: data.balanceInfo.oldBalance,
                                                            newBalance: data.balanceInfo.newBalance,
                                                            currencyCode: data.balanceInfo.currencyCode,
                                                            currencyName: data.balanceInfo.currencyName,
                                                            updatedAt: data.balanceInfo.updatedAt
                                                        }
                                                    }
                                                }
                                                var firebase_data = {
                                                    PayPal: orderData,
                                                    recharge_data: recharge,
                                                    result: data
                                                };
                                                $.ajax({
                                                    url: 'twilo.php',
                                                    method: 'POST',
                                                    data: {
                                                        phonenumber: phonenumber,
                                                        message: "Vous avez réçu " + data.deliveredAmount + " " + data.deliveredAmountCurrencyCode + " de crédit de comm."
                                                    },
                                                    success: function(params) {
                                                        console.log(params);
                                                    }
                                                });
                                                db.collection("paiements-list").add(firebase_data)
                                                    .then((docRef) => {
                                                        console.log("Document written with ID: ", docRef.id);

                                                        var docRef = db.collection("paiements-list").doc(docRef.id);

                                                        docRef.get().then((doc) => {
                                                            if (doc.exists) {
                                                                /*   console.log("Document data:", doc.data());
                                                                   var id=doc.data().PayPal.id;
                                                                   var email=doc.data().PayPal.payer.email_address;
                                                                   var givingname=doc.data().PayPal.payer.name.given_name;
                                                                   var surname=doc.data().PayPal.payer.name.surname;
                                                                   var message=doc.data();
                                                                   console.log("Email adress", email + givingname+surname);*/


                                                                // localStorage.setItem('recharge_response',data);
                                                                // data = $.parseJSON(data);
                                                                location.href = "recu.php";
                                                                localStorage.setItem('docid', docRef.id);
                                                                document.getElementById('contenair_items_1').style.display = "none";
                                                                document.getElementById('contenair_items_2').style.display = "none";
                                                                document.getElementById('contenair_items_3').style.display = "none";
                                                                document.getElementById('choisir-paiement-method').style.display = "none";
                                                                $('#contenair_items_').html($('#contenair_items_1').html());
                                                                document.getElementById('choisir-paiement-method').style.display = "none";



                                                            } else {
                                                                // doc.data() will be undefined in this case
                                                                console.log("No such document!");
                                                            }
                                                        }).catch((error) => {
                                                            console.log("Error getting document:", error);
                                                        });



                                                    }).catch((error) => {
                                                        console.error("Error adding document: ", error);
                                                    });
                                            }
                                        }
                                    });

                                } else {

                                }

                            });

                        }

                    }).render('#paypal-button-container');
                </script>
            </div>

        </div>
        <nav>
        <div id="myDynamicTable"></div>
    </nav>
    </div>

   

    <div class="dialog" id="dialog">

    </div>


</body>
<script>
    $(document).ready(function() {

    });
    $.ajax({
        url: "email-sends.php",
        method: "post",
        success: function(data) {
            // console.log(data);
            data = $.parseJSON(data);

            for (let index = 0; index < data.data.length; index++) {
                //console.log(data.data[index].country);
                console.log(data.data[index].city);
            }

        }
    })
    
  
  document.getElementById('registration').style.display = "none";
    document.getElementById('registration-login').style.display = "none";
    document.getElementById('contenair_items_1').style.display = "none";
    document.getElementById('contenair_items_2').style.display = "none";
    document.getElementById('contenair_items_3').style.display = "none";
    document.getElementById('choisir-paiement-method').style.display = "none";
    document.getElementById('dialog').style.display = "none";

    $('#contenair_items_').html($('#contenair_items_1').html());


    $(document).on("change", "#countries", function() {
        var countrieiso = document.getElementById('countries').value;
        $.ajax({
            url: "select_country.php",
            method: "post",
            data: {
                countrieiso: countrieiso
            },
            success: function(data) {
                console.log(data);
                data = $.parseJSON(data);

                if (data.errorCode) {
                    if (data.errorCode == "COUNTRY_NOT_SUPPORTED") {
                        alert(data.message);
                        location.reload();
                    }
                } else {
                    document.getElementById("flag").src = data.flag;
                    $("#isoName").html(data.isoName);
                    $("#phonecallnumber").html(data.callingCodes[0]);
                    $("#countrieName").html(data.name);
                    $("#currencySymbol").html(data.currencySymbol);
                    $("#currencyName").html(data.currencyName);
                    $("#currencyCode").html(data.currencyCode);
                    document.getElementById('contenair_items_1').style.display = "none";
                    document.getElementById('contenair_items_3').style.display = "none";
                    document.getElementById('choisir-paiement-method').style.display = "none";
                    document.getElementById('dialog').style.display = "none";
                    $('#contenair_items_').html($('#contenair_items_2').html());
                }


            }
        });

        $.ajax({
            url: "cities.php",
            method: "post",
            data: {
                countrieiso: countrieiso
            },
            success: function(data) {
                console.log(data);
                data = $.parseJSON(data);

                console.log(data.capital);
                console.log(data.region);
                let table = document.createElement('table');
                // table.border="1";
                let thead = document.createElement('thead');
                let tbody = document.createElement('tbody');
                table.appendChild(thead);
                table.appendChild(tbody);
                document.getElementById('myDynamicTable').appendChild(table);

                /*  let row_1 = document.createElement('tr');
                  let heading_1 = document.createElement('th');
                  heading_1.innerHTML = "Geo.";
                  let heading_2 = document.createElement('th');
                  heading_2.innerHTML = "Weather";
                  let heading_3 = document.createElement('th');
                  heading_3.innerHTML = "Wind";
                  let heading_4 = document.createElement('th');
                  heading_4.innerHTML = "City";
                  row_1.appendChild(heading_4);
                  row_1.appendChild(heading_1);
                  row_1.appendChild(heading_2);
                  row_1.appendChild(heading_3);
                  thead.appendChild(row_1);*/


                console.log(data.capital);
                $.ajax({
                    url: "clientopenweatherMapByMe.php",
                    method: "POST",
                    data: {
                        citie: data.capital
                    },
                    success: function(data) {
                        console.log("Res a 1" + data);
                        //data = $.parseJSON(data);
                    }
                });
                $.ajax({
                    url: "weatherByOpenOrigin.php",
                    method: "POST",
                    data: {
                        citie: data.capital
                    },
                    success: function(data) {

                        console.log("Res a 2" + data);
                        data = $.parseJSON(data);
                        let row_2 = document.createElement('tr');
                        let row_2_data_1 = document.createElement('td');
                        row_2_data_1.innerHTML = data.coord.lon + " " + data.coord.lat;
                        let row_2_data_2 = document.createElement('td');
                        row_2_data_2.innerHTML = "<strong>" + data.weather[0].description + "</strong>" + "<img src='http://openweathermap.org/img/wn/" + data.weather[0].icon + "@2x.png' alt='openweatherimage' />";
                        let row_2_data_3 = document.createElement('td');
                        row_2_data_3.innerHTML = data.wind.speed + "/" + data.wind.deg + "°";
                        let row_2_data_4 = document.createElement('td');
                        row_2_data_4.innerHTML = data.name;

                        row_2.appendChild(row_2_data_4);
                        row_2.appendChild(row_2_data_1);
                        row_2.appendChild(row_2_data_2);
                        row_2.appendChild(row_2_data_3);

                        tbody.appendChild(row_2);

                    }
                });



            }
        });



    });


    $(document).on("change", "#countries_1", function() {
        var countrieiso = document.getElementById('countries_1').value;
        document.getElementById('myDynamicTable').style.display = "none";
        $.ajax({
            url: "select_country.php",
            method: "post",
            data: {
                countrieiso: countrieiso
            },
            success: function(data) {
                console.log(data);
                data = $.parseJSON(data);
                if (data.errorCode) {
                    if (data.errorCode == "COUNTRY_NOT_SUPPORTED") {
                        if (confirm(data.message)) {
                            location.reload();
                        }

                    }
                } else {
                    document.getElementById("flag").src = data.flag;
                    $("#isoName").html(data.isoName);
                    $("#phonecallnumber").html(data.callingCodes[0]);
                    $("#countrieName").html(data.name);
                    $("#currencySymbol").html(data.currencySymbol);
                    $("#currencyName").html(data.currencyName);
                    $("#currencyCode").html(data.currencyCode);

                }




            }

        });
        $.ajax({
            url: "cities.php",
            method: "post",
            data: {
                countrieiso: countrieiso
            },
            success: function(data) {
                console.log(data);
                data = $.parseJSON(data);
                document.getElementById('myDynamicTable').style.display = "block";
                let table = document.createElement('table');
                table.border = "1";
                let thead = document.createElement('thead');
                let tbody = document.createElement('tbody');
                table.appendChild(thead);
                table.appendChild(tbody);
                document.getElementById('myDynamicTable').appendChild(table);

                /*   let row_1 = document.createElement('tr');
            let heading_1 = document.createElement('th');
            heading_1.innerHTML = "Geo.";
            let heading_2 = document.createElement('th');
            heading_2.innerHTML = "Weather";
            let heading_3 = document.createElement('th');
            heading_3.innerHTML = "Wind";
            let heading_4 = document.createElement('th');
            heading_4.innerHTML = "City";
            row_1.appendChild(heading_4);
            row_1.appendChild(heading_1);
            row_1.appendChild(heading_2);
            row_1.appendChild(heading_3);
            thead.appendChild(row_1);
*/


                console.log(data.capital);

                $.ajax({
                    url: "clientopenweatherMapByMe.php",
                    method: "POST",
                    data: {
                        citie: data.capital
                    },
                    success: function(data) {
                        console.log("Res b 1" + data);
                        data = $.parseJSON(data);
                    }
                });
                $.ajax({
                    url: "weatherByOpenOrigin.php",
                    method: "POST",
                    data: {
                        citie: data.capital
                    },
                    success: function(data) {

                        console.log("Res b 2" + data);
                        data = $.parseJSON(data);
                        let row_2 = document.createElement('tr');
                        let row_2_data_1 = document.createElement('td');
                        row_2_data_1.innerHTML = data.coord.lon + " " + data.coord.lat;
                        let row_2_data_2 = document.createElement('td');
                        row_2_data_2.innerHTML = "<strong>" + data.weather[0].description + "</strong>" + "<img src='http://openweathermap.org/img/wn/" + data.weather[0].icon + "@2x.png' alt='openweatherimage' />";
                        let row_2_data_3 = document.createElement('td');
                        row_2_data_3.innerHTML = data.wind.speed + "/" + data.wind.deg + "°";
                        let row_2_data_4 = document.createElement('td');
                        row_2_data_4.innerHTML = data.name;

                        row_2.appendChild(row_2_data_4);
                        row_2.appendChild(row_2_data_1);
                        row_2.appendChild(row_2_data_2);
                        row_2.appendChild(row_2_data_3);

                        tbody.appendChild(row_2);
                    }
                });



            }
        });
    });
    $(document).on("keydown", "#phonenumber", function() {
        var phonumber = document.getElementById('phonenumber').value;
        let index = 9;
        if (index < phonumber.length) {
            console.log("Le numéro de téléphone est .....1");
        } else if (index > phonumber.length) {
            console.log("Le numéro de téléphone est .....2");
        } else if (index == phonumber.length) {
            console.log("Le numéro de téléphone est .....3");
        }
        for (let index = 9; index < phonumber.length; index++) {
            console.log(phonumber[index]);

        }
    });

    $(document).on("click", "#test_btn", function() {
        var countrieiso = $("#isoName").text();
        var phonumber = document.getElementById('phonenumber').value;
        var phonecallnumber = document.getElementById('phonecallnumber').value;
        var code = $('#phonecallnumber').text();
        if (countrieiso !== "" && phonumber !== "") {

            $.ajax({
                url: "auto_detect_operator.php",
                method: "post",
                data: {
                    countrieIso: countrieiso,
                    phonenumber: code + phonumber
                },
                success: function(data) {
                    console.log(data);
                    data = $.parseJSON(data);
                    if (data.errorCode) {
                        if (data.errorCode == "COULD_NOT_AUTO_DETECT_OPERATOR") {
                            $('#operator-syntax').html("<div>" + data.timeStamp + "</div>" + "<div>" + data.message + "</div>");
                        }
                        setInterval(function() {
                            $('#operator-syntax').html("");
                        }, 3000);

                    } else {

                        document.getElementById('contenair_items_1').style.display = "none";
                        document.getElementById('contenair_items_2').style.display = "none";
                        document.getElementById('choisir-paiement-method').style.display = "none";
                        //document.getElementById('dialog').style.display = "none";
                        $('#contenair_items_').html($('#contenair_items_3').html());
                        $('#thephonumbertocharge').html(code + phonumber);
                        document.getElementById('operatorflag').src = data.logoUrls[0];
                        $("#operatorid").val(data.id);
                        $("#operatorName").html(data.name);
                        $("#montant-minimum").html("Minimum amount :" + data.minAmount + " " + data.senderCurrencySymbol);
                        $("#montant-maximum").html("Maximum Amount : " + data.maxAmount + " " + data.senderCurrencySymbol);
                        if (data.suggestedAmounts !== '') {
                            $('#suggestions-amont').html("Montants suggérés : <span>" + data.suggestedAmounts + "</span>");
                        } else if (data.fixedAmounts !== '') {
                            $('#suggestions-amont').html("Montants suggérés : <span>" + data.fixedAmounts + "</span>");
                        }

                        $.ajax({
                            url: "rates.php",
                            method: "POST",
                            success: function(data) {

                            }
                        });

                        $("#receiver-currency").html(data.fx.currencyCode);
                        $("#rate-amount").val(numeral(data.fx.rate).format('0,0.00'));
                        $('#sender-currency').html(data.senderCurrencyCode);
                        $('#sendercurrency').html(data.senderCurrencyCode);
                        $('#sendercurrencysymbol').html(data.senderCurrencySymbol);
                        $("#changecurrency").html(data.fx.currencyCode);
                        localStorage.setItem("receiver-currency", data.fx.currencyCode);
                        localStorage.setItem("commission", data.commission);
                        localStorage.setItem("iso", countrieiso);
                        $('#phone_number').html("Mobile TopUp " + $("#countrieName").text() + " " + countrieiso + " " + code + phonumber);

                        if (data.denominationType == "RANGE") {


                        } else if (data.denominationType == "FIXED") {
                            localStorage.setItem('fixedAmount', data.fixedAmounts);

                        }

                    }

                    /*  document.getElementById('field-set-1').style.display="none";
        document.getElementById('field-set-2').style.display="block";
        document.getElementById('field-set-3').style.display="block";
        document.getElementById('operatorid').style.display="block";
        $("#operatorid").html(data.id);
        $("#operatorName").html(data.name);
      
        document.getElementById('operatorflag').style.display="block";
        document.getElementById('operatorflag').src=data.logoUrls[0];

         $('#sendercurrency').html(data.senderCurrencySymbol);
         var html="<tr>";
         html="<td>Pays de recharge"+data.country[2]+"</td>";
         html="<td>Operator "+data.name+"</td>";
         html="<td>Pays de recharge"+data.name+"</td>";
         html="<td>Montants proposés :"+data.suggestedAmounts+"</td>";
         html="</tr>";
         $("#details-2").append(html);
                     var element;
        var option="";
        for (let index = 0; index < data.suggestedAmounts.length; index++) { 
              $('#suggestion_amount').append('<div id="suggestion_amount_1"><span id="suggestedAmounts">'+data.suggestedAmounts[index]+' '+data.destinationCurrencySymbol+ '</span></div>' );  
            }  */

                }
            })
        } else {
            confirm("Renseignez le numéro de téléphone")
        }

    });


    $(document).on("keyup", "#montantecharge", function() {

        var rate = parseFloat($('#rate-amount').val());
        console.log(rate);
        var senderAmount = parseFloat($('#montantecharge').val());
        console.log(senderAmount);
        var result = parseFloat(senderAmount) * parseFloat(rate);
        console.log(result + localStorage.getItem("receiver-currency"));
        localStorage.getItem("receiver-currency");
        $('#receiveramount').val(numeral(result).format('0,0.00'));
        $('#receiv_amount').html("Receiver Amount :" + numeral(result).format('0,0.00') + localStorage.getItem("receiver-currency"));
    });
    $(document).on("click", "#make-top-up", function() {
        document.getElementById('contenair_items_1').style.display = "none";
        document.getElementById('contenair_items_2').style.display = "none";
        document.getElementById('contenair_items_3').style.display = "none";
        document.getElementById('choisir-paiement-method').style.display = "block";

        const numberFormat = new Intl.NumberFormat('en-US');
        var t_commission = localStorage.getItem("commission");

        var amounta = parseFloat($('#montantecharge').val());
        var commission = amounta / 100 * t_commission;
        var taux_frais_carte = parseFloat(0.029);
        var frais_supp = parseFloat(0.25);
        var montant_total = (amounta * taux_frais_carte) + frais_supp + amounta + commission;
        console.log(numberFormat.format(montant_total));
        console.log(taux_frais_carte);
        console.log(frais_supp);

        $('#commission').html("Commission :" + commission + "€");
        $('#frais_bank').html("Frais Bank : 0.29% + 0.25€");


        $('#amount-you-get').html("<input type='text' id='montant_total' value='" + numeral(montant_total).format('0,0.00') + "'> " + $('#sendercurrency').text());



    });
    //  document.getElementById('regit').style.display="none";
    $(document).on('click', '#p-registration', function() {
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
        alert(username);
        if (username !== '' && password !== '') {
            $.ajax({
                url: "Db_connect.php",
                method: "POST",
                data: {
                    username: username,
                    password: password,
                    register: "register"
                },
                success: function(register) {
                    alert(register);
                }
            });
        }
        //document.getElementById('contenair').disabled = true;
    });
    $(document).on('click', '#p-login', function() {
        var username = document.getElementById('username-login').value;
        var password = document.getElementById('password-login').value;
        alert(username);
        localStorage.setItem('username', username);
        if (username !== '' && password !== '') {
            $.ajax({
                url: "Db_connect.php",
                method: "POST",
                data: {
                    username: username,
                    password: password,
                    login: "login"
                },
                success: function(data) {
                    // location.reload();
                    console.log(data);
                    data = $.parseJSON(data);

                    $('#username-interface-n').html(localStorage.getItem('username'));

                }
            });
        }
        //document.getElementById('contenair').disabled = true;
    });
    /* $( "#regit" ).dialog();
    $('#contenair').style.display="none";
    document.getElementById('contenair').style.display="none";*/
    // $('#contenair_items_').html($('#regit').html());
</script>
<footer>

</footer>

</html>