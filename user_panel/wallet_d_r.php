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
                            Direct Referal Bonus
                        </h3>
                    </div>
                    <div class="row ">

                        <div class="col-md-4">
                            <div class="card">

                                <div class="card-body">
                                    <p class="text-center">
                                        Total Direct Referal Bonus
                                    </p>
                                    <h3 class="text-center ">
                                        <i class="fa-solid fa-indian-rupee-sign"></i> <?php
                                                                                        echo daily_income($user_id);
                                                                                        ?>
                                    </h3>


                                </div>
                            </div>

                        </div>





                    </div>

                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        Direct Referal Bonus
                                    </h4>
                                    <div class="table-responsive">

                                        <table id="example" class="table">
                                            <thead>
                                                <tr>
                                                <th class="text-center">S No.</th>
                                                    <th class="text-center">Amount</th>

                                                    <th class="text-center">Date</th>



                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
$i = 0;
                                                $category = mysqli_query($conn, "select * from wallet where user_id='$user_id' and type='direct_income' ORDER BY creation_date DESC  ");

                                                while ($fetch_category = mysqli_fetch_array($category)) {
                                                    $i++;
                                                    $id = $fetch_category['user_id'];

                                                ?>
                                                    <tr>


                                                    <td class="text-center"><?php echo $i; ?></td>
                                                        <td class="text-center"><i class="fa-solid fa-indian-rupee-sign"></i> <?php echo $fetch_category['amount'] ?></td>






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
                            } else if (html == 'Referral id is wrong!') {
                                $('#state').val(html);
                                document.getElementById("register2").disabled = true;
                                document.getElementById("register2").style.backgroundColor = "gray";
                            } else {

                                $('#state').val(html);
                                document.getElementById("register2").disabled = false;
                                document.getElementById("register2").style.backgroundColor = "#1B1D29";
                            }
                        }
                    });
                } else {
                    document.getElementById("register2").disabled = true;
                    document.getElementById("register2").style.backgroundColor = "gray";
                    $('#state').val('Referral id is wrong!');

                }
            });


        });
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