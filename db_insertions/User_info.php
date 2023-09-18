<?php
    //Path for main config file 
    include_once("db_config/main_config.php");
    
    //This php file inserts data into ambulance_info table in mysql
    
    $query = "ALTER TABLE user_info ADD COLUMN lat_in_use float,ADD COLUMN long_in_use float;
    
    ALTER TABLE `user_info` CHANGE `user_name` `user_first_name` VARCHAR(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;
    
    ALTER TABLE `user_info` ADD `user_last_name` VARCHAR(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL AFTER `user_first_name`;
    
    ALTER TABLE `user_info` ADD `user_gender` VARCHAR(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL AFTER `user_last_name`;";

    
    $result = mysqli_multi_query($con,$query);

    if($result)
    {
        echo "<br>User_info table updated successfully !!";
    }
    else
    {
        echo "<br>Error occured !";
    }
?>
