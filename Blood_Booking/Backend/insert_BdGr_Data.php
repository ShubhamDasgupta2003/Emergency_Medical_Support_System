<?php
    //Path for main config file 

    //This php file inserts data into ambulance_info table in mysql
    
    include("config.php");
    $query ="INSERT INTO `blood_group` VALUES ('3','A+','700');
             INSERT INTO `blood_group` VALUES ('4','A-','950');
             INSERT INTO `blood_group` VALUES ('5','B-','1150');
             INSERT INTO `blood_group` VALUES ('6','B+','950');
             INSERT INTO `blood_group` VALUES ('7','AB+','1150');
             INSERT INTO `blood_group` VALUES ('8','AB-','1300');
             INSERT INTO `blood_group` VALUES ('1','O-','800');
             INSERT INTO `blood_group` VALUES ('2','O+','700');

            ";

    
    $result = mysqli_multi_query($conn,$query);

    if($result)
    {
        echo "<br>Data inserted successfully !!";
    }
    else
    {
        echo "<br>Error occured !";
    }
?>
