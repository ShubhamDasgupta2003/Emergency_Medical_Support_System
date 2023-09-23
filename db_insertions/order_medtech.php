<?php
    //Path for main config file 
    include_once("db_config/main_config.php");
    
    //This php file inserts data into ambulance_info table in mysql
    
    $query = "ALTER TABLE `order_medtech` ADD CONSTRAINT `ord_medtech_fk` FOREIGN KEY (`user_id`) REFERENCES `user_info`(`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;";

    
    $result = mysqli_multi_query($con,$query);

    if($result)
    {
        echo "<br>Data inserted successfully !!";
    }
    else
    {
        echo "<br>Error occured !";
    }
?>
