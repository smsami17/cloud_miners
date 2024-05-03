<?php
session_start();
if (empty($_SESSION['admin'])) { //if not yet logged in
  header("Location: index.php"); // send to login page
  exit;
}

include '../includes/connection.php';
include '../function.php';
$id = $_GET['id'];

$sql = mysqli_query($conn, "UPDATE fund_request set status=2 where fund_id='$id'");
echo '<script type="text/javascript">
 alert("Request Deleted Successfully")
 window.location.href = "dashboard.php"
 </script>';