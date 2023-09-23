<?php
    //Path for main config file 
    include_once("db_config/main_config.php");
    
    //This php file inserts data into ambulance_info table in mysql
    
    $query = "ALTER TABLE `user_ambulance` ADD `invoice_no` VARCHAR(20) NOT NULL FIRST, ADD PRIMARY KEY (`invoice_no`);
    
    ALTER TABLE `user_ambulance` ADD `sl_no` INT(10) NOT NULL AUTO_INCREMENT FIRST, ADD UNIQUE (`sl_no`);
    
    ALTER TABLE `user_ambulance` CHANGE `user_book_lat` `user_book_lat` FLOAT(10,7) NOT NULL;
    
    ALTER TABLE `user_ambulance` CHANGE `user_book_long` `user_book_long` FLOAT(10,7) NOT NULL;";

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
