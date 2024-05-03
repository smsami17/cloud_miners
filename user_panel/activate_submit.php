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
$amount=$_POST['amount'];
$activation_id=$_POST['user_id'];
$type=$_POST['type'];
$sql=mysqli_query($conn,"INSERT into activation_request(buyer_id,user_id,amount,type) VALUES('$user_id','$activation_id','$amount','$type')");
date_default_timezone_set('Asia/Kolkata');
$timestamp = date("Y-m-d H:i:s");
$activation_date= date('Y-m-d H:i:s');
if ($amount < 10000) {
  $percent = 3;
} else {
  $percent = 4;
}
$fund = ($amount * $percent) / 100;
$sql=mysqli_query($conn,"UPDATE users SET activation_status=1,activation_date='$activation_date',if_activation_date='$activation_date',activation_amount='$amount',daily_income='$fund' where user_id='$activation_id'");
$sql=mysqli_query($conn,"INSERT into daily_mining_bonus_list(user_id,amount,creation_date,daily_income) values('$activation_id','$amount','$timestamp','$fund')");

$sql_update=mysqli_query($conn,"UPDATE fund_wallet set amount=amount-'$amount' where user_id='$user_id'");
echo '<script type="text/javascript">
alert("ID Activated Successfully!")
window.location.href = "activate.php"
</script>';