<?php
// Include the database config file 
session_start();
include_once '../includes/connection.php';

if (!empty($_POST["country_id"])) {

    // Fetch state data based on the specific country 
    if ($_POST['country_id'] < 500) {
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

// elseif(!empty($_POST["state_id"])){ 
//     // Fetch city data based on the specific state 
//     $query = "SELECT * FROM cities WHERE state_id = ".$_POST['state_id']." AND status = 1 ORDER BY city_name ASC"; 
//     $result = $db->query($query); 
     
//     // Generate HTML of city options list 
//     if($result->num_rows > 0){ 
//         echo '<option value="">Select city</option>'; 
//         while($row = $result->fetch_assoc()){  
//             echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>'; 
//         } 
//     }else{ 
//         echo '<option value="">City not available</option>'; 
//     } 
// } 
