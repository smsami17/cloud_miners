<?php
session_start();
if (empty($_SESSION['admin'])) { //if not yet logged in
    header("Location: index.php"); // send to login page
    exit;
}

include '../includes/connection.php';
include '../function.php';
if(empty($_GET['user_id']))
{
    header("Location: index.php");
}
else
{
 $user_id=$_GET['user_id'];   
}
///data delete////


///data delete////










?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/melody/template/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Aug 2018 07:46:02 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
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

    <link rel="shortcut icon" href="..//assets/img/logo_final.png" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.css" rel="stylesheet">
</head>

<body>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!--<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>-->
                    <h4 class="modal-title text-center ">View City</h4>
                </div>
                <div class="dash">

                </div>

            </div>
        </div>
    </div>
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
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title">Live Chat Support</h4>
                            <h4 class="card-title">USER-ID : <?php echo $user_id; ?></h4>
                            <h4 class="card-title">Name : <?php echo user_name($user_id); ?></h4>
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
                                                        if ($row['admin_message'] != null) {
                                                ?>
                                                            <div class="p-2 my-2" style="float:right;background-color: rgb(253,151,1);color:white;width:80%;border-radius:50rem!important;">
                                                                <?php echo $row['admin_message'] ?></div>
                                                        <?php } else { ?>
                                                            <div class="p-2 my-2 " style="clear: right;background-color: rgb(255,66,146);color:white;width:80%;border-radius:50rem!important">
                                                                <?php echo $row['message'] ?></div>
                                                        <?php } ?>
                                                <?php  }
                                                } ?>
                                            </div>

                                            <form action="chat_submit.php" method="post">
                                                <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
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
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
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


    <script>
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            var modal = $(this);
            var dataString = 'id=' + recipient;
            $.ajax({
                type: "GET",
                url: "update-city.php",
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


    <script>
        $(document).ready(function() {
            $('#summernote').summernote();





        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.js"></script>


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