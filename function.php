<?php
function user_name($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT name FROM users where user_id='$user_id'");
    $row = mysqli_fetch_assoc($sql);
    return $row['name'];
}
function user_level($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT level FROM users where user_id='$user_id'");
    $row = mysqli_fetch_assoc($sql);
    return $row['level'];
}
function activation_staus($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT activation_status FROM users where user_id='$user_id'");
    $row = mysqli_fetch_assoc($sql);
    return $row['activation_status'];
}
function ref_id($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT ref_id FROM users where user_id='$user_id'");
    $row = mysqli_fetch_assoc($sql);
    return $row['ref_id'];
}
function ref2($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT ref2 FROM users where user_id='$user_id'");
    $row = mysqli_fetch_assoc($sql);
    return $row['ref2'];
}
function ref3($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT ref3 FROM users where user_id='$user_id'");
    $row = mysqli_fetch_assoc($sql);
    return $row['ref3'];
}
function ref4($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT ref4 FROM users where user_id='$user_id'");
    $row = mysqli_fetch_assoc($sql);
    return $row['ref4'];
}
function ref5($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT ref5 FROM users where user_id='$user_id'");
    $row = mysqli_fetch_assoc($sql);
    return $row['ref5'];
}
function fund($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT amount FROM daily_mining_bonus_list where user_id='$user_id'");

    $row = mysqli_fetch_assoc($sql);
    $amount = $row['amount'];
    if ($amount <= 5000) {
        $percent = 3;
    } else {
        $percent = 4;
    }
    $ans = ($amount * $percent) / 100;
    return $ans;
}
function day($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT day FROM daily_mining_bonus_list where user_id='$user_id'");
    $row = mysqli_fetch_assoc($sql);
    return $row['day'];
}
function daily_income($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT amount FROM daily_mining_bonus where user_id='$user_id' and creation_date> now() - interval 1 day order by creation_date DESC limit 1 ");
    $num_row = mysqli_num_rows($sql);
    if ($num_row == 0) {
        return 0;
    }
    $row = mysqli_fetch_assoc($sql);
    return $row['amount'];
}
function fund_wallet_balance($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT amount FROM fund_wallet where user_id='$user_id'");
    $num_row = mysqli_num_rows($sql);
    if ($num_row == 0) {
        return 0;
    } else {
        $row = mysqli_fetch_assoc($sql);
    }
    return $row['amount'];
}
function daily_income_eligible($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT user_id FROM daily_mining_bonus_list where user_id='$user_id'");
    $num_row = mysqli_num_rows($sql);
    return $num_row;
}
function level_income_eligible($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT ref_id FROM users where ref_id='$user_id'");
    $num_row = mysqli_num_rows($sql);
    return $num_row;
}
function total_daily_income($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT amount FROM daily_mining_bonus where user_id='$user_id'");
    $num_row = mysqli_num_rows($sql);
    if ($num_row == 0) {
        return $num_row;
    } else {
        $amount = 0;
        while ($row = mysqli_fetch_assoc($sql)) {
            $amount = $row['amount'] + $amount;
        }
        return $amount;
    }
}
function total_level_income($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT amount FROM level_income where user_id='$user_id'");
    $num_row = mysqli_num_rows($sql);
    if ($num_row == 0) {
        return $num_row;
    } else {
        $amount = 0;
        while ($row = mysqli_fetch_assoc($sql)) {
            $amount = $row['amount'] + $amount;
        }
        return $amount;
    }
}
function total_income($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT amount FROM wallet where user_id='$user_id'");
    $amount = 0;
    while ($row = mysqli_fetch_assoc($sql)) {
        $amount = $amount + $row['amount'];
    }
    return $amount;
}
function withdraw($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT withdraw FROM transaction where user_id='$user_id'");
    $num_row = mysqli_num_rows($sql);
    if ($num_row == 0) {
        return 0;
    } else {
        $row = mysqli_fetch_assoc($sql);
        return $row['withdraw'];
    }
}
function bank_details($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT * FROM bank where user_id='$user_id'");
    $num_row = mysqli_num_rows($sql);
    return $num_row;
}
function total_income_trans($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT total_amount FROM transaction where user_id='$user_id'");
    $num_row = mysqli_num_rows($sql);
    if ($num_row == 0) {
        return 0;
    } else {
        $row = mysqli_fetch_assoc($sql);
        return $row['total_amount'];
    }
}
function current_income_trans($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT amount FROM transaction where user_id='$user_id'");
    $num_row = mysqli_num_rows($sql);
    if ($num_row == 0) {
        return 0;
    } else {
        $row = mysqli_fetch_assoc($sql);
        return $row['amount'];
    }
}
function last_5_day_income($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT amount FROM wallet where user_id='$user_id' and creation_date> now() - interval 4 day");
    $amount = 0;
    $num_row = mysqli_num_rows($sql);
    if ($num_row == 0) {
        return 0;
    } else {
        $amount = 0;
        while ($row = mysqli_fetch_assoc($sql)) {
            $amount = $row['amount'] + $amount;
        }
        return  $amount;
    }
}
function account_holder_name($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT account_holder_name FROM bank where user_id='$user_id'");
    $row = mysqli_fetch_assoc($sql);
    return $row['account_holder_name'];
}
function usdt($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT usdt FROM bank where user_id='$user_id'");
    $row = mysqli_fetch_assoc($sql);
    return $row['usdt'];
}
function USD_price($amount)
{
    $req_url = 'https://api.exchangerate-api.com/v4/latest/USD';
    $response_json = file_get_contents($req_url);

    // Continuing if we got a result
    if (false !== $response_json) {

        // Try/catch for json_decode operation
        try {

            // Decoding
            $response_object = json_decode($response_json);

            // YOUR APPLICATION CODE HERE, e.g.
            $base_price = $amount; // Your price in USD
            $INR_price = round(($base_price * $response_object->rates->INR), 2);
        } catch (Exception $e) {
            // Handle JSON parse error...
        }
    }
    return $INR_price;
}
function usd_rate()
{
    $req_url = 'https://api.exchangerate-api.com/v4/latest/USD';
    $response_json = file_get_contents($req_url);

    // Continuing if we got a result
    if (false !== $response_json) {

        // Try/catch for json_decode operation
        try {

            // Decoding
            $response_object = json_decode($response_json);

            // YOUR APPLICATION CODE HERE, e.g.
            $base_price = 1; // Your price in USD
            $INR_price = round(($base_price * $response_object->rates->INR), 2);
        } catch (Exception $e) {
            // Handle JSON parse error...
        }
    }
    return $INR_price;
}
function user_creation_date($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT creation_date FROM users where user_id='$user_id'");
    $row = mysqli_fetch_assoc($sql);
    return $row['creation_date'];
}
function current_investment($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT amount from daily_mining_bonus_list  where user_id='$user_id'");
    $num_row = mysqli_num_rows($sql);
    if ($num_row == 0) {
        return 0;
    } else {
        $row = mysqli_fetch_assoc($sql);
        return $row['amount'];
    }
}
function total_fund($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT * from fund_request  where user_id='$user_id' and status=1");
    $num_row = mysqli_num_rows($sql);
    if ($num_row == 0) {
        return 0;
    } else {
        $amount = 0;
        while ($row = mysqli_fetch_assoc($sql)) {
            $amount = $amount + $row['amount'];
        }
    }
    return $amount;
}
function total_withdraw($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT * from payout  where user_id='$user_id' and status=1");
    $num_row = mysqli_num_rows($sql);
    if ($num_row == 0) {
        return 0;
    } else {
        $amount = 0;
        while ($row = mysqli_fetch_assoc($sql)) {
            $amount = $amount + $row['amount'];
        }
    }
    return $amount;
}
function total_direct($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT ref_id from users  where ref_id='$user_id' ");
    $num_row = mysqli_num_rows($sql);
    return $num_row;
}
function total_active_direct($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT ref_id from users  where ref_id='$user_id' and activation_status=1 ");
    $num_row = mysqli_num_rows($sql);
    return $num_row;
}
function total_inactive_direct($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT ref_id from users  where ref_id='$user_id' and activation_status=0 ");
    $num_row = mysqli_num_rows($sql);
    return $num_row;
}
function total_team($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT ref_id from users  where ref_id='$user_id' or ref2='$user_id' or ref3='$user_id' or ref4='$user_id' or ref5='$user_id' ");
    $num_row = mysqli_num_rows($sql);
    return $num_row;
}
function total_active_team($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT ref_id from users  where (ref_id='$user_id' or ref2='$user_id' or ref3='$user_id' or ref4='$user_id' or ref5='$user_id') and activation_status=1 ");
    $num_row = mysqli_num_rows($sql);
    return $num_row;
}
function total_inactive_team($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT ref_id from users  where (ref_id='$user_id' or ref2='$user_id' or ref3='$user_id' or ref4='$user_id' or ref5='$user_id') and activation_status=0 ");
    $num_row = mysqli_num_rows($sql);
    return $num_row;
}
function total_team_deposit($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT ref_id from users  where ref_id='$user_id' or ref2='$user_id' or ref3='$user_id' or ref4='$user_id' or ref5='$user_id' and activation_status=1 ");
    $num_row = mysqli_num_rows($sql);
    if ($num_row == 0) {
        return 0;
    } else {
        $amount = 0;
        while ($row = mysqli_fetch_assoc($sql)) {
            $amount = $amount + current_investment($row['user_id']);
        }
        return $amount;
    }
}
function today_mining_income($user_id)
{
    include 'includes/connection.php';
    date_default_timezone_set('Asia/Kolkata');
    $currentTimestamp = time();
    $previousTimestamp = strtotime('-24 hours', $currentTimestamp);
    $previousDateTime = date("Y-m-d H:i:s", $previousTimestamp);
    $sql = mysqli_query($conn, "SELECT * from daily_mining_bonus  where user_id='$user_id' and creation_date> '$previousDateTime' ");
    $num_row = mysqli_num_rows($sql);
    if ($num_row == 0) {
        return 0;
    } else {
        $row = mysqli_fetch_assoc($sql);
        return $row['amount'];
    }
}
function total_mining_income($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT * from daily_mining_bonus  where user_id='$user_id'  ");
    $num_row = mysqli_num_rows($sql);
    if ($num_row == 0) {
        return 0;
    } else {
        $amount = 0;
        while ($row = mysqli_fetch_assoc($sql)) {
            $amount = $amount + $row['amount'];
        }
        return $amount;
    }
}
function content()
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT content from admin   ");
    $row = mysqli_fetch_assoc($sql);
    return $row['content'];
}
function total_team_current_investment($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT activation_amount from users  where ref_id='$user_id' or ref2='$user_id' or ref3='$user_id' or ref4='$user_id' or ref5='$user_id' ");

    $num_row = mysqli_num_rows($sql);
    if ($num_row == 0) {
        return $num_row;
    } else {
        $amount = 0;
        while ($row = mysqli_fetch_assoc($sql)) {
            $amount = $amount + $row['activation_amount'];
        }
        return $amount;
    }
}
function user_activation_date($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT activation_date FROM users where user_id='$user_id'");
    $row = mysqli_fetch_assoc($sql);
    return $row['activation_date'];
}
function is_royalty_income($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT user_id FROM royalty_income_list where user_id='$user_id' ");
    $num_row = mysqli_num_rows($sql);
    return $num_row;
}
function first_slab_income()
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT first_slab from admin   ");
    $row = mysqli_fetch_assoc($sql);
    return $row['first_slab'];
}
function second_slab_income()
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT second_slab from admin   ");
    $row = mysqli_fetch_assoc($sql);
    return $row['second_slab'];
}
function total_royalty_income($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT amount FROM royalty_income where user_id='$user_id'  ");
    $num_row = mysqli_num_rows($sql);
    if ($num_row == 0) {
        return $num_row;
    } else {
        $amount = 0;
        while ($row = mysqli_fetch_assoc($sql)) {
            $amount = $amount + $row['amount'];
        }
        return $amount;
    }
}
function today_royalty_income($user_id)
{
    include 'includes/connection.php';
    date_default_timezone_set('Asia/Kolkata');
    $currentTimestamp = time();
    $previousTimestamp = strtotime('-24 hours', $currentTimestamp);
    $previousDateTime = date("Y-m-d H:i:s", $previousTimestamp);
    $sql = mysqli_query($conn, "SELECT amount FROM royalty_income where user_id='$user_id' and creation_date> '$previousDateTime' ");
    $num_row = mysqli_num_rows($sql);
    if ($num_row == 0) {
        return $num_row;
    } else {
        $amount = 0;
        while ($row = mysqli_fetch_assoc($sql)) {
            $amount = $amount + $row['amount'];
        }
        return $amount;
    }
}
function last_5_day_income_new($user_id, $timestamp)
{
    include 'includes/connection.php';
    $date = user_activation_date($user_id);
    $sql = mysqli_query($conn, "SELECT amount FROM wallet where user_id='$user_id' and (creation_date BETWEEN '$date' and '$timestamp' )  ");
    $amount = 0;
    $num_row = mysqli_num_rows($sql);
    if ($num_row == 0) {
        return 0;
    } else {
        echo $num_row;

        while ($row = mysqli_fetch_assoc($sql)) {
            $amount = $row['amount'] + $amount;
        }
        return  $amount;
    }
}
function activation_amount($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT activation_amount FROM users where user_id='$user_id'");
    $row = mysqli_fetch_assoc($sql);
    return $row['activation_amount'];
}
function total_direct_current_investment($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT activation_amount from users  where ref_id='$user_id'  ");

    $num_row = mysqli_num_rows($sql);
    if ($num_row == 0) {
        return $num_row;
    } else {
        $amount = 0;
        while ($row = mysqli_fetch_assoc($sql)) {
            $amount = $amount + $row['activation_amount'];
        }
        return $amount;
    }
}
function today_level_income($user_id)
{
    include 'includes/connection.php';
    date_default_timezone_set('Asia/Kolkata');
    $currentTimestamp = time();
    $previousTimestamp = strtotime('-24 hours', $currentTimestamp);
    $previousDateTime = date("Y-m-d H:i:s", $previousTimestamp);
    $sql = mysqli_query($conn, "SELECT amount from level_income  where user_id='$user_id' and creation_date> '$previousDateTime' ");
    $num_row = mysqli_num_rows($sql);
    if ($num_row == 0) {
        return 0;
    } else {
        $row = mysqli_fetch_assoc($sql);
        return $row['amount'];
    }
}
function total_direct_income($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT amount FROM direct_income where user_id='$user_id'");
    $num_row = mysqli_num_rows($sql);
    if ($num_row == 0) {
        return $num_row;
    } else {
        $amount = 0;
        while ($row = mysqli_fetch_assoc($sql)) {
            $amount = $row['amount'] + $amount;
        }
        return $amount;
    }
}
function today_direct_income($user_id)
{
    include 'includes/connection.php';
    date_default_timezone_set('Asia/Kolkata');
    $currentTimestamp = time();
    $previousTimestamp = strtotime('-24 hours', $currentTimestamp);
    $previousDateTime = date("Y-m-d H:i:s", $previousTimestamp);
    $sql = mysqli_query($conn, "SELECT amount from direct_income  where user_id='$user_id' and creation_date> '$previousDateTime' ");
    $num_row = mysqli_num_rows($sql);
    if ($num_row == 0) {
        return 0;
    } else {
        $row = mysqli_fetch_assoc($sql);
        return $row['amount'];
    }
}
function last_activation_amount_profit($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT * FROM activation_request where user_id='$user_id' order by creation_date DESC");
    $num_row = mysqli_num_rows($sql);
    if ($num_row == 0) {
        return 0;
    } else {

        $row = mysqli_fetch_assoc($sql);
        $amount = $row['amount'];
        if ($amount < 10000) {
            $percent = 3;
        } else {
            $percent = 4;
        }
        $fund = ($amount * $percent) / 100;
        $ans = ($fund * 5);
        return $ans;
    }
}
function last_activation_amount($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT * FROM activation_request where user_id='$user_id' order by creation_date DESC");
    $num_row = mysqli_num_rows($sql);
    if ($num_row == 0) {
        return 0;
    } else {
        $row = mysqli_fetch_assoc($sql);
        $amount = $row['amount'];
        return $amount;
    }
}
function if_activation_date($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT if_activation_date FROM users where user_id='$user_id'");
    $row = mysqli_fetch_assoc($sql);
    return $row['if_activation_date'];
}

function is_bank_account($user_id)
{
    include 'includes/connection.php';
    $sql = mysqli_query($conn, "SELECT * FROM bank where user_id='$user_id'");
    $num_row = mysqli_num_rows($sql);
    return $num_row;
}
