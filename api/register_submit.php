<?php
include '../includes/connection.php';
include '../function.php';
session_start();
$ref_id = $_POST['ref_id'];
$ref_name = $_POST['ref_name'];
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$sql = mysqli_query($conn, "SELECT * FROM users WHERE mobile='$mobile' or email='$email'");
$row_count = mysqli_num_rows($sql);
if ($row_count > 0) {
    echo '<script type="text/javascript">
alert("Mobile Number or Email ID is already Registered")
window.location.href = "../register.php"
</script>';
} else {

    repeat:
    $six_digit_random_number = random_int(100000, 999999);
    $sql_find = mysqli_query($conn, "SELECT * FROM users where user_id='$six_digit_random_number'");
    $num_find = mysqli_num_rows($sql_find);
    if ($num_find > 0) {
        goto repeat;
    }

    $sql_ref = mysqli_query($conn, "SELECT * FROM users where user_id='$ref_id'");
    $ref_row = mysqli_fetch_assoc($sql_ref);
    $ref_level = $ref_row['level'];
    $level = $ref_level + 1;
    $ref_2 = $ref_row['ref_id'];
    $ref_3 = $ref_row['ref2'];
    $ref_4 = $ref_row['ref3'];
    $ref_5 = $ref_row['ref4'];



    date_default_timezone_set('Asia/Kolkata');
    $timestamp = date("Y-m-d H:i:s");

    $sql = mysqli_query($conn, "INSERT into users(user_id,ref_id,ref_name,name,mobile,email,password,level,ref2,ref3,ref4,ref5,creation_date) VALUES('$six_digit_random_number','$ref_id','$ref_name','$name','$mobile','$email','$password','$level','$ref_2','$ref_3','$ref_4','$ref_5','$timestamp') ");



    $_SESSION['login_id'] = $six_digit_random_number;
    $_SESSION['password'] = $password;


    $to = "$email";
    $subject = "Welcome to CloudMiners";

    $message = "
<html>
<head>
<title>Welcome to CloudMiners</title>
</head>
<body>

<p>Dear $name,</p> 
<h1>
UserID : $six_digit_random_number
<br>
Password : $password
</h1>
<p> We are thrilled to welcome you to our website! Thank you for creating an account and joining our community.
As a registered user, you will have access to a variety of features and benefits that will enhance your experience on our website.
please click on the following link: https://cloudminers.online/login.php to login to your account.
You can now easily browse our products/services, make purchases, and interact with other members of our community.
Thank you once again for joining us. We look forward to serving you and providing you with the best possible online experience. </p>
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
      alert("Congratulations Your Registration is Completed")
      window.location.href = "../login2.php"
      </script>';
}
