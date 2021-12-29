
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script async src="https://www.google.com/recaptcha/api.js"></script>

    <link type="text/css" rel="stylesheet" href="https://www.gstatic.com/firebasejs/ui/6.0.0/firebase-ui-auth.css" />

    <link rel="stylesheet" href="assets/css/registration-form.css">
</head>

<body>
    <header>
        <section>
            <div>Recharge Mobile</div>
        </section>
        <section>

        </section>

    </header>
    <section>
        <div id="regit">
            <img src="assets/images/topup-logo.png" alt="mobiletopup">
            <div id="registration-login">
                <h1>Registration</h1>
                <div id="item-1" class="input-group input-group-sm mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Username</span>
                    <input type="text" id="username" class="form-control">
                </div>
                <div id="item-2" class="input-group input-group-sm mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Password</span>
                    <input type="password" id="password" class="form-control">
                </div>
                <div id="item-2" class="input-group input-group-sm mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Pays de résidence</span>
                    <select name="paysresidence" id="paysresidence">
                        <?php 
                        require 'vendor/autoload.php';
                        use Panda\Mobiletopup\DBSQL;
                        $countries=new DBSQL();
                        $countries->DB_COUNTRIES_REGISTER();
                        $jon=json_decode($countries->DB_COUNTRIES_REGISTER(),true);
                        foreach($jon as $key => $values){
                            echo '<option value="'.$values['country_code'].'">'.$values['country_name'].'</option>';
                        }

                        ?>
                    </select>
                </div>
                <div id="item-3" class="input-group input-group-sm mb-3">
                    <button type="button" id="p-registration" class="form-control">Register</button>
                    <article>Have a account?
                        <a href="login.php">Login</a>
                    </article>
                    <div id="mobile-result"></div>
                   
                </div>
            </div>
            </dviv>
            <div id="sign-in-button"></div>

                    <div  id="recaptcha-container"></div>
    </section>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/ui/6.0.0/firebase-ui-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-auth.js"></script>
  
  

    <script>
   /* firebase.initializeApp({
            apiKey: "AIzaSyCkM1-n-Bfbsrc3VmPjvQQog3ixCZ3U2CU",
            authDomain: "mobiletopup-2f33c.firebaseapp.com",
            databaseURL: "https://mobiletopup-2f33c-default-rtdb.asia-southeast1.firebasedatabase.app",
            projectId: "mobiletopup-2f33c",
            storageBucket: "mobiletopup-2f33c.appspot.com",
            messagingSenderId: "694994186854",
            appId: "1:694994186854:web:b73598d6129ef3b4f9b3a7",
            measurementId: "G-6V6CC9WY7H"
        });
        firebase.auth().languageCode = 'it';
        var db = firebase.firestore();
        var database = firebase.database();
   
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
        recaptchaVerifier.render().then((widgetId) => {
  window.recaptchaWidgetId = widgetId;
});


const recaptchaResponse = grecaptcha.getResponse(recaptchaWidgetId);
const phoneNumber = getPhoneNumberFromUserInput();
const appVerifier = window.recaptchaVerifier;
firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
    .then((confirmationResult) => {
      // SMS sent. Prompt user to type the code from the message, then sign the
      // user in with confirmationResult.confirm(code).
      window.confirmationResult = confirmationResult;
      // ...
    }).catch((error) => {
      // Error; SMS not sent
      // ...
    });


    grecaptcha.reset(window.recaptchaWidgetId);

// Or, if you haven't stored the widget ID:
window.recaptchaVerifier.render().then(function(widgetId) {
  grecaptcha.reset(widgetId);
}
*/
//const code = getCodeFromUserInput();
/*confirmationResult.confirm(code).then((result) => {
  // User signed in successfully.
  const user = result.user;
  // ...
}).catch((error) => {
  // User couldn't sign in (bad verification code?)
  // ...
});*/
//var credential = firebase.auth.PhoneAuthProvider.credential(confirmationResult.verificationId, code);

//firebase.auth().signInWithCredential(credential);

        $(document).on('click', '#p-registration', function() {
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            var country=document.getElementById('paysresidence').value;
            alert(username);
            if (username !== '' && password !== '' && country !=='') {
                $.ajax({
                    url: "Db_connect.php",
                    method: "POST",
                    data: {
                        username: username,
                        password: password,
                        country: country,
                        register: "register"
                    },
                    success: function(data) {
                        console.log(data);
                        data = $.parseJSON(data);
                        console.log(data.id);
                        if (data.id !== '') {
                            location.href = "login.php";
                        }
                        $('#username-interface-n').html(localStorage.getItem('username'));

                    }
                });
            } else {
                $('#mobile-result').html('<strong>Fields changed</strong>');
                setInterval(function() {
                    $('#mobile-result').html('');
                }, 3000);
            }
        });
    </script>
</body>

</html>