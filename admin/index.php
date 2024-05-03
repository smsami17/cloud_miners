<?php
//ob_start();
session_start();
include '../includes/connection.php';
include '../function.php';
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = mysqli_query($conn, "select * from admin where username='" . $username . "' and password='" . $password . "'");
  $data = mysqli_num_rows($sql);
  if ($data > 0) {
    $_SESSION['admin'] = $username;
    header("location:dashboard.php");
  } else {
    echo '<script type="text/javascript">
  alert("Username and Password are Not Match!")
window.location.href = "index.php"
</script>';

  }

}
//ob_flush();
?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from www.urbanui.com/melody/template/pages/samples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Aug 2018 07:46:09 GMT -->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <!-- Required meta tags -->

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
  <link rel="shortcut icon" href="../assets/img/logo_final.png" />
</head>
<style>
  .btn-primary {
    background-color: #de1f26;
    border-color: #00a54e;
  }

  .btn-primary:hover {
    background-color: #10693a;
    border-color: #10693a;
  }
</style>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <center><img src="..//assets/img/logo_final.png" alt="logo">
              </div>
              <h4>Hello! Admin</h4>
              <!--<h6 class="font-weight-light">Sign in to continue.</h6>-->
              <form class="pt-3" action="" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" placeholder="Password">
                </div>
                <div class="mt-3">

                  <button class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn" type="submit"
                    name="submit">Login</button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
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
  <script type="text/javascript">

    window.setTimeout(function () {
      $(".alert").fadeTo(700, 0).slideUp(700, function () {
        $(this).remove();
      });
    }, 3000);
  </script>
  <!-- endinject -->
</body>


<!-- Mirrored from www.urbanui.com/melody/template/pages/samples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Aug 2018 07:46:09 GMT -->

</html>