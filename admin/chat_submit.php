<?php 


include '../includes/connection.php';
include '../function.php';
$message=$_POST['message'];
$user_id = $_POST['user_id'];
date_default_timezone_set('Asia/Kolkata');
$timestamp = date("Y-m-d H:i:s");
$sql=mysqli_query($conn,"INSERT into chat(user_id,admin_message,creation_date) VALUES('$user_id','$message','$timestamp')");
 echo '<script type="text/javascript">
 alert("Your message has been sent to admin Successfully!")
 window.location.href = "chat.php"
 </script>';


// Output JavaScript with the PHP variable
// echo '<script type="text/javascript">';
// echo 'var myVariable = "' . $user_id . '";';
// echo 'window.location.href = "chat_details.php?user_id=" + myVariable;';
// echo '</script>';


// Output JavaScript with the PHP variable

?>

?>
