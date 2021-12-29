<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <SCRIPT LANGUAGE="JavaScript">
window.history.forward();
</SCRIPT>
    <script src="https://kit.fontawesome.com/44caa2dc35.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <link rel="stylesheet" href="assets/css/account.css">
    <link rel="stylesheet" href="assets/css/assets.css">
    <script src="assets/js/script.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <script>
        $(document).ready(function() {
            $('#MyTable').DataTable();
            $('#MyTable-recharges').DataTable();
        });

        $(document).ready(function() {
            var groupColumn = 2;
            var table = $('#giftTable').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": groupColumn
                }],
                "order": [
                    [groupColumn, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;

                    api.column(groupColumn, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before(
                                '<tr class="group"><td colspan="5">' + group + '</td></tr>'
                            );

                            last = group;
                        }
                    });
                }
            });

            // Order by the grouping
            $('#giftTable tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === groupColumn && currentOrder[1] === 'asc') {
                    table.order([groupColumn, 'desc']).draw();
                } else {
                    table.order([groupColumn, 'asc']).draw();
                }
            });
        });
    </script>
    <style>
        tr.group,
        tr.group:hover {
            background-color: #ddd !important;
        }
    </style>
    <title>Account</title>


<script type="text/javascript">
        window.history.forward();
        function noBack()
        {
            window.history.forward();
        }
</script>
</head>
<body onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">
    <header id="header-account">
        <div class="header-left">
            <label class="mobiletopup_title">Mobile TOPUP</label>
        </div>
        <div class="header-center">

        </div>
        <div class="header-right">
            <nav class="menu-mobile-navigation" id="menu-mobile-navigation">
                <ul>
                    <li>Recharge</li>
                    <li>Mes paiements</li>
                    <li>Mes recharges</li>
                    <li>Mon profil</li>
                    <li></li>
                </ul>
            </nav>
            <img src="assets/images/worldwid.jpg" alt="" srcset="">
        </div>

    </header>
    <div class="contenair-placer">
        <nav id="nav-1">

            <div class="items active" id="button_recharge">
                <div class="contents active" id="content-button_recharge">
                    <span>
                        <i class="fas fa-ad"></i>
                    </span>
                    <span>
                        Recharge
                    </span>
                </div>
            </div>

            <div class="items" id="button_paiements">
                <div class="contents" id="content-button_paiements">
                    <span>
                        <i class="fab fa-cc-paypal"></i>
                    </span>
                    <span>
                        Mes paiements
                    </span>

                </div>

            </div>
            <div class="items" id="button_rechargements">
                <div class="contents" id="content-button_rechargements">
                    <span>
                        <i class="fas fa-mobile-alt"></i>
                    </span>
                    <span>
                        Mes Recharges
                    </span>

                </div>
            </div>
            <div class="items" id="button_gifts">
                <div class="contents" id="content-button_gift">
                    <span>
                        <i class="fas"></i>
                    </span>
                    <span>
                        Gift
                    </span>

                </div>
            </div>
            <div class="items active" id="button_monprofil">
                <div class="contents" id="content-button_monprofil">
                    <span>
                        <i class="fas fa-user"></i>
                    </span>
                    <span>
                        Mon profil
                    </span>

                </div>
            </div>
            <div class="items" id="button_deconnection">
                <div class="contents">
                    <span>
                        <i class="fas fa-power-off"></i>
                    </span>
                    <span>
                        Quitter
                    </span>

                </div>
            </div>
            <script>
                $(document).on('click', '#button_deconnection', function() {
                    alert(localStorage.getItem('id'));
                    var id = localStorage.getItem('id');
                    $.ajax({
                        url: 'sdk/Db_connect.php',
                        method: 'POST',
                        data: {
                            deconnect_to_system: "deconnect_now",
                            id: id
                        },
                        success: function(data) {
                            console.log("Deconnection :"+data);

                            $.ajax({
                                url: 'sdk/Db_connect.php',
                                method: 'POST',
                                data: {
                                    when_system_is_active: "deconnect_now",
                                    username: "<?php echo $_GET['id'] ?>"
                                },
                                success: function(data) {
                                    console.log("Verification:"+data);
                                    data = $.parseJSON(data);
                                    if (data.deconnection_now == "active") {
                                        localStorage.removeItem('id');

                                        $.ajax({
                                            url: 'sdk/DB_connect.php',
                                            method: 'POST',
                                            data: {
                                                commencerAchats: "Rechargefacile",
                                                page: 'home'
                                            },
                                            success: function(data) {
                                                console.log(data);
                                                location.href = data;

                                            }
                                        });




                                    }
                                }
                            });
                        }
                    });

                });
                $(document).ready(function() {
                    verification();

                    function verification() {
                        $.ajax({
                            url: 'sdk/Db_connect.php',
                            method: 'POST',
                            data: {
                                when_system_is_active: "deconnect_now",
                                username: "<?php echo $_GET['id'] ?>"
                            },
                            success: function(data) {
                                console.log(data);
                                data = $.parseJSON(data);
                                if (data.deconnection_now == "active") {
                                    $.ajax({
                                            url: 'sdk/DB_connect.php',
                                            method: 'POST',
                                            data: {
                                                commencerAchats: "Rechargefacile",
                                                page: 'home'
                                            },
                                            success: function(data) {
                                                console.log(data);
                                                location.href = data;

                                            }
                                        });
                                }
                            }
                        });
                    }
                });
            </script>
        </nav>
        <section id="section-1">
            <div class="addrecharge" id="addrecharge">
                <div class="contenair" id="contenair">
                    <div class="contenair-items_man" id="contenair_items_">

                        <div class="contenair-items" id="contenair_items_1">
                            <article>
                                <h1>Commencer votre recharge.</h1>
                                <label for="countries">Choisir le pays de destination:</label><br>
                                <select id="countries">
                                    <?php
                                    require 'vendor/autoload.php';

                                    use Panda\Mobiletopup\DBSQL;
                                    use Panda\Mobiletopup\countries;
                                    use Panda\Mobiletopup\countriesByTraverlPayout;
                                    use Panda\Mobiletopup\Users;
                                    use Panda\Mobiletopup\Gift_cards;
                                    use Panda\Mobiletopup\mobiletopupSDK;

                                    $countriesByTravel = new countriesByTraverlPayout();
                                    $countries = new countries();
                                    $result = json_decode($countriesByTravel->parameters_2(), true);
                                    echo "<option>Selectionner le pays</option>";
                                    $result = json_decode($countries->countries_(), true);
                                    foreach ($result as $key => $value) {
                                        echo "<option value='" . $value['isoName'] . "'>" . $value['name'] . "</option>";
                                    }

                                    ?>
                                </select>

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
                        <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-database.js"></script>
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
                                    var database = firebase.database();


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
                                                        url: "sdk/mobiletop-up.php",
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
                                                                    url: 'sdk/twilo.php',
                                                                    method: 'POST',
                                                                    data: {
                                                                        phonenumber: phonenumber,
                                                                        message: "Vous avez réçu " + data.deliveredAmount + " " + data.deliveredAmountCurrencyCode + " de crédit de comm."
                                                                    },
                                                                    success: function(params) {
                                                                        console.log(params);
                                                                    }
                                                                });
                                                                db.collection(localStorage.getItem('id')).add(firebase_data)
                                                                    .then((docRef) => {
                                                                        console.log("Document written with ID: ", docRef.id);

                                                                        var docRef = db.collection(localStorage.getItem('id')).doc(docRef.id);

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
                    </div>

                    <nav>

                        <div id="myDynamicTable"></div>
                    </nav>

                </div>
            </div>
            <div class="mespaiements" id="mespaiements-display">
                <article>
                    <h1>Mes paiements</h1>
                    <div class="mespaiements" id="mespaiements">
                        <table id="MyTable" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Paie Ref:</th>
                                    <th>Montant</th>

                                    <th>Status</th>

                                    <th>Date et Heure</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $PayPal = new DBSQL();
                                $json_de = json_decode($json = $PayPal->DB_SELECT_TRANSANCTION_PAYPAL_BY_USERNAME($_GET['id']), true);
                                foreach ($json_de as $value) {
                                    echo "  <tr><td>" . $value['payid'] . "</td>";
                                    echo "<td>" . $value['amount'] . " " . $value['currency'] . "</td>";
                                    echo "<td>" . $value['status'] . "</td>";
                                    echo "<td>" . $value['date_heure'] . "</td> </tr>";
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </article>
            </div>
            <div class="mesrechargements" id="mesrechargements-display">
                <article>
                    <h1>Mes rechargements</h1>
                    <div class="mesrechargements" id="mesrechargements">
                        <table id="MyTable-recharges" class="display" style="width:100%">
                            <thead>

                                <tr>
                                    <th>Transanction Ref:</th>
                                    <th>Operator</th>
                                    <th>Number</th>
                                    <th>Pays</th>
                                    <th>Montant recharge:</th>
                                    <th>Date et Heure</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php

                                $TopUp_Recharge = new DBSQL();
                                $mobiletopupSDK = new mobiletopupSDK();

                                $json_de_rech = json_decode($json = $TopUp_Recharge->DB_SELECT_TRANSANCTION_TOPUP_BY_USERNAME($_GET['id']), true);
                                foreach ($json_de_rech as $value) {
                                    $mobiletopupSDK->GET_FROM_RELOADLY_OPERATOR_DETAILS($value['operatorID']);
                                    echo "  <tr><td>" . $value['transactionid'] . "</td>";
                                    echo "<td><img src='" . $mobiletopupSDK->logoUrls . "'/>" . $value['OperatorName'] . "</td>";
                                    echo "<td>" . $value['rechargeNumber'] . "</td>";

                                    $mobiletopupSDK->GET_FROM_RELOADLY_COUNTRIE_DETAILS($value['Tocountry']);
                                    echo "<td><img src='" . $mobiletopupSDK->flag . "' alt='country-flag'/></td>";
                                    echo "<td>" . $value['payAmount'] . $value['payCurrency'] . "</td>";
                                    echo "<td>" . $value['date_heure'] . "</td> </tr>";
                                }
                                ?>

                                <?php ?>
                            </tbody>
                        </table>
                    </div>
                </article>
            </div>
            <div class="mesgifts" id="mesgifts">
                <table id="giftTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>country</th>
                            <th>verbose</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $gift = new Gift_cards();
                        $gifltlist = json_decode($gift->getAllProducts(), true);
                        for ($i = 0; $i < count($gifltlist['content']); $i++) {
                            //   echo json_encode($gifltlist['content'][$i]['productId']);
                            echo '<tr>';
                            echo '<td>';
                            echo '<div>';
                            echo $gifltlist['content'][$i]['productId'];
                            echo '</div><div>';
                            echo '<img src="' . $gifltlist['content'][$i]['logoUrls'][0] . '"/>';
                            echo '</div><div>' . $gifltlist['content'][$i]['productName'] . '</div></td>';
                            echo '<td>';
                            for ($a = 0; $a < count($gifltlist['content'][$i]['fixedSenderDenominations']); $a++) {
                                echo '<div id="gift-price" data-countrycode="' . $gifltlist['content'][$i]['country']['isoName'] . '"  data-id="' . $gifltlist['content'][$i]['productId'] . '" data-price="' . $gifltlist['content'][$i]['fixedSenderDenominations'][$a] . '"><strong>' . $gifltlist['content'][$i]['fixedSenderDenominations'][$a] . '</strong><strong>' . $gifltlist['content'][$i]['senderCurrencyCode'] . '</strong></div>';
                            }
                            echo '</td>';
                            echo '<td><div>' . $gifltlist['content'][$i]['country']['isoName'] . '</div><div>' . $gifltlist['content'][$i]['country']['name'] . '</div>';
                            echo '<div><img src="' . $gifltlist['content'][$i]['country']['flagUrl'] . '"/>';
                            for ($b = 0; $b < count($gifltlist['content'][$i]['fixedRecipientDenominations']); $b++) {
                                echo ' <span>' . $gifltlist['content'][$i]['fixedRecipientDenominations'][$b] . '' . $gifltlist['content'][$i]['recipientCurrencyCode'] . '</span>';
                            }
                            echo '</div></td>';
                            echo '<td>' . $gifltlist['content'][$i]['redeemInstruction']['verbose'] . '</td>';
                            echo '</tr>';
                        }
                        // var_dump($gifltlist['content']);

                        //echo json_encode($gifltlist['content']);
                        ?>
                        </tr>
                    </tbody>
                </table>

                <script>
                    $(document).on('click', '#gift-price', function() {
                        var id = $(this).data('id');
                        var price = $(this).data('price');
                        var countryCode = $(this).data('countrycode');
                        var quantity = 1;
                        var date = "1253366";
                        var sendername = "Test";
                        var receptienemail = "mantemotusiaminabob@gmail.com";
                        var countrycodeII = "FR";
                        var phoneNumber = "+243817813438";
                        alert(countryCode);
                        if (id !== '' &&
                            price !== '' &&
                            countryCode !== '' &&
                            quantity !== '' &&
                            date !== '' &&
                            sendername !== '' &&
                            receptienemail !== '' &&
                            countrycodeII !== '' &&
                            phoneNumber !== '') {
                            $.ajax({
                                url: 'the_gifts.php',
                                method: 'POST',
                                data: {
                                    by_gift_card: "by_gift_card",
                                    productID: id,
                                    countrycode: countrycodeII,
                                    quantity: quantity,
                                    unitprice: price,
                                    identifier: date,
                                    senderName: sendername,
                                    reciepientemail: receptienemail,
                                    countrycoder: countryCode,
                                    phoneNumber: phoneNumber
                                },
                                success: function(data) {
                                    console.log(data);
                                }
                            });
                        } else {
                            alert("NEANT");
                        }

                        //alert(id+"\n"+price);
                    });
                </script>
            </div>
            <div class="monprofil" id="monprofil-display">
                <article>
                    <h1>Mon profile</h1>
                    <?php $user = new DBSQL();
                    $user->DB_SELECT_USER_BY_USERNAME($_GET['id']);

                    ?>
                    <div class="monprofil" id="monprofil">
                        <div class="monprofil-left">
                            <img src="assets/images/menu.png" alt="" srcset="">
                        </div>
                        <div class="monprofil-right">
                            <div class="username">
                                <label for="username">
                                    Username
                                </label>
                                <input type="text" name="username" id="username" value="<?php echo $user->username ?>">
                            </div>
                            <div class="password">
                                <label for="password">
                                    password
                                </label>
                                <input type="password" name="password" id="password" value="<?php echo $user->password ?>">
                            </div>
                            <div class="name">
                                <label for="name">
                                    Name
                                </label>
                                <input type="text" name="name" id="name" value="<?php
                                                                                if ($user->username !== '') {
                                                                                    echo $user->name;
                                                                                } else {
                                                                                    echo "Name ?";
                                                                                } ?>">
                            </div>
                            <div class="lastname">
                                <label for="lastname">
                                    LastName
                                </label>
                                <input type="text" name="lastname" id="lastname" value="<?php echo $user->lastname ?>">
                            </div>
                            <div class="country">
                                <label for="country">
                                    Country
                                </label>
                                <input type="text" name="country" id="country" value="<?php echo $user->country ?>">
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </section>
        <div class="nav-2" id="nav-2">
            <h1>Users</h1>
            <div class="search-user-div">
                <img src="assets/images/chercher.png" alt="chercher-icon" srcset="">
                <input type="search" name="search-user" id="search-user">
            </div>
            <?php
            $user_list = new DBSQL();
            $users = new Users();
            $json_e = $user_list->DB_SELECT_ALL_USERS();
            $json = json_decode($json_e, true);
            for ($i = 0; $i < count($json); $i++) {
                //  echo $json[$i]['username'] .' '.$json[$i]['country']. '<br>';
                if ($json[$i]['status'] == 1) {
                    echo '<div id="user-online-div"><span id="users-online">' . $json[$i]['username'] . ' ' . $json[$i]['country'] . '

                   </span><span id="online-icon">online</span></div>';
                } else {
                    '<div id="users-offline">' . $json[$i]['username'] . ' ' . $user_list->DB_COUNTRIE_DETAILS_SEARCH_BY_ISO($json[$i]['country']) . '<br>' . '

                    </div>';
                    echo '<div id="user-offline-div"><span id="users-offline">' . $json[$i]['username'] . ' ' . $json[$i]['country'] . '

                    </span><span id="offline-icon">offline</span></div>';
                }
            }



            ?>
        </div>
    </div>

    <script>
        localStorage.getItem('id');
        console.log("ID : " + localStorage.getItem('id'));
        $(document).ready(function() {

        });
        $.ajax({
            url: "sdk/email-sends.php",
            method: "post",
            success: function(data) {
                // console.log(data);
                data = $.parseJSON(data);

                for (let index = 0; index < data.data.length; index++) {
                    //console.log(data.data[index].country);

                    // console.log(data.data[index].city);
                }

            }
        })



        document.getElementById('contenair_items_1').style.display = "block";
        document.getElementById('contenair_items_2').style.display = "none";
        document.getElementById('contenair_items_3').style.display = "none";
        document.getElementById('choisir-paiement-method').style.display = "none";
        //  $('#contenair_items_').html($('#contenair_items_1').html());


        $(document).on("change", "#countries", function() {
            var countrieiso = document.getElementById('countries').value;
            $.ajax({
                url: "sdk/select_country.php",
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
                        document.getElementById('contenair_items_2').style.display = "block";
                        //   document.getElementById('dialog').style.display = "none";
                        //  $('#contenair_items_').html($('#contenair_items_2').html());
                    }


                }
            });

            $.ajax({
                url: "sdk/cities.php",
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


                    console.log(data.capital);
                    $.ajax({
                        url: "sdk/clientopenweatherMapByMe.php",
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
                        url: "sdk/weatherByOpenOrigin.php",
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
                url: "sdk/select_country.php",
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
                url: "sdk/cities.php",
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

                    console.log(data.capital);

                    $.ajax({
                        url: "sdk/clientopenweatherMapByMe.php",
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
                        url: "sdk/weatherByOpenOrigin.php",
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
                    url: "sdk/auto_detect_operator.php",
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
                            // $('#contenair_items_').html($('#contenair_items_3').html());
                            document.getElementById('contenair_items_3').style.display = "block";
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
                                url: "sdk/rates.php",
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
                    url: "sdk/Db_connect.php",
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
                    url: "sdk/Db_connect.php",
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

        $(document).on('click', '#button_recharge', function() {

        });

        $(document).on('click', '#button_paiements', function() {

        });
        /*    db.collection(localStorage.getItem('id')).get().then((querySnapshot) => {
            querySnapshot.forEach((doc) => {
                // console.log(`${doc.id} => ${doc.data()}`);
                var html = '';
                var docRe = db.collection(localStorage.getItem('id')).doc(doc.id);
                var html = "<tbody>";
                var index = 0;
                docRe.get().then((doc) => {
                    if (doc.exists) {

                        $.ajax({
                            url: "Db_connect.php",
                            method: "POST",
                            data: {
                                firebaseid: doc.id,
                                payid: doc.data().PayPal.id,
                                amount: doc.data().PayPal.purchase_units[0].amount.value,
                                currency: doc.data().PayPal.purchase_units[0].amount.currency_code,
                                status: doc.data().PayPal.status,
                                username: localStorage.getItem('id'),
                                insert_transanction: "paypal"
                            },
                            success: function(data) {
                                console.log(data);
                            }
                        });
                        $.ajax({
                            url: "Db_connect.php",
                            method: "POST",
                            data: {
                                firebaseid: doc.id,
                                Tocountry: doc.data().result.countryCode,
                                payamount: doc.data().result.deliveredAmount,
                                paycurrency: doc.data().result.deliveredAmountCurrencyCode,
                                rechargeNumber: doc.data().result.recipientPhone,
                                transanctionid: doc.data().result.transactionId,
                                date_heure: doc.data().result.transactionDate,
                                operatorName: doc.data().result.operatorName,
                                operatorId: doc.data().result.operatorId,
                                username: localStorage.getItem('id'),
                                insert_transanction: "topup"
                            },
                            success: function(data) {
                                console.log(data);
                            }
                        });

                        index++;
/*

                        console.log("Document data:", doc.data() + "" + doc.id);
                        var id = doc.data().PayPal.id;
                        html = "<tr><td>" + doc.data().PayPal.purchase_units[0].amount.value + " " + doc.data().PayPal.purchase_units[0].amount.currency_code + "</td><td>" + doc.data().PayPal.status + "</td><td>" + doc.data().PayPal.update_time + "</td></tr></tbody>";
                        /*  var email=doc.data().PayPal.payer.email_address;
                          var givingname=doc.data().PayPal.payer.name.given_name;
                          var surname=doc.data().PayPal.payer.name.surname;
                          var message=doc.data();
                        $('#MyTable').append(html);
                        console.log("ID<<<<<<<<>>>>>>>>>>" + id);


                    } else {
                        // doc.data() will be undefined in this case
                        console.log("No such document!");
                    }
                }).catch((error) => {
                    console.log("Error getting document:", error);
                });

*/
        //console.log(doc.data());
        /*
                               db.collection(localStorage.getItem('id')).add(doc.data())
                                    .then((docRef) => {
                                      //  console.log("Document written with ID: ", docRef.id);
                                    })
                                    .catch((error) => {
                                        console.error("Error adding document: ", error);
                                    });

            });




        });*/
        document.getElementById('menu-mobile-navigation').style.display = "none";
        document.getElementById('mespaiements-display').style.display = "none";
        document.getElementById('monprofil-display').style.display = "none";
        document.getElementById('mesrechargements-display').style.display = "none";
        document.getElementById('mesgifts').style.display = "none";
        //button_recharge,button_paiements,button_rechargements,button_monprofil;
        $(document).on('click', '#button_recharge', function() {
            document.getElementById('addrecharge').style.display = "block";

            document.getElementById('mespaiements-display').style.display = "none";
            document.getElementById('monprofil-display').style.display = "none";
            document.getElementById('mesrechargements-display').style.display = "none";
            document.getElementById('mesgifts').style.display = "none";
            $('#content-button_recharge').addClass('active');
            $('#content-button_paiements').removeClass('active');
            $('#content-button_monprofil').removeClass('active');
            $('#content-button_rechargements').removeClass('active');
            $('#content-button_gift').removeClass('active');

        });
        $(document).on('click', '#button_paiements', function() {
            document.getElementById('addrecharge').style.display = "none";
            document.getElementById('mespaiements-display').style.display = "block";
            document.getElementById('monprofil-display').style.display = "none";
            document.getElementById('mesrechargements-display').style.display = "none";
            document.getElementById('mesgifts').style.display = "none";
            $('#content-button_recharge').removeClass('active');
            $('#content-button_paiements').addClass('active');
            $('#content-button_monprofil').removeClass('active');
            $('#content-button_rechargements').removeClass('active');
            $('#content-button_gift').removeClass('active');
        });
        $(document).on('click', '#button_rechargements', function() {
            document.getElementById('addrecharge').style.display = "none";
            $('#button_rechargements').addClass('active');
            document.getElementById('mespaiements-display').style.display = "none";
            document.getElementById('monprofil-display').style.display = "none";
            document.getElementById('mesrechargements-display').style.display = "block";
            document.getElementById('mesgifts').style.display = "none";
            $('#content-button_recharge').removeClass('active');
            $('#content-button_paiements').removeClass('active');
            $('#content-button_monprofil').removeClass('active');
            $('#content-button_rechargements').addClass('active');
            $('#content-button_gift').removeClass('active');
        });
        $(document).on('click', '#button_monprofil', function() {
            document.getElementById('addrecharge').style.display = "none";
            $('#button_monprofil').addClass('active');
            document.getElementById('mespaiements-display').style.display = "none";
            document.getElementById('monprofil-display').style.display = "block";
            document.getElementById('mesrechargements-display').style.display = "none";
            document.getElementById('mesgifts').style.display = "none";
            $('#content-button_recharge').removeClass('active');
            $('#content-button_paiements').removeClass('active');
            $('#content-button_monprofil').addClass('active');
            $('#content-button_rechargements').removeClass('active');
            $('#content-button_gift').removeClass('active');

        });
        $(document).on('click', '#button_gifts', function() {
            document.getElementById('addrecharge').style.display = "none";
            $('#button_monprofil').addClass('active');
            document.getElementById('mespaiements-display').style.display = "none";
            document.getElementById('monprofil-display').style.display = "none";
            document.getElementById('mesrechargements-display').style.display = "none";
            document.getElementById('mesgifts').style.display = "block";
            $('#content-button_recharge').removeClass('active');
            $('#content-button_paiements').removeClass('active');
            $('#content-button_monprofil').removeClass('active');
            $('#content-button_rechargements').removeClass('active');
            $('#content-button_gift').addClass('active');

        });
    </script>
</body>

</html>