<?php
include 'includes/connection.php';
include './function.php';
session_start();
if (empty($_SESSION['login_id'])) {
    echo '<script type="text/javascript">
    alert("You are logged out")
    window.location.href = "index.php"
    </script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloud Miners</title>
    <link href="assets/img/logo_final.png" rel="icon">
    <link href="assets/img/logo_final.png" rel="apple-touch-icon">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: rgb(27, 29, 41);
        }

        .register {
            background: -webkit-linear-gradient(left, rgb(27, 29, 41), rgb(27, 29, 41));
            margin-top: 3%;
            padding: 3%;
        }

        .register-left {
            text-align: center;
            color: #fff;
            margin-top: 4%;
        }

        .register-left input {
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            width: 60%;
            background: #f8f9fa;
            font-weight: bold;
            color: #383d41;
            margin-top: 30%;
            margin-bottom: 3%;
            cursor: pointer;
        }

        .register-right {
            background: rgb(253, 151, 1);

        }

        .register-left img {

            margin-bottom: 5%;
            width: 25%;
            -webkit-animation: mover 2s infinite alternate;
            animation: mover 1s infinite alternate;
        }

        @-webkit-keyframes mover {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-20px);
            }
        }

        @keyframes mover {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-20px);
            }
        }


        .register-left p {
            font-weight: bolder;
            padding: 12%;
            margin-top: -9%;
            color: #00ff43;

        }

        .register .register-form {
            padding: 10%;
            margin-top: 10%;
        }

        .btnRegister {
            float: right;
            margin-top: 10%;
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            background: black;
            color: #fff;
            font-weight: 600;
            width: 50%;
            cursor: pointer;
        }

        .register .nav-tabs {
            margin-top: 3%;
            border: none;
            background: #0062cc;
            border-radius: 1.5rem;
            width: 28%;
            float: right;
        }

        .register .nav-tabs .nav-link {
            padding: 2%;
            height: 34px;
            font-weight: 600;
            color: #fff;
            border-top-right-radius: 1.5rem;
            border-bottom-right-radius: 1.5rem;
        }

        .register .nav-tabs .nav-link:hover {
            border: none;
        }

        .register .nav-tabs .nav-link.active {
            width: 100px;
            color: #0062cc;
            border: 2px solid #0062cc;
            border-top-left-radius: 1.5rem;
            border-bottom-left-radius: 1.5rem;
        }

        .register-heading {
            text-align: center;
            margin-top: 8%;
            margin-bottom: -15%;
            color: #495057;
        }

        .login-btn {
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            width: 200px !important;
            background: #f8f9fa;
            font-weight: bold;
            color: #383d41;
            margin-top: 30%;
            margin-bottom: 3%;
            cursor: pointer;
        }

        @media(max-width:768px) {
            .register-left input {
                margin-top: 0%;
            }



            .register {
                margin-top: 0%;
                margin-left: 0px;
                margin-right: 0px;
                margin-bottom: 0px;
            }

            .login-btn {
                margin-top: -50px;
            }

            .btnRegister {
                float: none;
            }

            body {
                height: 100vh;

            }

            .register {
                height: 100%;

            }



        }

        .register-left>h3 {
            font-size: 2.5rem;
            background: -webkit-linear-gradient(red, yellow);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .col-md-6>h3 {
            font-size: 1.7rem;
            /* background: -webkit-linear-gradient(green, red); */
            color: white;

        }
    </style>
</head>

<body>

    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <!------ Include the above in your HEAD tag ---------->

    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">

                <h3>Congratulations!</h3>
                <p>You are Successfully registered on Cloud Miners</p>
                <!-- <a href="login.php" class="btn login-btn">Login</a><br /> -->

                <a href="index.php">
                    <img src="assets/img/logo_final.png" style="width: 150px;margin-top:-50px" alt="">
                </a>
                <p>Hi <?php echo user_name($_SESSION['login_id']) ?>, Login details are send to your email</p>
            </div>
            <div class="col-md-9 register-right">

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">


                        <div class="row register-form">
                            <div class="col-md-6 ">




                                <h3> <span style="background-color: rgb(27, 29, 41);color:#00ff43" class="px-2"> User ID : CM-<?php echo $_SESSION['login_id'] ?></span></h3>
                                <h3 class="mb-3"> <span style="background-color: rgb(27, 29, 41);color:#00ff43" class="px-2"> Password : <?php echo $_SESSION['password'] ?></span></h3>
                                <p style="color:purple">  Note : Login details are send to your email</p>


                                <div class="d-flex justify-content-center">
                                    <a href="login.php" class="btnRegister text-center">Continue to Login</a>
                                </div>
                            </div>




                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        function check() {
            var pw2 = document.getElementById('confirm_password').value;
            var pw1 = document.getElementById('password').value;

            if (pw1 != pw2) {
                document.getElementById("register2").disabled = true;
                document.getElementById("danger").style.display = "block";
                document.getElementById("danger").style.color = "red";
                document.getElementById("register2").style.backgroundColor = "gray";
            } else {
                document.getElementById("register2").disabled = false;
                document.getElementById("danger").style.display = "none";
                document.getElementById("register2").style.backgroundColor = "#008d7d";
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#country').on('change', function() {
                var countryID = $(this).val();
                if (countryID) {
                    $.ajax({
                        type: 'POST',
                        url: 'ajaxData.php',
                        data: 'country_id=' + countryID,
                        success: function(html) {
                            $('#state').val(html);

                        }
                    });
                } else {
                    $('#state').val('Referral id is wrong!');

                }
            });


        });
    </script>
    <script>
        function isNumber(evt) {
            evt = evt ? evt : window.event;

            var charCode = evt.which ? evt.which : evt.keyCode;

            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }

            return true;
        }
    </script>
</body>

</html>