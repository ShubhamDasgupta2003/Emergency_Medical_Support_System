<?php
    //Path for main config file 
    include_once("db_config/main_config.php");
    
    //This php file inserts data into ambulance_info table in mysql
    
    $query = "INSERT INTO `org_medtech` (`org_id`, `org_name`, `org_location_lat`, `org_location_long`, `org_vill_or_town`, `org_post_off`, `org_dist`, `org_pincode`, `org_state`, `org_lmark`, `org_cont_number1`, `org_cont_number2`, `org_cont_number3`, `org_type`, `reg_date`, `reg_time`) VALUES ('O1', 'MedTech Support', '22.9754354', '86.8636634', 'Khatra', 'Khatra', 'Bankura', '722121', 'West Bengal', 'Khatra Oishi Plaza', '9999999999', '8888888888', '7777777777', 'm', '2023-09-22', '10:00:00');
    ALTER TABLE `org_medtech` CHANGE `org_cont_number1` `org_cont_number1` VARCHAR(15) NOT NULL;
    ALTER TABLE `org_medtech` CHANGE `org_cont_number2` `org_cont_number2` VARCHAR(15) NOT NULL;
    ALTER TABLE `org_medtech` CHANGE `org_cont_number3` `org_cont_number3` VARCHAR(15) NOT NULL;
    INSERT INTO `org_medtech` (`org_id`, `org_name`, `org_location_lat`, `org_location_long`, `org_vill_or_town`, `org_post_off`, `org_dist`, `org_pincode`, `org_state`, `org_lmark`, `org_cont_number1`, `org_cont_number2`, `org_cont_number3`, `org_type`, `reg_date`, `reg_time`) VALUES ('O2', 'Nurse Support', '22.9727393', '86.8452038', 'Khatra', 'Khatra', 'Bankura', '722121', 'West Bengal', 'Khatra Sub-divisional Hospital', '6666666666', '5555555555', '4444444444', 'n', '2023-09-22', '12:08:51'), ('O3', 'Aya Support', '22.9727393', '86.8452038', 'Khatra', 'Khatra', 'Bankura', '722121', 'West Bengal', 'Khatra Sub-divisional Hospital', '3333333333', '2222222222', '1111111111', 'a', '2023-09-22', '12:08:51');
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
