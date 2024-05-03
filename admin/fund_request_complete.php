<?php

session_start();
if (empty($_SESSION['admin'])) { //if not yet logged in
  header("Location: index.php"); // send to login page
  exit;
}

include '../includes/connection.php';
include '../function.php';
$id = $_GET['id'];
$user_id = $_GET['user_id'];
$amount = $_GET['amount'];
$sql = mysqli_query($conn, "UPDATE fund_request set status=1 where fund_id='$id'");
$sql_wallet = mysqli_query($conn, "SELECT * FROM fund_wallet where user_id='$user_id'");
$num_row = mysqli_num_rows($sql_wallet);
if ($num_row == 0) {
  date_default_timezone_set('Asia/Kolkata');
  $timestamp = date("Y-m-d H:i:s");
  $sql_insert = mysqli_query($conn, "INSERT into fund_wallet(user_id,amount,creation_date) VALUES('$user_id','$amount','$timestamp')");
} else {
  $row_wallet = mysqli_fetch_assoc($sql_wallet);
  $wallet_amount = $row_wallet['amount'];
  $amount = $wallet_amount + $amount;
  $sql_update = mysqli_query($conn, "UPDATE fund_wallet set amount='$amount' where user_id='$user_id'");
}

echo '<script type="text/javascript">
 alert("Status Updated Successfully")
 window.location.href = "dashboard.php"
 </script>';
