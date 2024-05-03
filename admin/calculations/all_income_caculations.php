<?php
$conn = mysqli_connect("localhost", "root", "", "cloud_miners");

if (mysqli_connect_errno()) {
    // Throw error message based on ajax or not
    echo "Failed to connect to MySQL! Please contact the admin.";
    return;
}
date_default_timezone_set('Asia/Kolkata');
$timestamp = date("Y-m-d H:i:s");

$sql_first_slab = mysqli_query($conn, "SELECT * from admin where 1");
$row_admin = mysqli_fetch_assoc($sql_first_slab);
$first_slab = $row_admin['first_slab'];
$second_slab = $row_admin['second_slab'];
$sql = mysqli_query($conn, "SELECT * FROM daily_mining_bonus_list   ");
while ($row = mysqli_fetch_assoc($sql)) {
    $user_id = $row['user_id'];
    $amount = $row['amount'];

    $fund = $row['daily_income'];
    $day = $row['day'];
    $day = $day + 1;
    $sql_insert = mysqli_query($conn, "INSERT into daily_mining_bonus(amount,user_id,day,creation_date) VALUES('$fund','$user_id','$day','$timestamp')");
    $sql_wallet = mysqli_query($conn, "INSERT into wallet(user_id,amount,type,creation_date) VALUES('$user_id','$fund','daily_income','$timestamp')");
    // level and direct income
    $sql_child = mysqli_query($conn, "SELECT * FROM users where (ref_id='$user_id' or ref2='$user_id' or ref3='$user_id' or ref4='$user_id' or ref5='$user_id') and activation_status=1 ");
    $num_child = mysqli_num_rows($sql_child);
    $direct_ans = 0;
    $ans = 0;
    $direct_investment = 0;
    $team_investment = 0;
    if ($num_child > 0) {

        while ($row_child = mysqli_fetch_assoc($sql_child)) {
            $amount = $row_child['daily_income'];
            if ($row_child['ref_id'] == $user_id) {

                $direct_investment = $direct_investment + $row_child['activation_amount'];
                $team_investment = $team_investment + $row_child['activation_amount'];
                $new_amount = ($amount * 20) / 100;
                $direct_ans = $new_amount + $direct_ans;
            } else if ($row_child['ref2'] == $user_id) {
                $team_investment = $team_investment + $row_child['activation_amount'];
                $new_amount = ($amount * 15) / 100;
                $ans = $new_amount + $ans;
            } else if ($row_child['ref3'] == $user_id) {
                $team_investment = $team_investment + $row_child['activation_amount'];
                $new_amount = ($amount * 10) / 100;
                $ans = $new_amount + $ans;
            } else if ($row_child['ref4'] == $user_id) {
                $team_investment = $team_investment + $row_child['activation_amount'];
                $new_amount = ($amount * 5) / 100;
                $ans = $new_amount + $ans;
            } else if ($row_child['ref5'] == $user_id) {
                $team_investment = $team_investment + $row_child['activation_amount'];
                $new_amount = ($amount * 3) / 100;
                $ans = $new_amount + $ans;
            }
        }
        if ($ans > 0) {
            $sql_insert = mysqli_query($conn, "INSERT into level_income(amount,user_id,creation_date) VALUES('$ans','$user_id','$timestamp')");
            $sql_wallet = mysqli_query($conn, "INSERT into wallet(user_id,amount,type,creation_date) VALUES('$user_id','$ans','level_income','$timestamp')");
        }
        if ($direct_ans > 0) {
            $sql_insert = mysqli_query($conn, "INSERT into direct_income(amount,user_id,creation_date) VALUES('$direct_ans','$user_id','$timestamp')");
            $sql_wallet = mysqli_query($conn, "INSERT into wallet(user_id,amount,type,creation_date) VALUES('$user_id','$direct_ans','direct_income','$timestamp')");
        }
    
        //Royalty Income
        $sql_is_royalty = mysqli_query($conn, "SELECT user_id FROM royalty_income_list where user_id='$user_id' ");
        $num_is_royalty = mysqli_num_rows($sql_is_royalty);

        if ($direct_investment > 20000 && $team_investment > 50000) {
            //second slab
            if ($num_is_royalty == 0) {
                $sql_insert = mysqli_query($conn, "INSERT into royalty_income_list(type,team_amount,user_id,creation_date) Values('Second_slab','$team_investment','$user_id','$timestamp')");
            } else {
                $sql_update = mysqli_query($conn, "UPDATE royalty_income_list set type='Second_slab',team_amount='$team_investment' where user_id='$user_id'");
            }
            $sql_amount = mysqli_query($conn, "INSERT into royalty_income(amount,user_id,creation_date) VALUES('$second_slab','$user_id','$timestamp') ");
            $sql_wallet = mysqli_query($conn, "INSERT into wallet(user_id,amount,type,creation_date) VALUES('$user_id','$second_slab','royalty_income','$timestamp')");
        } else if ($direct_investment > 10000 && $team_investment > 25000) {
            //first slab
            if ($num_is_royalty == 0) {
                $sql_insert = mysqli_query($conn, "INSERT into royalty_income_list(type,team_amount,user_id,creation_date) Values('First_slab','$team_investment','$user_id','$timestamp')");
            } else {
                $sql_update = mysqli_query($conn, "UPDATE royalty_income_list set type='First_slab',team_amount='$team_investment' where user_id='$user_id'");
            }
            $sql_amount = mysqli_query($conn, "INSERT into royalty_income(amount,user_id,creation_date) VALUES('$first_slab','$user_id','$timestamp') ");
            $sql_wallet = mysqli_query($conn, "INSERT into wallet(user_id,amount,type,creation_date) VALUES('$user_id','$first_slab','royalty_income','$timestamp')");
        } else {
            if ($num_is_royalty == 1) {
                $sql_delete = mysqli_query($conn, "DELETE from royalty_income_list where user_id='$user_id'");
            }
        }
    }
}
$sql_update = mysqli_query($conn, "UPDATE daily_mining_bonus_list set day=day+1 where 1");
