<?php

include '../includes/connection.php';
include '../function.php';
session_start();
$email = $_POST['email'];
$sql = mysqli_query($conn, "SELECT * from users where email='$email'");
$num_rows = mysqli_num_rows($sql);
if ($num_rows == 0) {
    echo '<script type="text/javascript">
     alert("Email is wrong!")
     window.location.href = "../forget.php"
     </script>';
} else {
    $row = mysqli_fetch_assoc($sql);
    $name = $row['name'];
    $user_id = $row['user_id'];
    $to = "$email";
    $subject = "Forgot Password";

    $message = "
<html>
<head>
<title>Forgot Password</title>
</head>
<body>

<p>Dear $name,</p> 

<p> We’re writing to request a password reset for your account associated with this email address. Unfortunately, it seems that you have forgotten your password and are unable to log in.
In order to reset your password, please click on the following link: https://cloudminers.online/reset_password.php?id=" . $user_id . ". This link will take you to a page where you can securely reset your password.
If you have any trouble resetting your password using this link, or if you did not initiate this request, please reply to this email immediately so we can assist you.
Thank you for your prompt attention to this matter. We look forward to hearing back from you soon. </p>
<p>Best regards,</p> 
<p>Team Cloud Miners</p>
</body>
</html>
";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <no-reply@cloudminers.online>' . "\r\n";


    mail($to, $subject, $message, $headers);
    echo '<script type="text/javascript">
    alert("Reset Password link has been sent to your email Successfully!")
    window.location.href = "../forget.php"
    </script>';
}
