<?php
    //Path for main config file 
    include_once("db_config/main_config.php");
    
    //This php file inserts data into ambulance_info table in mysql
    
    $query = "ALTER TABLE user_info ADD COLUMN lat_in_use float,ADD COLUMN long_in_use float;";

    
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
