<?php
session_start();
if (empty($_SESSION['admin'])) { //if not yet logged in
  header("Location: index.php"); // send to login page
  exit;
}

include '../includes/connection.php';
include '../function.php';


if (isset($_POST['content'])) {
  $content = $_POST['content'];
  $sql = mysqli_query($conn, "UPDATE admin set content='$content'");
}
if (isset($_POST['first_slab'])) {
  $first_slab = $_POST['first_slab'];
  $sql = mysqli_query($conn, "UPDATE admin set first_slab='$first_slab'");
}
if (isset($_POST['second_slab'])) {
  $second_slab = $_POST['second_slab'];
  $sql = mysqli_query($conn, "UPDATE admin set second_slab='$second_slab'");
}
?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/melody/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Aug 2018 07:41:55 GMT -->

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
</head>

<body>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">

    <div class="modal-dialog">

      <div class="modal-content">

        <div class="modal-header">



          <h4 class="modal-title text-center ">Add Stock</h4>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

        </div>

        <div class="dash">



        </div>



      </div>

    </div>

  </div>
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
              Dashboard
            </h3>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">
                    <i class="fas fa-table"></i>
                    Fund Request
                  </h4>
                  <div class="table-responsive">

                    <table class="table" id="example">

                      <thead>

                        <tr>








                          <th class="text-center">S NO.</th>
                          <th class="text-center">Name</th>
                          <th class="text-center">User Id</th>




                          <th class="text-center">Type</th>
                          <th class="text-center">UTR</th>
                          <th class="text-center">Amount(INR)</th>
                          <th class="text-center">Actual Amount</th>
                          <th class="text-center">Status</th>
                          <th class="text-center">Action</th>
                          <th class="text-center">Delete</th>
                          <th class="text-center">Date & Time</th>
                        </tr>

                      </thead>

                      <tbody>

                        <?php
                        $i = 0;

                        $category = mysqli_query($conn, "select * from fund_request where status!=2  order by fund_id DESC limit 50");

                        while ($fetch_category = mysqli_fetch_array($category)) {
                          $i++;


                          $id = $fetch_category['fund_id'];



                        ?>

                          <tr>








                            <td class="text-center"><?php echo $i; ?></td>
                            <td class="text-center"> <?php echo user_name($fetch_category['user_id']) ?> </td>
                            <td class="text-center"> <?php echo $fetch_category['user_id'] ?> </td>

                            <td class="text-center"> <?php echo $fetch_category['type'] ?> </td>
                            <td class="text-center"> <?php echo $fetch_category['UTR'] ?> </td>
                            <td class="text-center"> <?php echo $fetch_category['amount'] ?> </td>
                            <td class="text-center"> <?php echo $fetch_category['actual_amount'] ?> </td>






















                            <td class="text-center">

                              <?php if ($fetch_category['status'] == 0) { ?>
                                <button class="btn btn-warning py-2">Not Accepted</button>
                              <?php } else { ?>
                                <button class="btn btn-success py-2">Accepted</button>
                              <?php } ?>
                            </td>

                            <td class="text-center">
                              <?php if ($fetch_category['status'] == 0) { ?>
                                <a class="btn btn-success py-2" href="fund_request_complete.php?id=<?php echo $id ?>&user_id=<?php echo $fetch_category['user_id'] ?>&amount=<?php echo $fetch_category['amount'] ?>">Mark Completed<a>
                                  <?php } ?>
                            </td>
                            <td class="text-center">
                              <?php if ($fetch_category['status'] == 0) { ?>
                                <a class="btn btn-danger py-2" href="fund_request_delete.php?id=<?php echo $id ?>">Delete<a>
                                  <?php } ?>
                            </td>
                            <td class="text-center">
                              <?php echo $fetch_category['creation_date'] ?>
                            </td>





                          </tr>

                        <?php } ?>







                      </tbody>

                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row ">

            <div class="col-md-4">
              <div class="card">

                <div class="card-body">
                  <?php
                  $user = mysqli_query($conn, "select * from users");
                  $total_user = mysqli_num_rows($user);
                  ?>
                  <h3 class="text-center counter-count">
                    <?php echo $total_user; ?>
                  </h3>

                  <p class="text-center">Total Users</p>
                </div>
              </div>

            </div>
            <div class="col-md-4">
              <div class="card">

                <div class="card-body">
                  <?php
                  $sql = mysqli_query($conn, "SELECT content from admin");
                  $row = mysqli_fetch_assoc($sql);
                  ?>
                  <h3 class="text-center ">
                    Slogan
                  </h3>

                  <h6 class="text-center text-danger"> "<?php
                                                        echo $row['content']
                                                        ?>"</h6>
                </div>
              </div>

            </div>
            <div class="col-md-4">
              <div class="card">

                <div class="card-body">
                  <form action="" method="post">
                    <label class="col-form-label">Edit Slogan</label>


                    <input class="form-control" required name="content" type="text">
                    <div class="d-flex justify-content-center
                  ">
                      <button class="btn btn-primary py-2 mt-2" type="submit">Submit</button>
                    </div>
                  </form>
                </div>
              </div>

            </div>
            <div class="col-md-4">
              <div class="card">

                <div class="card-body">
                  <?php
                  $user = mysqli_query($conn, "select * from daily_mining_bonus_list");
                  $total_user = mysqli_num_rows($user);
                  ?>
                  <h3 class="text-center counter-count">
                    <?php echo $total_user; ?>
                  </h3>

                  <p class="text-center">Total daily Income users</p>
                </div>
              </div>

            </div>

            <div class="col-md-4">
              <div class="card">

                <div class="card-body">
                  <?php
                  $user = mysqli_query($conn, "select * from royalty_income_list where type='First_slab' ");
                  $total_user = mysqli_num_rows($user);
                  ?>
                  <h3 class="text-center counter-count">
                    <?php echo $total_user; ?>
                  </h3>

                  <p class="text-center">Total First Slab royalty income user</p>
                </div>
              </div>

            </div>
            <div class="col-md-4">
              <div class="card">

                <div class="card-body">
                  <form action="" method="post">
                    <label class="col-form-label">Enter First Slab Amount</label>


                    <input class="form-control" required value="<?php echo first_slab_income(); ?>" name="first_slab" type="text">
                    <div class="d-flex justify-content-center
                  ">
                      <button class="btn btn-primary py-2 mt-2" type="submit">Submit</button>
                    </div>
                  </form>
                </div>
              </div>

            </div>
            <div class="col-md-4">
              <div class="card">

                <div class="card-body">
                  <?php
                  $user = mysqli_query($conn, "select * from royalty_income_list where type='Second_slab' ");
                  $total_user = mysqli_num_rows($user);
                  ?>
                  <h3 class="text-center counter-count">
                    <?php echo $total_user; ?>
                  </h3>

                  <p class="text-center">Total Second Slab royalty income user</p>
                </div>
              </div>

            </div>
            <div class="col-md-4">
              <div class="card">

                <div class="card-body">
                  <form action="" method="post">
                    <label class="col-form-label">Enter Second Slab Amount</label>


                    <input class="form-control" required value="<?php echo second_slab_income(); ?>" name="second_slab" type="text">
                    <div class="d-flex justify-content-center
                  ">
                      <button class="btn btn-primary py-2 mt-2" type="submit">Submit</button>
                    </div>
                  </form>
                </div>
              </div>

            </div>
          </div>


          <!-- <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">
                    <i class="fas fa-table"></i>
                    New Chats
                  </h4>
                  <div class="table-responsive">

                    <table class="table">

                      <thead>

                        <tr>









                          <th class="text-center">Name</th>
                          <th class="text-center">User Id</th>




                          <th class="text-center">Message</th>


                          <th class="text-center">Action</th>
                          <th class="text-center">Date & Time</th>
                        </tr>

                      </thead>

                      <tbody>

                        <?php
                        $sql = mysqli_query($conn, "SELECT DISTINCT user_id from chat order by id DESC ");
                        while ($row = mysqli_fetch_assoc($sql)) {
                          $user_id = $row['user_id'];

                          $category = mysqli_query($conn, "select * from chat where user_id='$user_id'  order by id DESC limit 1");

                          while ($fetch_category = mysqli_fetch_array($category)) {





                            $id = $fetch_category['id'];



                        ?>

                              <tr>









                                <td class="text-center"> <?php echo user_name($fetch_category['user_id']) ?> </td>
                                <td class="text-center"> <?php echo $fetch_category['user_id'] ?> </td>

                                <td class="text-center"> <?php echo $fetch_category['message'] ?> </td>

                                <td class="text-center">

                                  <a class="btn btn-primary py-2" href="chat_details.php?user_id=<?php echo $fetch_category['user_id'] ?>">Chat<a>

                                </td>
                                <td class="text-center">
                                  <?php echo $fetch_category['creation_date'] ?>
                                </td>





                              </tr>

                        <?php
                          }
                        } ?>







                      </tbody>

                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
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