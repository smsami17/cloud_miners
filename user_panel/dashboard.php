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
              Dashboard
            </h3>
          </div>
          <div class="row ">


            <h5 class="marquee-container"><?php echo content(); ?></h5>
            <div class="col-md-4">
              <div class="card">
                <img src="../assets/img/congrats.png" width="100%" alt="">
                <div class="card-body">
                  <div class="text-center">
                    <img src="../assets//img/UserProfile_Pic.jpg" style="border-radius: 50%;margin-bottom:10px;margin-top:-75px;height:150px;width:150px" alt="" srcset="">
                  </div>
                  <h3 class="text-center "><?php echo user_name($user_id) ?></h3>
                  <h4 class="text-center mb-3">CM-<?php echo $user_id ?></h4>
                  <p class="text-center">Registration Date : <?php







                                                              $timestamp = user_creation_date($user_id);

                                                              $datetime = explode(" ", $timestamp);

                                                              $date = $datetime[0];

                                                              $time = $datetime[1];







                                                              $reformatted_date = date('d-m-Y', strtotime($date));



                                                              echo $reformatted_date;





                                                              ?></p>
                  <p class="text-center">Activation Date : <?php






                                                            if (activation_staus($user_id) == 1) {
                                                              $timestamp = user_creation_date($user_id);

                                                              $datetime = explode(" ", $timestamp);

                                                              $date = $datetime[0];

                                                              $time = $datetime[1];







                                                              $reformatted_date = date('d-m-Y', strtotime($date));



                                                              echo $reformatted_date;
                                                            }





                                                            ?></p>


                </div>
              </div>

            </div>

            <div class="col-md-4" style="height: 100px;">
              <div class="row p-0">
                <div class="col-6 p-0">
                  <a href="funds.php">
                    <div class="card" style="background-color: rgb(253,151,1);border-top-right-radius:0px;border-bottom-right-radius:0px">

                      <div class="card-body ">
                        <div class="text-center"><i class="fa-solid fa-sack-dollar fa-2x"></i></div>

                        <h5 class="text-center">Add Funds
                        </h5>


                      </div>
                    </div>
                  </a>
                </div>

                <div class="col-6 p-0">
                  <a href="./activate.php">
                    <div class="card" style="background-color:  #00ff43;border-top-left-radius:0px;border-bottom-left-radius:0px">

                      <div class="card-body ">
                        <div class="text-center"><i class="fa-solid fa-unlock fa-2x"></i></div>

                        <h5 class="text-center">Activate ID
                        </h5>


                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
            <style>
              .slider-container {
                width: 95%;
                overflow: hidden;
                margin: 5px auto;
              }

              .slider {
                display: flex;
                transition: transform 0.5s ease-in-out;
              }

              .slide {
                min-width: 100%;
                box-sizing: border-box;
                border-radius: 5px;
              }

              .congrats {
                width: 80px;
                height: 80px;
              }

              @media (max-width:350px) {
                .congrats {
                  width: 70px;
                  height: 70px;
                }
              }

              @media (max-width:325px) {
                .congrats {
                  width: 60px;
                  height: 60px;
                }
              }

              @media (max-width:300px) {
                .congrats {
                  width: 50px;
                  height: 50px;
                }
              }

              th {
                text-align: center;
              }
            </style>
            <div class="col-md-4" style="padding-left:0px;padding-right:0px">
              <div class="card  " style="background-color:#00ff43;padding-left:0px;padding-right:0px;">

                <div class="card-body" style="height:100%;padding-left:0px;padding-right:0px;">
                  <h4 class="text-center mb-3"> <button class="btn btn-primary" style="border-radius: 15px;background-color:#0d6efd">Today's Top Ten Biggest Withdrawals</button> </h4>
                  <div class="slider-container">
                    <div class="slider">
                      <?php $i = 0;
                      $sql = mysqli_query($conn, "SELECT * FROM top_earners");
                      while ($row = mysqli_fetch_assoc($sql)) {
                        $i++;
                      ?>
                        <div class="slide" <?php if ($i % 2 == 1) { ?> style="background-color:rgb(253,151,1)" <?php } else {  ?> style="background-color: rgb(255,66,146);" <?php } ?>>
                          <div style="border-radius: 5px;">
                            <img src="../assets/img/congrats-1.gif" class="congrats" style="border-radius: 50%;margin-bottom:-100px;float:left" alt="">
                            <img src="../assets/img/congrats-1.gif" class="congrats" style="border-radius: 50%;margin-bottom:-100px;float:right" alt="">
                            <table class="table " style="color:white">
                              <tr>

                                <th style="font-size:larger">
                                  <?php echo $row['name']; ?>
                                </th>
                              </tr>
                              <tr>

                                <th style="font-size:larger">
                                  <?php echo $row['user_id']; ?>
                                </th>
                              </tr>
                              <tr>

                                <th style="font-size:larger">
                                  <i class="fa-solid fa-indian-rupee-sign">
                                    <?php echo $row['amount']; ?>
                                </th>
                              </tr>

                            </table>
                          </div>

                        </div>
                      <?php } ?>

                    </div>
                  </div>



                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card  " style="height: 100px;">

                <div class="card-body" style="height:100%">
                  <div class="row" style="height:100%">
                    <div class="col-3 " style="height:100%">
                      <img src="../assets/img/wallet.png" style="height:100%" alt="">
                    </div>
                    <div class="col-8 ">
                      <h5> Wallet Balance </h5>
                      <h3>
                        <i class="fa-solid fa-indian-rupee-sign"></i> <?php echo fund_wallet_balance($user_id); ?>
                      </h3>
                    </div>
                  </div>



                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card  " style="height: 100px;">

                <div class="card-body" style="height:100%">
                  <div class="row" style="height:100%">
                    <div class="col-3 " style="height:100%">
                      <img src="../assets/img/earning.png" style="height:100%" alt="">
                    </div>
                    <div class="col-8 ">
                      <h5> Current Investment </h5>
                      <h3>
                        <i class="fa-solid fa-indian-rupee-sign"></i> <?php echo current_investment($user_id); ?>
                      </h3>
                    </div>
                  </div>



                </div>
              </div>
            </div>
            <!-- <div class="col-md-4">
              <div class="card  " style="height: 100px;">

                <div class="card-body" style="height:100%">
                  <div class="row" style="height:100%">
                    <div class="col-3 " style="height:100%">
                      <img src="../assets/img/3d-lock.png" style="height:100%" alt="">
                    </div>
                    <div class="col-8 ">
                      <h5> Activation Status</h5>
                      <h3 c>
                        <?php
                        if (activation_staus($user_id) == 1) { ?>
                          <button class="btn btn-success">Activated</button>
                        <?php } else {
                        ?>
                          <button class="btn btn-danger">Pending</button>
                        <?php } ?>
                      </h3>
                    </div>
                  </div>



                </div>
              </div>
            </div> -->
            <div class="col-md-4">
              <div class="card  " style="height: 100px;">

                <div class="card-body" style="height:100%">
                  <div class="row" style="height:100%">
                    <div class="col-3 " style="height:100%">
                      <img src="../assets/img/cloud-storage.png" style="height:100%" alt="">
                    </div>
                    <div class="col-8 ">
                      <h5>Today's Mining Income </h5>
                      <h3>
                        <i class="fa-solid fa-indian-rupee-sign"></i> <?php echo today_mining_income($user_id) ?>
                      </h3>
                    </div>
                  </div>



                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card  " style="height: 100px;">

                <div class="card-body" style="height:100%">
                  <div class="row" style="height:100%">
                    <div class="col-3 " style="height:100%">
                      <img src="../assets/img/cloud-storage.png" style="height:100%" alt="">
                    </div>
                    <div class="col-8 ">
                      <h5>Total Mining Income </h5>
                      <h3>
                        <i class="fa-solid fa-indian-rupee-sign"></i> <?php echo total_mining_income($user_id) ?>
                      </h3>
                    </div>
                  </div>



                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card  " style="height: 100px;">

                <div class="card-body" style="height:100%">
                  <div class="row" style="height:100%">
                    <div class="col-3 " style="height:100%">
                      <img src="../assets/img/refer (1).png" style="height:100%" alt="">
                    </div>
                    <div class="col-8 ">
                      <h5>Today's Direct Income </h5>
                      <h3>
                        <i class="fa-solid fa-indian-rupee-sign"></i> <?php echo today_direct_income($user_id) ?>
                      </h3>
                    </div>
                  </div>



                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card  " style="height: 100px;">

                <div class="card-body" style="height:100%">
                  <div class="row" style="height:100%">
                    <div class="col-3 " style="height:100%">
                      <img src="../assets/img/refer (1).png" style="height:100%" alt="">
                    </div>
                    <div class="col-8 ">
                      <h5>Total Direct Income </h5>
                      <h3>
                        <i class="fa-solid fa-indian-rupee-sign"></i> <?php echo total_direct_income($user_id) ?>
                      </h3>
                    </div>
                  </div>



                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card  " style="height: 100px;">

                <div class="card-body" style="height:100%">
                  <div class="row" style="height:100%">
                    <div class="col-3 " style="height:100%">
                      <img src="../assets/img/networking.png" style="height:100%" alt="">
                    </div>
                    <div class="col-8 ">
                      <h5>Today's Level Income </h5>
                      <h3>
                        <i class="fa-solid fa-indian-rupee-sign"></i> <?php echo today_level_income($user_id) ?>
                      </h3>
                    </div>
                  </div>



                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card  " style="height: 100px;">

                <div class="card-body" style="height:100%">
                  <div class="row" style="height:100%">
                    <div class="col-3 " style="height:100%">
                      <img src="../assets/img/networking.png" style="height:100%" alt="">
                    </div>
                    <div class="col-8 ">
                      <h5>Total Level Income </h5>
                      <h3>
                        <i class="fa-solid fa-indian-rupee-sign"></i> <?php echo total_level_income($user_id) ?>
                      </h3>
                    </div>
                  </div>



                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card  " style="height: 100px;">

                <div class="card-body" style="height:100%">
                  <div class="row" style="height:100%">
                    <div class="col-3 " style="height:100%">
                      <img src="../assets/img/bank.png" style="height:100%" alt="">
                    </div>
                    <div class="col-8 ">
                      <h5>Total Deposit </h5>
                      <h3>
                        <i class="fa-solid fa-indian-rupee-sign"></i> <?php echo total_fund($user_id) ?>
                      </h3>
                    </div>
                  </div>



                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card  " style="height: 100px;">

                <div class="card-body" style="height:100%">
                  <div class="row" style="height:100%">
                    <div class="col-3 " style="height:100%">
                      <img src="../assets/img/atm.png" style="height:100%" alt="">
                    </div>
                    <div class="col-8 ">
                      <h5>Total withdraw </h5>
                      <h3>
                        <i class="fa-solid fa-indian-rupee-sign"></i> <?php echo total_withdraw($user_id) ?>
                      </h3>
                    </div>
                  </div>



                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card  " style="height: 100px;">

                <div class="card-body" style="height:100%">
                  <div class="row" style="height:100%">
                    <div class="col-3 " style="height:100%">
                      <img src="../assets/img/refer.png" style="height:100%" alt="">
                    </div>
                    <div class="col-8 ">
                      <h5>My Direct </h5>
                      <h3>
                        <?php echo total_direct($user_id) ?>
                      </h3>
                    </div>
                  </div>



                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card  " style="height: 100px;">

                <div class="card-body" style="height:100%;background-color:  #00ff43;">
                  <div class="row" style="height:100%">
                    <div class="col-3 " style="height:100%">
                      <img src="../assets/img/refer.png" style="height:100%" alt="">
                    </div>
                    <div class="col-8 ">
                      <h5>My Active Direct</h5>
                      <h3>
                        <?php echo total_active_direct($user_id) ?>
                      </h3>
                    </div>
                  </div>



                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card  " style="height: 100px;">

                <div class="card-body" style="height:100%;background-color: rgb(253,151,1)">
                  <div class="row" style="height:100%">
                    <div class="col-3 " style="height:100%">
                      <img src="../assets/img/refer.png" style="height:100%" alt="">
                    </div>
                    <div class="col-8 ">
                      <h5>My Incactive Direct</h5>
                      <h3>
                        <?php echo total_inactive_direct($user_id) ?>
                      </h3>
                    </div>
                  </div>



                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card  " style="height: 100px;">

                <div class="card-body" style="height:100%">
                  <div class="row" style="height:100%">
                    <div class="col-3 " style="height:100%">
                      <img src="../assets/img/teamwork.png" style="height:100%" alt="">
                    </div>
                    <div class="col-8 ">
                      <h5>My Team </h5>
                      <h3>
                        <?php echo total_team($user_id) ?>
                      </h3>
                    </div>
                  </div>



                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card  " style="height: 100px;">

                <div class="card-body" style="height:100%;background-color:  #00ff43;">
                  <div class="row" style="height:100%">
                    <div class="col-3 " style="height:100%">
                      <img src="../assets/img/teamwork.png" style="height:100%" alt="">
                    </div>
                    <div class="col-8 ">
                      <h5>My Active Team</h5>
                      <h3>
                        <?php echo total_active_team($user_id) ?>
                      </h3>
                    </div>
                  </div>



                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card  " style="height: 100px;">

                <div class="card-body" style="height:100%;background-color: rgb(253,151,1)">
                  <div class="row" style="height:100%">
                    <div class="col-3 " style="height:100%">
                      <img src="../assets/img/teamwork.png" style="height:100%" alt="">
                    </div>
                    <div class="col-8 ">
                      <h5>My Incactive Team</h5>
                      <h3>
                        <?php echo total_inactive_team($user_id) ?>
                      </h3>
                    </div>
                  </div>



                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card  " style="height: 100px;">

                <div class="card-body" style="height:100%">
                  <div class="row" style="height:100%">
                    <div class="col-3 " style="height:100%">
                      <img src="../assets/img/bank.png" style="height:100%" alt="">
                    </div>
                    <div class="col-8 ">
                      <h5>My Total Team Deposit</h5>
                      <h3>
                        <i class="fa-solid fa-indian-rupee-sign"></i> <?php echo total_team_current_investment($user_id) ?>
                      </h3>
                    </div>
                  </div>



                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card  " style="height: 100px;">

                <div class="card-body" style="height:100%">
                  <div class="row" style="height:100%">
                    <div class="col-3 " style="height:100%">
                      <img src="../assets/img/royalty.png" style="height:100%" alt="">
                    </div>
                    <div class="col-8 ">
                      <h5>Royalty Income</h5>
                      <h3>
                        <i class="fa-solid fa-indian-rupee-sign"></i> <?php echo  today_royalty_income($user_id) ?>
                      </h3>
                    </div>
                  </div>



                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card  " style="height: 100px;">

                <div class="card-body" style="height:100%">
                  <div class="row" style="height:100%">
                    <div class="col-3 " style="height:100%">
                      <img src="../assets/img/royalty.png" style="height:100%" alt="">
                    </div>
                    <div class="col-8 ">
                      <h5>Total Royalty Income</h5>
                      <h3>
                        <i class="fa-solid fa-indian-rupee-sign"></i> <?php echo  total_royalty_income($user_id); ?>
                      </h3>
                    </div>
                  </div>



                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card  " style="height: 100px;">

                <div class="card-body" style="height:100%">
                  <div class="row" style="height:100%">
                    <div class="col-3 " style="height:100%">
                      <img src="../assets/img/atm.png" style="height:100%" alt="">
                    </div>
                    <div class="col-8 ">
                      <h5>Withdraw Amount</h5>
                      <h3>
                        <a href="withdraw.php" class="btn btn-primary py-2">Withdraw</a>
                      </h3>
                    </div>
                  </div>



                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">

                <div class="card-body">
                  <img src="../assets/img/earn-money-by-referring-personal-loan-717x404.webp" width="100%" alt="">

                  <div class="d-flex justify-content-around mt-3">
                    <a class="btn btn-success" href="https://wa.me/?text=Join Cloud Miners Today and start earning now Click Here to Register https://cloudminers.online/register.php?ref_id=<?php echo $user_id;?>" target="_blank"><i class="fa-brands fa-whatsapp"></i> Whatsapp</a>
                    <a class="btn" target="_blank" href="https://t.me/share/url?url=https://cloudminers.online/register.php?ref_id=<?php echo $user_id; ?>&text=Join Cloud Miners Today and start earning now" style="background-color: rgb(0,116,217);color:white"><i class="fa-brands fa-telegram"></i> Telegram</a>

                  </div>
                </div>
              </div>

            </div>





          </div>

          <!-- <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">


                  </h4>

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
  <div class="modal fade" id="onload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content" style="background-color: rgb(255,66,146);color:white">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Contract Period Completed</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color:white">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div>
            <h5>You have Completed 5 days of your
              Contract period of your investment
            </h5>
          </div>
          <div class="d-flex justify-content-between">
            <h5>Your Total Profit : <i class="fa-solid fa-indian-rupee-sign"></i> <?php echo last_activation_amount_profit($user_id) ?></h5>

          </div>
          <div class="d-flex justify-content-between">
            <h5>Your Total Amount : <i class="fa-solid fa-indian-rupee-sign"></i> <?php echo (last_activation_amount_profit($user_id) + last_activation_amount($user_id)) ?></h5>

          </div>
          <div>
            <h5>You can retoup or withdrawal also</h5>
          </div>
        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          <a href="./activate.php" class="btn btn-success">Re Top-up</a>
        </div>
      </div>
    </div>
  </div>

  <!-- plugins:js -->
  <?php
  if (if_activation_date($user_id) != null&&activation_staus($user_id)==0) {
  ?>
    <script type="text/javascript">
      window.onload = () => {
        $('#onload').modal('show');
      }
    </script>
  <?php  } ?>

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
    let currentIndex = 0;
    const totalSlides = 10;
    const intervalTime = 3000; // 3000 milliseconds (3 seconds)

    function showSlide(index) {
      const slider = document.querySelector('.slider');
      slider.style.transform = `translateX(${-index * 100}%)`;
    }

    function nextSlide() {
      currentIndex = (currentIndex + 1) % totalSlides;
      showSlide(currentIndex);
    }

    setInterval(nextSlide, intervalTime);
  </script>
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