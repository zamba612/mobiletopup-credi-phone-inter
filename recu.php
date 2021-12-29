<?php
require 'vendor/autoload.php';

use Panda\Mobiletopup\countries;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/assets.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <title>TopUP</title>
</head>

<body>
    <header>

        <div class="navigation">
            <div class="menu-m-left">
                <h3>Recharge mobile International</h3>
            </div>
            <div class="menu-m-center">
                <article>

                    <img src="assets/images/mobile-iphone.jpg" alt="mobile-iphone" srcset="">
                </article>

            </div>
            <div class="menu-m-right">
                <div class="interface-user">
                    <img src="assets/images/menu.png" alt="menu-icon">
                   <nav id="menu-nav">
                   <ul>
                    <li><a href="index.php">Recharge</a></li>
                </ul>
                   </nav> 
                </div>
            </div>
        </div>
    </header>





    <div class="contenair" id="contenair">





        <div class="recu-contenair">

            <h1>Facture</h1>
            <div class="facture">

                <table id="facture-table">
                    <thead>
                        <tr>
                            <th colspan="6"><span>Réçu</span> </th>
                        </tr>
                        <tr>
                            <th colspan="6"><strong id="info_detail">à conserver en cas de problème de recharge</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Identifiants :<strong id="identifiant"></strong></td>
                        </tr>
                        <tr>
                            <td colspan="5">Paiement details :<strong id="paiements"></strong></td>
                        </tr>
                        <tr>
                            <td>
                                <div id="paiement-info">
                                    <div class="logo" id="logo">
                                        <img src="assets/images/mobile-iphone.jpg" alt="" srcset="">
                                    </div>
                                    <div class="company" id="company"></div>
                                    <div class="email-address" id="email-address"></div>
                                    <div class="phone-contact" id="phone-contact"></div>
                                    <div class="company-site-web" id="company-site-web"></div>
                                </div>
                            </td>
                        </tr>

                    </tbody>


                </table>

            </div>

        </div>


        <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
        <script src="https://www.paypal.com/sdk/js?client-id=AcqFnx_lNt_-JO4ehyATEkIjfkQ4q3PE5HMdEn-xdu8wGoDnTDQaN0wxOu2mj-030jVkuecdzOLaliWa&currency=EUR"></script>

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

            console.log(localStorage.getItem('docid'));
            var docRef = db.collection("paiements-list").doc(localStorage.getItem('docid'));

            docRef.get().then((doc) => {
                if (doc.exists) {
                    console.log("Document data:", doc.data());

                    var id = doc.data().PayPal.id;
                    var email = doc.data().PayPal.payer.email_address;
                    var givingname = doc.data().PayPal.payer.name.given_name;
                    var surname = doc.data().PayPal.payer.name.surname;
                    var message = doc.data();
                    console.log("Document data: ", message);

                    $('#identifiant').html(
                        "<br>Réf. facture : " + docRef.id +
                        "<br>Réf. paiement : " + doc.data().PayPal.id+
                        "<br>Réf.Recharge : "+doc.data().result.transactionId);
                    var recharge_effectuer = "Recharge effectué :";
                    var recharge_en = "Crédit envoyé : " + numeral(doc.data().result.requestedAmount).format('0,0.00') + " " + doc.data().result.requestedAmountCurrencyCode + "<br>";
                    var recharge_loc = "Recharge, opérateur : " + doc.data().result.operatorName + "<br>, Tél : " + doc.data().result.recipientPhone + ", crédit réçu  " + doc.data().result.deliveredAmount + " " + doc.data().result.deliveredAmountCurrencyCode + "<br>";
                    recharge_effectuer = "<br>" + recharge_en + "<br>" + recharge_loc
                    var details_acheteur =
                        "</br>Détails de l'achéteur : </br><strong>" + doc.data().PayPal.payer.name.given_name + " " + doc.data().PayPal.payer.name.surname + "</strong><br>" +
                        doc.data().PayPal.purchase_units[0].shipping.address.address_line_1 + "</br> " +
                        doc.data().PayPal.purchase_units[0].shipping.address.admin_area_2 + "<br>" +
                        doc.data().PayPal.purchase_units[0].shipping.address.postal_code + "<br>" +
                        doc.data().PayPal.purchase_units[0].shipping.address.country_code + "<br>" +
                        "<strong id='purchasseunits'>Vous avez payé : " + doc.data().PayPal.purchase_units[0].amount.value + " " + doc.data().PayPal.purchase_units[0].amount.currency_code + "</strong><br>" +
                        recharge_effectuer;

                    $('#paiements').html("</br>" + details_acheteur);

                } else {
                    // doc.data() will be undefined in this case
                    console.log("No such document!");
                }
            }).catch((error) => {
                console.log("Error getting document:", error);
            });
            db.collection("pied-de-page").get().then((querySnapshot) => {
                querySnapshot.forEach((doc) => {
                    // doc.data() is never undefined for query doc snapshots
                    console.log(doc.id, " => ", doc.data());
                    $('#logo').html(doc.data().logo);
                    $('#company').html(doc.data().companyinfo);
                    $('#emailaddress').html(doc.data().emailaddress);
                    $('#phonecontact').html(doc.data().phonecontact);
                    $('#companysiteweb').html(doc.data().emailaddress);

                });
            });
        </script>

    </div>



</body>





</html>