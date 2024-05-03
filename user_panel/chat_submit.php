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
$message=$_POST['message'];
date_default_timezone_set('Asia/Kolkata');
$timestamp = date("Y-m-d H:i:s");
$sql=mysqli_query($conn,"INSERT into chat(user_id,message,creation_date) VALUES('$user_id','$message','$timestamp')");

echo '<script type="text/javascript">
alert("Your message has been sent to admin Successfully!")
window.location.href = "chat.php"
</script>';