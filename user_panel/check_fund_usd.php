<?php
// Include the database config file 
session_start();
include_once '../includes/connection.php';

if (!empty($_POST["country_id"])) {

    // Fetch state data based on the specific country 
    $usd_rate=$_SESSION['usd_rate'];
    if ($_POST['country_id'] < (500/$usd_rate)) {
        echo 1;
    } else {
        $user_id = $_SESSION['user_id'];
        $amount = $_SESSION['current_income'];
        $r_amount = $_POST['country_id'];
        if ($r_amount > $amount) {
            echo 2;
        }
        else
        {
            echo 3;
        }
    }

    // Generate HTML of state options list 
 
}