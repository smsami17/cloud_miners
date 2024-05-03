<?php 

include '../includes/connection.php';
include '../function.php';
session_start();
$user_id=$_POST['user_id'];
$password=$_POST['password'];

$sql=mysqli_query($conn,"SELECT * FROM users where user_id='$user_id' and password='$password'");
$num_rows=mysqli_num_rows($sql);
if($num_rows==0)
{
     echo '<script type="text/javascript">
     alert("User Id or Password is wrong!")
     window.location.href = "../login.php"
     </script>';
}
else
{
    echo '<script type="text/javascript">
    alert("Login Successfully!")
    window.location.href = "../user_panel/dashboard.php"
    </script>';
    $_SESSION['user_id']=$user_id;
}