<?php
    //Path for main config file 

    //This php file inserts data into ambulance_info table in mysql
    
    include("db_config/main_config.php");
    $query ="INSERT IGNORE INTO `blood_bank_blood_group` VALUES ('1','1','20');
    INSERT IGNORE INTO `blood_bank_blood_group` VALUES ('1','2','20');
    INSERT IGNORE INTO `blood_bank_blood_group` VALUES ('1','3','15');
    INSERT IGNORE INTO `blood_bank_blood_group` VALUES ('1','4','15');
    INSERT IGNORE INTO `blood_bank_blood_group` VALUES ('1','5','15');
    INSERT IGNORE INTO `blood_bank_blood_group` VALUES ('1','6','15');
    INSERT IGNORE INTO `blood_bank_blood_group` VALUES ('1','7','15');
    INSERT IGNORE INTO `blood_bank_blood_group` VALUES ('1','8','15');


    INSERT IGNORE INTO `blood_bank_blood_group` VALUES ('2','1','20');
    INSERT IGNORE INTO `blood_bank_blood_group` VALUES ('2','2','20');
    INSERT IGNORE INTO `blood_bank_blood_group` VALUES ('2','3','15');
    INSERT IGNORE INTO `blood_bank_blood_group` VALUES ('2','4','15');
    INSERT IGNORE INTO `blood_bank_blood_group` VALUES ('2','5','15');
    INSERT IGNORE INTO `blood_bank_blood_group` VALUES ('2','6','15');
    INSERT IGNORE INTO `blood_bank_blood_group` VALUES ('2','7','15');
    INSERT IGNORE INTO `blood_bank_blood_group` VALUES ('2','8','15');


    INSERT IGNORE INTO `blood_bank_blood_group` VALUES ('3','1','20');
    INSERT IGNORE INTO `blood_bank_blood_group` VALUES ('3','2','20');
    INSERT IGNORE INTO `blood_bank_blood_group` VALUES ('3','3','15');
    INSERT IGNORE INTO `blood_bank_blood_group` VALUES ('3','4','15');
    INSERT IGNORE INTO `blood_bank_blood_group` VALUES ('3','5','15');
    INSERT IGNORE INTO `blood_bank_blood_group` VALUES ('3','6','15');
    INSERT IGNORE INTO `blood_bank_blood_group` VALUES ('3','7','15');
    INSERT IGNORE INTO `blood_bank_blood_group` VALUES ('3','8','15');

    
    INSERT IGNORE INTO `blood_bank_blood_group` VALUES ('4','1','20');
    INSERT IGNORE INTO `blood_bank_blood_group` VALUES ('4','2','20');
    INSERT IGNORE INTO `blood_bank_blood_group` VALUES ('4','3','15');
    INSERT IGNORE INTO `blood_bank_blood_group` VALUES ('4','4','15');
    INSERT IGNORE INTO `blood_bank_blood_group` VALUES ('4','5','15');
    INSERT IGNORE INTO `blood_bank_blood_group` VALUES ('4','6','15');
    INSERT IGNORE INTO `blood_bank_blood_group` VALUES ('4','7','15');
    INSERT IGNORE INTO `blood_bank_blood_group` VALUES ('4','8','15');
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
