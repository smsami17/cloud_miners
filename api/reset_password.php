<?php 
include '../includes/connection.php';
include '../function.php';
session_start();
$user_id=$_POST['user_id'];
$password=$_POST['password'];
$sql_update=mysqli_query($conn,"UPDATE users SET password='$password' where user_id='$user_id'");
echo '<script type="text/javascript">
alert("Password Changed Successfully!")
window.location.href = "../login.php"
</script>';