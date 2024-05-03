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

        .col-6 {
            margin-bottom: 25px;

        }

        .col-6>.card {
            height: 100px;
        }

        .navbar.default-layout-navbar .navbar-brand-wrapper .brand-logo-mini img {
            height: 90px;
            width: 150px !important;
        }

        .navbar.default-layout-navbar .navbar-brand-wrapper {
            border-right: solid .1px rgb(5, 36, 84);
        }

        @keyframes marqueeAnimation {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .marquee-container {
            white-space: nowrap;
            overflow: hidden;
            animation: marqueeAnimation 10s linear infinite;
            color: white;

        }

        .sidebar .nav .nav-item.active {
            background: black;
            color: white;
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
                            Live Chat Support
                        </h3>
                    </div>

                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        Live Chat Support
                                    </h4>
                                    <div style="width: 100%;height:500px;border-bottom:none;overflow-y:scroll" class="bg-white py-4">
                                        <?php
                                        $sql = mysqli_query($conn, "SELECT * FROM chat where user_id='$user_id'");
                                        $num_row = mysqli_num_rows($sql);
                                        if ($num_row > 0) {
                                            while ($row = mysqli_fetch_assoc($sql)) {
                                                if ($row['admin_message'] == null) {
                                        ?>       
                                                    <div class="p-2 my-2" style="float:right;background-color: rgb(253,151,1);color:white;width:80%;border-radius:50rem!important;">
                                                     <?php echo $row['message'] ?></div>
                                                <?php } else { ?>
                                                    <div class="p-2 my-2 " style="clear: right;background-color: rgb(255,66,146);color:white;width:80%;border-radius:50rem!important">
                                                    <?php echo $row['admin_message'] ?></div>
                                                <?php } ?>
                                        <?php  }
                                        } ?>
                                    </div>

                                    <form action="chat_submit.php" method="post">
                                        <div class="input-group ">
                                            <input type="text" name="message" required class="form-control" minlength="4" maxlength="50" placeholder="Enter Your Message" aria-describedby="button-addon2">
                                            <button class="btn btn-primary" type="submit" id="button-addon2">Button</button>
                                        </div>
                                    </form>
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