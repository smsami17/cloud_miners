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

        #usdutr {
            display: none;
        }

        #usdw {
            display: none;
        }

        #usdw1 {
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
                            ADD FUNDS
                        </h3>
                    </div>
                    <div class="row ">

                        <!-- <div class="col-md-4">
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

                        </div> -->
                        <div class="col-md-4">
                            <div class="card">

                                <div class="card-body">

                                    <h3 class="text-center ">
                                        <i class="fa-solid fa-indian-rupee-sign"></i> <?php echo fund_wallet_balance($user_id) ?>
                                    </h3>

                                    <p class="text-center">Wallet Balance</p>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4 py-3 px-2">
                            <div class="card">

                                <div class="card-body">
                                    <h4>Deposit Notes:-</h4>

                                    <p>1.Minimum Rs.500 Deposit</p>
                                    <p>2.Maximum Rs.100000 Deposit</p>
                                    <p>3.Fund request will be complete shortly</p>
                                    <p>4.After Send INR enter UTR NO. of transaction</p>
                                    <p>5.After Send USD enter wallet address of transaction</p>
                                </div>



                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        Add Funds
                                    </h4>
                                    <form action="fund_submit.php" method="post">
                                        <div class="form-group row">

                                            <div class="col-md-4">

                                                <label class="col-form-label">Select Type</label>


                                                <select required name="type" onchange="check()" id="type" class="form-control">
                                                    <option value="INR">INR</option>
                                                    <option value="USD">USD</option>
                                                </select>



                                            </div>

                                            <div class="col-md-4 ">

                                                <label class="col-form-label">Amount</label>


                                                <select required name="inramount" class="form-control " id="inramount">
                                                    <?php
                                                    for ($i = 1; $i < 201; $i++) {  ?>
                                                        <option value="<?php echo $i * 500 ?>"><i class="fa-solid fa-indian-rupee-sign"></i><?php echo $i * 500 ?></option>
                                                    <?php  }
                                                    ?>


                                                </select>
                                                <select required name="usdamount" class="form-control " id="usdamount">
                                                    <?php
                                                    $usd_rate = usd_rate();
                                                    for ($i = 1; $i < 201; $i++) {  ?>
                                                        <option value="<?php echo $i * 500 ?>"><i class="fa-solid fa-dollar-sign"></i><?php $foo = ($i * 500) / $usd_rate;       
                                                      echo number_format((float)$foo, 2, '.', ''); ?></option>
                                                    <?php  }
                                                    ?>

                                                </select>


                                            </div>





                                            <div class="col-md-4 text-center">
                                                <div style="border: solid 1px black;background-color:rgb(253,151,1)" class="p-3 ">
                                                    <h3 class="text-center">Scan QR code for payment</h3>

                                                    <a href="../assets/img/qrinr (2).jpg" id="inrqr" download="qrcode">
                                                        <img src="../assets/img/qrinr (2).jpg" style="width: 100%;" alt="qrcode">
                                                        <img src="../assets/img/upi.png" style="width: 100%;" alt="">
                                                    </a>
                                                    <a href="../assets/img/qrusd (1).jpg" id="usdqr" download="qrcode">
                                                        <img src="../assets/img/qrusd (1).jpg" style="width: 100%;" alt="qrcode">



                                                    </a>

                                                    <a class="mt-4 btn btn-success">Click on image to download</a>
                                                </div>
                                            </div>


                                            <label class="col-form-label" for="myInput" id="usdw1">Wallet Address</label>

                                            <div class="input-group mb-3" id="usdw">

                                                <input type="text" class="form-control" id="myInput" readonly value="TMKAFw7VWapCgsx42oWVDgUVWrwK9FfzJ4" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <button onclick="myFunction()" class="btn btn-primary" type="button">Copy <i class="fas fa-clipboard"></i></button>
                                                </div>
                                            </div>
                                            <div class="col-md-4 " >

                                                <label class="col-form-label" id="inrutr">UTR No.</label>
                                                <label class="col-form-label" id="usdutr">Enter Wallet Address
                                                    <!-- (TMKAFw7VWapCgsx42oWVDg
                                                UVWrwK9FfzJ4) -->
                                                </label>
                                                <input class="form-control" required id="utrinput" placeholder="Enter UTR" name="utr" type="text">

                                            </div>

                                          

                                            <div class="col-md-4 text-center">



                                                <button class="btn btn-primary">Submit</button>

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
                                                    <th class="text-center">Type</th>
                                                    <th class="text-center">Amount</th>
                                                    <th class="text-center">UTR</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Date</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 0;
                                                $category = mysqli_query($conn, "select * from fund_request where user_id='$user_id' ORDER BY creation_date DESC  ");

                                                while ($fetch_category = mysqli_fetch_array($category)) {

                                                    $id = $fetch_category['fund_id'];
                                                    $i++;
                                                ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $i; ?></td>
                                                        <td class="text-center"><?php echo $user_id ?></td>
                                                        <td class="text-center">

                                                            <?php echo $fetch_category['type'] ?></td>
                                                        <td class="text-center">
                                                            <?php if ($fetch_category['type'] == 'INR') { ?>
                                                                <i class="fa-solid fa-indian-rupee-sign"></i>
                                                            <?php } else { ?>
                                                                <i class="fa-solid fa-dollar-sign"></i>
                                                            <?php } ?>
                                                            <?php echo $fetch_category['actual_amount'] ?>
                                                        </td>
                                                        <td class="text-center"><?php echo $fetch_category['UTR'] ?></td>



                                                        <td class="text-center">
                                                            <?php
                                                            if ($fetch_category['status'] == 1) {
                                                            ?>
                                                                <button class="btn btn-success py-2">Completed</button>
                                                            <?php } else { ?>
                                                                <button class="btn btn-warning py-2">Pending</button>
                                                            <?php } ?>
                                                        </td>
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
        function check() {

            var pw1 = document.getElementById('type').value;
            var inr = 'INR';
            var inputElement = document.getElementById("utrinput");
            if (pw1 != inr) {

                document.getElementById("inramount").style.display = "none";
                document.getElementById("usdamount").style.display = "block";
                document.getElementById("usdqr").style.display = "inline-block";
                document.getElementById("inrqr").style.display = "none";
                document.getElementById("usdutr").style.display = "block";
                document.getElementById("inrutr").style.display = "none";
                document.getElementById("usdw").style.display = "flex";
                document.getElementById("usdw1").style.display = "block";
            
                inputElement.placeholder = "Enter Wallet Address";


            } else {
                document.getElementById("usdamount").style.display = "none";
                document.getElementById("inramount").style.display = "block";
                document.getElementById("usdqr").style.display = "none";
                document.getElementById("inrqr").style.display = "inline-block";
                document.getElementById("usdutr").style.display = "none";
                document.getElementById("inrutr").style.display = "block";
                document.getElementById("usdw").style.display = "none";
                document.getElementById("usdw1").style.display = "none";
           
                inputElement.placeholder = "Enter UTR";

            }
        }

        function myFunction() {
            // Get the text field
            var copyText = document.getElementById("myInput");

            // Select the text field
            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices

            // Copy the text inside the text field
            navigator.clipboard.writeText(copyText.value);

            // Alert the copied text
            alert("Wallet Address Copied  ");
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