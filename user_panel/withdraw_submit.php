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

unset($_SESSION['current_income']);
$amount=$_POST['amount'];
$type=$_POST['type'];
if($type=='INR')
{
    $actual_amount=$amount;
}
else
{
    $usd_rate=$_SESSION['usd_rate'];
    $actual_amount=$amount;
    $amount=($actual_amount*$usd_rate);
   
}
$tax=($actual_amount*7)/100;
$nett_amount=$actual_amount-$tax;
$sql_update=mysqli_query($conn,"UPDATE fund_wallet SET amount=amount-'$amount' where user_id='$user_id'  ");
date_default_timezone_set('Asia/Kolkata');
$timestamp = date("Y-m-d H:i:s");
$sql_insert=mysqli_query($conn,"INSERT into payout(user_id,amount,type,actual_amount,nett_amount,tax,creation_date) VALUES('$user_id','$amount','$type','$actual_amount','$nett_amount','$tax','$timestamp')");
 echo '<script type="text/javascript">
 alert("Payout request has been created successfully")
 window.location.href = "./payout.php"
 </script>';