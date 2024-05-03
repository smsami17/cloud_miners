<?php

$conn = mysqli_connect("localhost", "u995118231_cloudminers", "Samimohd23$#", "u995118231_cloudminers");

if (mysqli_connect_errno()) {
    // Throw error message based on ajax or not
    echo "Failed to connect to MySQL! Please contact the admin.";
    return;
}
date_default_timezone_set('Asia/Kolkata');
$timestamp = date("Y-m-d H:i:s");


$sql_delete = mysqli_query($conn, "SELECT * from daily_mining_bonus_list where day=5 ");
$num_row = mysqli_num_rows($sql_delete);
if ($num_row == 0) {
} else {
    while ($row_delete = mysqli_fetch_assoc($sql_delete)) {
        $user_id = $row_delete['user_id'];
        $sql_update_user = mysqli_query($conn, "UPDATE users set activation_status=0,activation_date=null,daily_income=0,activation_amount=0 where user_id='$user_id'");
        $sql_trans = mysqli_query($conn, "SELECT * FROM fund_wallet where user_id='$user_id'");
        $num_trans = mysqli_num_rows($sql_trans);
        $activation_amount = $row_delete['amount'];
        $sql = mysqli_query($conn, "SELECT amount FROM wallet where user_id='$user_id' and creation_date> now() - interval 4 day");
        $num_row = mysqli_num_rows($sql);
        if ($num_row == 0) {
            $total_income = 0;
        } else {
            $total_income = 0;
            while ($row = mysqli_fetch_assoc($sql)) {
                $total_income = $row['amount'] + $total_income;
            }
        }

        $total_amount = $activation_amount + $total_income;
        if ($num_trans == 0) {

            $sql_insert = mysqli_query($conn, "INSERT into fund_wallet(user_id,amount,creation_date) VALUES('$user_id','$total_amount','$timestamp')");
        } else {

            $sql_update_trans = mysqli_query($conn, "UPDATE fund_wallet SET amount = amount+'$total_amount'  where user_id='$user_id'");
        }
        $sql_delete2 = mysqli_query($conn, "DELETE from royalty_income_list where user_id='$user_id'");
    }
    $sql_delete = mysqli_query($conn, "DELETE from daily_mining_bonus_list where day=5 ");
}
