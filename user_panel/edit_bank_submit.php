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


$usdt = $_POST['usdt'];


    $sql_insert = mysqli_query($conn, "UPDATE bank SET usdt='$usdt'  WHERE user_id='$user_id' ");
    

    echo '<script type="text/javascript">
    alert("USDT Added Successfully")
    window.location.href = "bank_details.php"
    </script>';

