<?php
include 'includes/connection.php';
include './function.php';
session_start();

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
            background: rgb(253, 151, 1);
            font-weight: bold;
            color: #383d41;
            margin-top: 30%;
            margin-bottom: 3%;
            cursor: pointer;
        }

        .register-right {
            background: rgb(253, 151, 1);
            /* border-top-left-radius: 10% 50%;
            border-bottom-left-radius: 10% 50%; */
        }

        .register-left img {
            margin-top: 0%;
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


            .register .register-form {
            padding-top: 75px;
            }
        }
        h3
        {
            font-size: 2.5rem;
            background: -webkit-linear-gradient(red, yellow);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>

<body>

    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <!------ Include the above in your HEAD tag ---------->

    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">

            
                <h3>Welcome</h3>
                <p>You are 30 seconds away from earning your own money!</p>
                <a href="index.php">
                                <img src="assets/img/logo_final.png" style="width: 150px;" alt="">
                            </a>
                <!-- <a href="register.php" class="btn login-btn">Register</a><br /> -->
            </div>
            <div class="col-md-9 register-right">
                <!-- <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Employee</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Hirer</a>
                            </li>
                        </ul> -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">
                          
                        </h3>
                        <form action="api/login_submit.php" method="post">
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group input-group">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                CM -
                                            </span>
                                        </div>

                                        <input minlength="6" name="user_id" maxlength="6" type="text" id="country" onkeypress="return isNumber(event)" class="form-control" placeholder="User ID *" value="" />

                                    </div>



                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <input type="password" name="password" minlength="6" id="password" required class="form-control" placeholder="Password *" value="" />
                                    </div>
                                   <div>
                                    <a href="forget.php" style="float: right;color:purple">Forget Password?</a>
                                    </div>
                                    <br>
                                    <div class="d-flex justify-content-center">
                                        <input type="submit" id="register2" class=" btnRegister" value="Login" />
                                       
                                    </div>
                                    <div class="text-center   mt-3" style="color:white">
                                    Don't have an account? <a href="register.php" style="color:purple">Create an acoount</a> 
                                            </div>
                                </div>
                            </div>
                        </form>
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