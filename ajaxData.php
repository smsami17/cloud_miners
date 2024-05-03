<?php 
// Include the database config file 
include_once 'includes/connection.php'; 
 
if(!empty($_POST["country_id"])){ 
    // Fetch state data based on the specific country 
    $query = "SELECT * FROM users WHERE user_id = ".$_POST['country_id']."";
    $result = mysqli_query($conn, $query); 
     
    // Generate HTML of state options list 
    if($result->num_rows > 0){ 
    
        $row = $result->fetch_assoc(); 
            echo $row['name']; 
         
    }else{ 
        echo 'Referral id is wrong!'; 
    } 
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
