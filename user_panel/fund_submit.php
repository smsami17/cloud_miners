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
$type = $_POST['type'];
$utr = $_POST['utr'];
$num_utr = 0;
if ($type == 'INR') {
    $amount = $_POST['inramount'];
    $actual_amount = $_POST['inramount'];
    $sql_utr = mysqli_query($conn, "SELECT UTR from fund_request where UTR='$utr'");
    $num_utr = mysqli_num_rows($sql_utr);
    if ($num_utr > 0) {

        echo '<script type="text/javascript">
 alert("Fund request with this UTR No. is already exist!")
 window.location.href = "funds.php"
 </script>';
    }
} else {
    $amount = $_POST['usdamount'];
    $actual_amount = $_POST['usdamount'] / usd_rate();
    $actual_amount = number_format((float)$actual_amount, 2, '.', '');
}
if ($num_utr == 0) {
    date_default_timezone_set('Asia/Kolkata');
    $timestamp = date("Y-m-d H:i:s");
    $sql = mysqli_query($conn, "INSERT into fund_request(user_id,type,amount,UTR,actual_amount,creation_date) VALUES('$user_id','$type','$amount','$utr','$actual_amount','$timestamp')");
}



echo '<script type="text/javascript">
 alert("Fund request has been sent to admin!")
 window.location.href = "funds.php"
 </script>';
