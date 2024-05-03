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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">


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
                            ACTIVATE ID
                        </h3>
                    </div>
                    <div class="row ">


                        <div class="col-md-4">
                            <div class="card">

                                <div class="card-body">
                                    <p class="text-center">
                                        CM-<?php echo $user_id ?> <br> Activation Status
                                    </p>
                                    <h3 class="text-center ">


                                        <?php
                                        if (activation_staus($user_id) == 0) { ?>
                                            <button class="btn btn-danger py-2">Pending</button>
                                        <?php     } else {
                                        ?>
                                            <button class="btn btn-success py-2">Activated</button>
                                        <?php } ?>
                                    </h3>


                                </div>
                            </div>

                        </div>

                        <div class="col-md-4">
                            <div class="card">

                                <div class="card-body">

                                    <h3 class="text-center ">
                                        <i class="fa-solid fa-indian-rupee-sign"></i> <?php
                                                                                        $balance = fund_wallet_balance($user_id);
                                                                                        echo $balance; ?>
                                    </h3>

                                    <p class="text-center">Wallet Balance</p>
                                </div>
                            </div>

                        </div>



                    </div>
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        Activate ID
                                    </h4>
                                    <form action="activate_submit.php" method="post">
                                        <div class="form-group row">


                                            <div class="col-md-4 ">
                                                <label class="col-form-label">USER-ID</label>

                                                <input class="form-control" id="country" required name="user_id" onkeypress="return isNumber(event)" minlength="6" maxlength="6" type="text">



                                                <label class="col-form-label">User Name</label>
                                                <input type="text" id="state" class="form-control" readonly name="ref_name" style="background-color: #e9ecef;" value="" />
                                                <span class="text-center" style="display: none;">This User Id is already active</span>
                                                <label class="col-form-label">Enter Amount</label>

                                                <input class="form-control" required name="amount" id="amount" onkeypress="return isNumber(event)" minlength="3" maxlength="5" type="text" <?php if (!empty($_GET['id'])) { ?> value="<?php echo $balance ?>" <?php } ?>>





                                                <label class="col-form-label">Select Type</label>
                                                <select required name="type" id="type" class="form-control">
                                                    <option value="">Select Activation Type</option>

                                                    <option value="activation" id="factive">Activation</option>

                                                    <option value="topup" id="topup">RE-Top up</option>
                                                </select>



                                            </div>

                                            <div class="col-md-4 text-center">


                                                <?php if (fund_wallet_balance($user_id) >= 500) {
                                                    $_SESSION['fund'] = fund_wallet_balance($user_id);
                                                ?>


                                                    <button class="btn btn-primary" id="register2">Submit</button>
                                                <?php } else {
                                                    $_SESSION['fund'] = 0;
                                                ?>
                                                    <button class="btn btn-primary" id="register2">Submit</button>
                                                <?php } ?>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        History
                                    </h4>
                                    <div class="table-responsive">

                                        <table id="example" class="table">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">S No.</th>
                                                    <th class="text-center">User ID</th>
                                                    <th class="text-center">Name</th>
                                                    <th class="text-center">Amount</th>

                                                    <th class="text-center">Date</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 0;
                                                $category = mysqli_query($conn, "select * from activation_request where buyer_id='$user_id' ORDER BY creation_date DESC  ");

                                                while ($fetch_category = mysqli_fetch_array($category)) {

                                                    $id = $fetch_category['id'];
                                                    $i++;
                                                ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $i; ?></td>
                                                        <td class="text-center"><?php echo $fetch_category['user_id'] ?></td>
                                                        <td class="text-center"><?php echo user_name($fetch_category['user_id']) ?></td>
                                                        <td class="text-center"><?php echo $fetch_category['amount'] ?></td>





                                                        <td class="text-center"><?php







                                                                                $timestamp = $fetch_category['creation_date'];

                                                                                $datetime = explode(" ", $timestamp);

                                                                                $date = $datetime[0];

                                                                                $time = $datetime[1];







                                                                                $reformatted_date = date('d-m-Y', strtotime($date));



                                                                                echo $reformatted_date;





                                                                                ?></td>








                                                    </tr>
                                                <?php } ?>



                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


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
                        url: 'ajaxData.php',
                        data: 'country_id=' + countryID,
                        success: function(html) {
                            if (html == 1) {
                                alert("User Id is already activated");
                                document.getElementById("register2").disabled = true;
                                document.getElementById("register2").style.backgroundColor = "gray";
                            } else if (html == 2) {
                                document.getElementById("register2").disabled = true;
                                document.getElementById("register2").style.backgroundColor = "gray";
                                $('#state').val("User Id is wrong!");
                                alert("User Id is wrong!");

                            } else {
                                var data = JSON.parse(html);
                                var name = data.name;
                                var activation_status = data.activation_status;
                                $('#state').val(name);
                                if (activation_status === 0) {
                                    document.getElementById("topup").style.display = "none";
                                    document.getElementById("factive").style.display = "block";
                                } else {
                                    document.getElementById("topup").style.display = "block";
                                    document.getElementById("factive").style.display = "none";
                                }
                                document.getElementById("register2").disabled = false;
                                document.getElementById("register2").style.backgroundColor = "#FD9701";
                            }
                        }
                    });
                } else {
                    document.getElementById("register2").disabled = true;
                    document.getElementById("register2").style.backgroundColor = "gray";
                    $('#state').val('User Id is wrong!');

                }
            });


        });
    </script>
    <script>
        $(document).ready(function() {
            $('#amount').on('change', function() {
                var countryID = $(this).val();
                if (countryID) {
                    $.ajax({
                        type: 'POST',
                        url: 'check_active.php',
                        data: 'country_id=' + countryID,
                        success: function(html) {

                            if (html == 1) {
                                alert("Minimum activation amount Should be 500");
                                document.getElementById("register2").disabled = true;
                                document.getElementById("register2").style.backgroundColor = "gray";
                            } else if (html == 2) {
                                alert("Activation amount should be less than or equal to current balance");
                                document.getElementById("register2").disabled = true;
                                document.getElementById("register2").style.backgroundColor = "gray";
                            } else {

                                var amount = html;

                                showBeautifulAlert(amount);
                                // alert("You will get "+percent+"% Daily on Rs."+amount+" which is equal to Rs."+daily_return);
                                document.getElementById("register2").disabled = false;
                                document.getElementById("register2").style.backgroundColor = "#FD9701";
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function showBeautifulAlert(amount) {
            // Replace percent, amount, and daily_return with your actual values
            var percent = 3;
            var amount = amount;
            if (amount > 10000) {
                percent = 4;
            }
            var daily_return = parseInt((amount * percent) / 100);

            var total_profit = daily_return * 5;
            var currentDate = new Date();


            var dateAfter5Days = new Date();

            dateAfter5Days.setDate(currentDate.getDate() + 5);
            var formattedCurrentDate = currentDate.toISOString().split('T')[0];
            var formattedDateAfter5Days = dateAfter5Days.toISOString().split('T')[0];

            Swal.fire({
                title: 'Congratulations!',
                html: `Invest Amount <span style="color: #000000;"><strong>Rs.${amount}</strong></span> <br> Daily Mining Bonus <span style="color: #000000;"><strong>Rs.${daily_return}</strong></span><br>
                 Total Profit <span style="color: #000000;"><strong>Rs.${total_profit}</strong></span><br>Contract Period <span style="color: #000000;"><strong>5 Days</strong></span> 
                 <br> Start Date <span style="color: #000000;"><strong>${formattedCurrentDate}</strong></span><br> End Date <span style="color:#000000;"><strong>${formattedDateAfter5Days}</strong></span>
                 `,
                //  icon: 'success',
                confirmButtonColor: '#FF4292',
                confirmButtonText: 'OK',
                background: '#f5a623',
                color: '#f0f0f0',

            });
        }

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