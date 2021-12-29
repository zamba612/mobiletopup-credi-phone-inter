<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="assets/css/registration-form.css">
    <link rel="stylesheet" href="assets/css/looading.css">
</head>

<body onload="myFunction()">
    <header>
        <section>
            <div id=''>Recharge Mobile</div>
        </section>
        <section>

        </section>

    </header>
    <section>
        <div id="regit">

            <img src="assets/images/topup-logo.png" alt="mobiletopup">
            <div id="registration-login">
                <h1>Login</h1>
                <div id="item-1" class="input-group input-group-sm mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Username</span>
                    <input type="text" id="username-login" class="form-control">
                </div>
                <div id="item-2" class="input-group input-group-sm mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Password</span>
                    <input type="password" id="password-login" class="form-control">
                </div>
                <div id="item-3" class="input-group input-group-sm mb-3">
                    <button type="button" id="p-login" class="form-control">Login</button>
                    <article>Account don't exist?
                        <a href="registration.php">Registration</a>
                    </article>
                    <div id="mobile-result"></div>
                </div>
            </div>
        </div>

        <div id="loader"></div>
        <div style="display:none;" id="myDiv" class="animate-bottom">
            <h2>Loading...</h2>
            <p></p>
        </div>
    </section>
    <script>
        var myVar;

        function myFunction() {
            myVar = setTimeout(showPage, 3000);
        }

        document.getElementById("loader").style.display = "none";

        function showPage() {
            document.getElementById("loader").style.display = "none";
            document.getElementById("myDiv").style.display = "block";
        }

        $(document).on('click', '#p-login', function() {
            document.getElementById("loader").style.display = "block";
            var username = document.getElementById('username-login').value;
            var password = document.getElementById('password-login').value;
            alert(username);

            document.getElementById('regit').style.display = 'none';

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

                        console.log(data);
                        data = $.parseJSON(data);
                        if (data.id !== '') {
                            document.getElementById("myDiv").style.display = "none";
                            document.getElementById("loader").style.display = "none";
                            // location.href="http://localhost/mobiletopup/$2y$10$wFITSTUx5xvv4.u/AxIGReJ0SNJDLAdd7z5LKcAiwMKDdfEytJrnq&id="+data.username;
                            //  localStorage.setItem('id',data.id);
                            // console.log(data.id);
                            var id = data.username;
                            $.ajax({
                                url: 'sdk/DB_connect.php',
                                method: 'POST',
                                data: {
                                    commencerAchats: "Rechargefacile",
                                    page: 'account'
                                },
                                success: function(data) {

                                    console.log(data);
                                    location.href = data + "&id=" + id;
                                    localStorage.setItem('id', id);
                                    console.log(id);

                                    //  $('#username-interface-n').html(localStorage.getItem('username'));

                                }
                            });



                        } else {
                            document.getElementById("loader").style.display = "none";
                            document.getElementById('regit').style.display = 'block';
                        }
                        //  $('#username-interface-n').html(localStorage.getItem('username'));

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