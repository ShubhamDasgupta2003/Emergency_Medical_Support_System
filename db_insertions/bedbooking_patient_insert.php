<?php
    //Path for main config file 
    include_once("db_config/main_config.php");
    
    //This php file inserts data into ambulance_info table in mysql
    
    $query = "ALTER TABLE `patient_booking_info` DROP `Booking_time`;

        ALTER TABLE `patient_booking_info` ADD `Dob` DATE NOT NULL AFTER `Gender`, ADD `Address2` VARCHAR(200) NOT NULL AFTER `Dob`, ADD `City` VARCHAR(50) NOT NULL AFTER `Address`, ADD `Pin` INT(10) NOT NULL AFTER `City`;
        
        ALTER TABLE `emgmedicalsystem`.`patient_booking_info` DROP FOREIGN KEY `ptn_booking_fk`;
        
        ALTER TABLE `patient_booking_info` DROP `user_id`;
        ALTER TABLE `patient_booking_info` CHANGE `ContactNo` `ContactNo` BIGINT(10) NOT NULL;
        
        ";  

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
