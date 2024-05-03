<?php
session_start();
if (empty($_SESSION['user_id'])) { //if not yet logged in
    echo '<script type="text/javascript">
  alert("You are Logged out")
  window.location.href = "../register.php"
  </script>';
    exit;
}
$user_id = $_SESSION['user_id'];

include '../includes/connection.php';
include '../function.php';


?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/melody/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Aug 2018 07:41:55 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cloud Miners</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/iconfonts/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../assets/img/logo_final.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .navbar-menu-wrapper {
            justify-content: end;
        }

        .col-md-4 {
            margin-bottom: 25px;
        }

        #usdqr {
            display: none;
        }

        #usdamount {
            display: none;
        }
    </style>
</head>

<body>

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <?php include 'header.php'; ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->


            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <?php include 'menu.php' ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            Withdraw
                        </h3>
                    </div>
                    <div class="row ">



                        <div class="col-md-4">
                            <div class="card">

                                <div class="card-body">
                                    <p class="text-center">Wallet Balance</p>
                                    <h3 class="text-center ">
                                        <i class="fa-solid fa-indian-rupee-sign"></i> <?php echo fund_wallet_balance($user_id) ?>
                                    </h3>

                                    <div class="text-center mt-3"> <a href="activate.php?id=<?php echo $user_id; ?>" class="btn btn-success">Re-invest</a></div>
                                </div>
                            </div>

                        </div>



                        <?php if (bank_details($user_id) == 0) { ?>
                            <div class="col-md-4">
                                <div class="card">

                                    <div class="card-body">
                                        <p class="text-center">Add Bank Details to withdraw money</p>
                                        <h3 class="text-center ">
                                            <a href="bank_details.php" class="btn btn-danger">Add Bank Details</a>
                                        </h3>


                                    </div>
                                </div>

                            </div>
                        <?php } ?>
                        <div class="col-md-4">
                            <div class="card">

                                <div class="card-body">
                                    <h5 class="text-center">Withdraw in USDT</h5>
                                    <h3 class="text-center ">
                                        <a href="usd_withdraw.php" class="btn btn-warning">Withdraw</a>
                                    </h3>


                                </div>
                            </div>

                        </div>
                    </div>
                    <?php if (bank_details($user_id) == 1) { ?>
                        <div class="row">
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <h4 class="card-title ">
                                                Withdraw (INR)

                                            </h4>

                                        </div>
                                        <form action="withdraw_submit.php" method="post">
                                            <div class="form-group row">

                                                <?php
                                                $_SESSION['current_income'] = fund_wallet_balance($user_id);
                                                ?>

                                                <div class="col-md-4 ">
                                                    <input type="hidden" name="type" value="INR">
                                                    <label class="col-form-label">Enter Amount <i class="fa-solid fa-indian-rupee-sign"></i></label>
                                                    <input class="form-control" id="country" required name="amount" type="number">



                                                </div>
                                                <div class="col-md-4 ">

                                                    <label class="col-form-label">Select Bank Account</label>
                                                    <select required id="bank" class="form-control">
                                                        <option value="">Select Bank Account</option>
                                                        <option value="<?php echo account_holder_name($user_id) ?>"><?php echo account_holder_name($user_id) ?></option>
                                                    </select>


                                                </div>

                                                <div class="col-md-4 text-center">



                                                    <button class="btn btn-primary" id="register2">Submit</button>

                                                </div>

                                                <!-- <div class="col-md-4 ">

                                                        <h3 class="text-center">Current Balance Should be greater than <span class="text-danger bg-dark px-2"> <i class="fa-solid fa-indian-rupee-sign"></i> 500 </span>to withdraw amount </h3>





                                                    </div> -->










                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>




















    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <?php include 'footer.php'; ?>
    <!-- partial -->
    </div>
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#country').on('change', function() {
                var countryID = $(this).val();
                if (countryID) {
                    $.ajax({
                        type: 'POST',
                        url: 'check_fund.php',
                        data: 'country_id=' + countryID,
                        success: function(html) {

                            if (html == 1) {
                                alert("Minimum withdraw amount Should be 500");
                                document.getElementById("register2").disabled = true;
                                document.getElementById("register2").style.backgroundColor = "gray";
                            } else if (html == 2) {
                                alert("Withdraw amount should be less than or equal to current balance");
                                document.getElementById("register2").disabled = true;
                                document.getElementById("register2").style.backgroundColor = "gray";
                            } else {


                                document.getElementById("register2").disabled = false;
                                document.getElementById("register2").style.backgroundColor = "#1B1D29";
                            }
                        }
                    });
                } else {
                    document.getElementById("register2").disabled = true;
                    document.getElementById("register2").style.backgroundColor = "gray";


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
    <script>
        function check() {

            var pw1 = document.getElementById('type').value;
            var inr = 'INR';

            if (pw1 != inr) {

                document.getElementById("inramount").style.display = "none";

                document.getElementById("usdamount").style.display = "block";
                document.getElementById("usdqr").style.display = "block";
                document.getElementById("inrqr").style.display = "none";
            } else {
                document.getElementById("usdamount").style.display = "none";
                document.getElementById("inramount").style.display = "block";
                document.getElementById("usdqr").style.display = "none";
                document.getElementById("inrqr").style.display = "block";

            }
        }
    </script>
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script src="vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/misc.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>

    <script>
        $('#exampleModal').on('show.bs.modal', function(event) {

            var button = $(event.relatedTarget) // Button that triggered the modal

            var recipient = button.data('whatever') // Extract info from data-* attributes

            var modal = $(this);

            var dataString = 'id=' + recipient;

            $.ajax({

                type: "GET",

                url: "add_stock.php",

                data: dataString,

                cache: false,

                success: function(data) {

                    console.log(data);

                    modal.find('.dash').html(data);

                },

                error: function(err) {

                    console.log(err);

                }

            });

        })
    </script>

    <!-- endinject -->
    <!-- Custom js for this page-->
    <!--<script src="js/dashboard.js"></script>-->


    <!--  <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 4, "desc" ]]
    } );
} );
    
</script> -->

    <style>
        .dataTables_filter,
        .dataTables_info {
            display: none;
        }
    </style>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js
"></script>

    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">




    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#example1').DataTable();
        });
    </script>




    <script>
        $('.counter-count').each(function() {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {

                //chnage count up speed here
                duration: 4000,
                easing: 'swing',
                step: function(now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    </script>

    <!-- End custom js for this page-->
</body>


<!-- Mirrored from www.urbanui.com/melody/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Aug 2018 07:43:12 GMT -->

</html>