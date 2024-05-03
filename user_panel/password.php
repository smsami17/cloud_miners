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

//data delete////

if (isset($_POST['password'])) {

    $sql_update = mysqli_query($conn, "UPDATE users set password='$_POST[password]' where user_id='$user_id'");





    echo '<script type="text/javascript">

    alert("Password Changed Successfully")
  
  window.location.href = "dashboard.php"
  
  </script>';
}



///data delete////



//////////////////////////////////////////////////////////////////



//update category////







//update category//











?>



<!DOCTYPE html>

<html lang="en">





<!-- Mirrored from www.urbanui.com/melody/template/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Aug 2018 07:46:02 GMT -->

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



    <link rel="stylesheet" href="css/mdb.min.css">

    <!-- endinject -->



    <link rel="shortcut icon" href="..//assets/img/logo_final.png" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">



    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.css" rel="stylesheet">

</head>

<style>
    .btn:hover {

        background-color: #392C70;

    }

    .navbar-menu-wrapper {
        justify-content: end;
    }
</style>

<body>

    <!-- Modal -->

    <div class="modal fade right" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-full-height modal-right" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <p>View Order</p>

                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>

                    <!--<h4 class="modal-title text-center " >View Order</h4>-->

                </div>

                <div class="dash">



                </div>



            </div>

        </div>

    </div>

    <!--Model -->

    <!-- Modal -->

    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header" style="background-color:#2bbbad">

                    <p style="font-size:20px;color:white">View Commission</p>

                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>



                </div>

                <div class="dash">



                </div>



            </div>

        </div>

    </div>

    <!--Model -->

    <!--Model -->

    <div class="container-scroller">

        <!-- partial:../../partials/_navbar.html -->

        <?php include 'header.php'; ?>

        <!-- partial -->

        <div class="container-fluid page-body-wrapper">

            <!-- partial:../../partials/_settings-panel.html -->





            <!-- partial -->

            <!-- partial:../../partials/_sidebar.html -->

            <?php include 'menu.php'; ?>





            <!-- partial -->

            <div class="main-panel" >

                <div class="content-wrapper">



                    <div class="card" >



                        <div class="card-body">

                            <!--<button type="button" class="btn btn-primary btn-sm pull-right " data-toggle="modal" data-target="#exampleModal-2">Add City</button>-->

                            <h4 class="card-title">Change Password</h4>




                            <form action="" method="post">
                                <div class="form-group row">

                                    <div class="col-md-4">

                                        <label class="col-form-label">New Password</label>

                                        <input maxlength="6" minlength="6" class="form-control" required name="password" type="password">

                                    </div>

                                </div>
                                <button type="submit" name="submit" class="btn btn-primary" id="btn_submit">Submit</button>
                            </form>
                        </div>

                    </div>

                    <!-- content-wrapper ends -->

                    <!-- partial:../../partials/_footer.html -->


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

        <!-- inject:js -->

        <script src="js/off-canvas.js"></script>

        <script src="js/hoverable-collapse.js"></script>

        <script src="js/misc.js"></script>

        <script src="js/settings.js"></script>

        <script src="js/todolist.js"></script>

        <!-- endinject -->

        <!-- Custom js for this page-->

        <script src="js/data-table.js"></script>

        <script src="js/modal-demo.js"></script>

        <script type="text/javascript" src="js/validation.js"></script>

        <script type="text/javascript" src="js/number.js"></script>



        <script type="text/javascript" src="js/mdb.min.js"></script>



        <script>
            $('#exampleModal').on('show.bs.modal', function(event) {

                var button = $(event.relatedTarget) // Button that triggered the modal

                var recipient = button.data('whatever') // Extract info from data-* attributes

                var modal = $(this);

                var dataString = 'id=' + recipient;

                $.ajax({

                    type: "GET",

                    url: "view-order.php",

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
            $('#exampleModal1').on('show.bs.modal', function(event) {

                var button = $(event.relatedTarget) // Button that triggered the modal

                var recipient = button.data('whatever') // Extract info from data-* attributes

                var modal = $(this);

                var dataString = 'id=' + recipient;

                $.ajax({

                    type: "GET",

                    url: "commission.php",

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

        <!-- End custom js for this page-->



        <!-- Modal -->

        <div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">

            <div class="modal-dialog" role="document">

                <div class="modal-content">

                    <div class="modal-header">

                        <h5 class="modal-title text-center" id="exampleModalLabel-2">Add City</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">&times;</span>

                        </button>

                    </div>

                    <div class="modal-body">

                        <form action="" method="POST" enctype="multipart/form-data">

                            <div class="form-group">



                                <label for="email">City Name</label>

                                <input type="text" class="form-control" name="city_name" onkeypress="return onlyAlphabets(event,this);">

                            </div>







                            <button type="submit" name="submit" class="btn btn-info">Submit</button>

                            <button type="button" class="btn btn-info pull-right" data-dismiss="modal">Cancel</button>

                    </div>



                    </form>

                </div>

            </div>

        </div>

        <!-- end model-->















        <!--<script type="text/javascript">

        

$(document).ready(function() {

    $('#example').DataTable(

        

         {     



      "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],

        "iDisplayLength": 5

       } 

        );

} );









      </script>-->







        <script type="text/javascript">
            function delete_confirm() {

                if ($('.checkbox:checked').length > 0) {

                    var result = confirm("Are you sure to delete selected ?");

                    if (result) {

                        return true;

                    } else {

                        return false;

                    }

                } else {

                    alert('Select at least 1 record to delete.');

                    return false;

                }

            }
        </script>

        <script type="text/javascript">
            $(document).ready(function() {

                $('#select_all').on('click', function() {

                    if (this.checked) {

                        $('.checkbox').each(function() {

                            this.checked = true;

                        });

                    } else {

                        $('.checkbox').each(function() {

                            this.checked = false;

                        });

                    }

                });



                $('.checkbox').on('click', function() {

                    if ($('.checkbox:checked').length == $('.checkbox').length) {

                        $('#select_all').prop('checked', true);

                    } else {

                        $('#select_all').prop('checked', false);

                    }

                });

            });
        </script>



        <script type="text/javascript">
            $(document).ready(function() {

                $('#example').DataTable({

                    dom: 'Bfrtip',

                    buttons: [

                        'csv', 'excel', 'pdf', 'print'

                    ]

                });

            });
        </script>





        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>



        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>



        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>



        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>



        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>



        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>







</body>





<!-- Mirrored from www.urbanui.com/melody/template/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Aug 2018 07:46:03 GMT -->

</html>