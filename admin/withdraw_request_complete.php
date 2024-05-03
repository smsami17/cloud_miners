<?php 

session_start();
if (empty($_SESSION['admin'])) { //if not yet logged in
  header("Location: index.php"); // send to login page
  exit;

}

include '../includes/connection.php';
include '../function.php';
$id=$_GET['id'];
$user_id=$_GET['user_id'];
$amount=$_GET['amount'];
$sql=mysqli_query($conn,"UPDATE payout set status=1 where id='$id'");

 echo '<script type="text/javascript">
 alert("Status Updated Successfully")
 window.location.href = "payout.php"
 </script>';