<?php
    //Path for main config file 
    include_once("db_config/main_config.php");
    
    //This php file inserts data into ambulance_info table in mysql
    
    $query = "INSERT IGNORE INTO `ambulance_info`(`amb_no`, `amb_name`, `amb_type`, `amb_status`, `amb_loc_lat`, `amb_loc_long`, `amb_rate`, `amb_contact`, `amb_driver_name`, `amb_state`, `amb_district`, `amb_town`, `amb_loc_pincode`) VALUES ('WB24B4475','Rishi Bankim Ambulance Service','Life-Support','active','22.5312','88.3644','1200','9654123475','Debasish','West Bengal','North 24 Parganas','Kanchrapara','743142');

    INSERT IGNORE INTO `ambulance_info`(`amb_no`, `amb_name`, `amb_type`, `amb_status`, `amb_loc_lat`, `amb_loc_long`, `amb_rate`, `amb_contact`, `amb_driver_name`, `amb_state`, `amb_district`, `amb_town`, `amb_loc_pincode`) VALUES ('UP35B3695','Atal Bihari Ambulance Service','Life-Support','busy','23.5312','86.3644','1000','9654123666','Vijay','Uttarpradesh','Prayagraj','George Town','211001');
    
    INSERT IGNORE INTO `ambulance_info`(`amb_no`, `amb_name`, `amb_type`, `amb_status`, `amb_loc_lat`, `amb_loc_long`, `amb_rate`, `amb_contact`, `amb_driver_name`, `amb_state`, `amb_district`, `amb_town`, `amb_loc_pincode`) VALUES ('WB24B2100','Sastha Sundar Ambulance Service','Normal','active','21.3145','87.9524','549','9748329717','Suman','West Bengal','Hooghly','Chinsura','743123');
    
    UPDATE `ambulance_info` SET `amb_no` = 'WB24B3446' WHERE `ambulance_info`.`amb_no` = '0';
    
    ALTER TABLE user_info ADD COLUMN formatted_adrrs varchar(255);";

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
