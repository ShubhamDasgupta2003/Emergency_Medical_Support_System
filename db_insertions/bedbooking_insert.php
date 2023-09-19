<?php
    //Path for main config file 
    include_once("db_config/main_config.php");
    
    //This php file inserts data into ambulance_info table in mysql


    

    // $query = "ALTER TABLE `hospital_info` ADD `Address` VARCHAR(100) NOT NULL AFTER `ContactNo`;
    
    // ALTER TABLE `hospital_info` CHANGE `ContactNo` `ContactNo` BIGINT(10) NOT NULL;

    // ALTER TABLE `hospital_info` CHANGE `Address` `Address` VARCHAR(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;";

    $query = "ALTER TABLE `patient_booking_info` DROP `Booking_time`;

    ALTER TABLE `patient_booking_info` ADD `Dob` DATE NOT NULL AFTER `Gender`, ADD `Address` VARCHAR(200) NOT NULL AFTER `Dob`, ADD `City` VARCHAR(50) NOT NULL AFTER `Address`, ADD `Pin` INT(10) NOT NULL AFTER `City`;

    
    ALTER TABLE `patient_booking_info` CHANGE `Booking_date` `Booking_date` VARCHAR(255) NOT NULL;
    ALTER TABLE `patient_booking_info` CHANGE `Patient_id` `Patient_id` VARCHAR(20) NOT NULL;
    ALTER TABLE `patient_booking_info` ADD `Hospital_name` VARCHAR(100) NOT NULL AFTER `Booking_amount`";

    $query = "INSERT IGNORE INTO `hospital_info`(`Id`, `Name`, `ContactNo`, `Address`, `State`, `District`, `City`, `Pincode`, `Latitude`, `Longitude`, `Male_bed_available`, `Female_bed_available`, `Bed_charge`) VALUES ('1','Naihati Matri Sadan Municipal Hospital','6384479131','6,Rishi Bankim Chandra Road,Naihati Urban,Naihati,West Bengal 743165','West Bengal','North 24 Parganas','Naihati','743165','22.8885','88.4178','52','48','300');

    INSERT IGNORE INTO `hospital_info`(`Id`, `Name`, `ContactNo`, `Address`, `State`, `District`, `City`, `Pincode`, `Latitude`, `Longitude`, `Male_bed_available`, `Female_bed_available`, `Bed_charge`) VALUES ('2','Naihati State General Hospital','8697921086','Naihati State General Hospital, Naihati, Kolkata, West Bengal 743165','West Bengal','North 24 Parganas','Naihati','743165','22.8950','88.4290','50','55','250');
    
    INSERT IGNORE INTO `hospital_info`(`Id`, `Name`, `ContactNo`, `Address`, `State`, `District`, `City`, `Pincode`, `Latitude`, `Longitude`, `Male_bed_available`, `Female_bed_available`, `Bed_charge`) VALUES ('3','NAIHATI HEALTH CARE','7003074773','252,Rishi Bankim Chandra Rd, Chowmatha,Gouripur,Garifa,Naihati,West Bengal 743166','West Bengal','North 24 Parganas','Naihati','743166','22.89779','88.41892','40','35','500');";
    
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
