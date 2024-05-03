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
$user_id = $_POST['user_id'];
$bank_name = $_POST['bank_name'];
$account_holder_name = $_POST['account_holder_name'];
$ifsc = $_POST['ifsc'];
$branch_name = $_POST['branch_name'];
$usdt = $_POST['usdt'];
$account_number = $_POST['account_number'];
date_default_timezone_set('Asia/Kolkata');
$timestamp = date("Y-m-d H:i:s");
$sql = mysqli_query($conn, "SELECT * FROM bank where account_number='$account_number'");
$num_rows = mysqli_num_rows($sql);
if ($num_rows == 0) {

    $sql_insert = mysqli_query($conn, "INSERT into bank(user_id,bank_name,account_holder_name,account_number,ifsc,branch_name,usdt,creation_date) VALUES('$user_id','$bank_name','$account_holder_name','$account_number','$ifsc','$branch_name','$usdt','$timestamp')");
    echo '<script type="text/javascript">
    alert("Bank Details Updated Successfully")
    window.location.href = "bank_details.php"
    </script>';
}
else
{
    echo '<script type="text/javascript">
    alert("Account Number is already registered")
    window.location.href = "bank_details.php"
    </script>';
}
