<?php
    //Path for main config file 

    //This php file inserts data into ambulance_info table in mysql
    
    include("config.php");
    $query ="INSERT INTO `blood_bank` VALUES ('2','HopePulse Blood Center Badkulla','22.4185','88.2209','West Bengal','Bakulla','Nadia','741121');
    INSERT INTO `blood_bank` VALUES ('3','PureLife Blood Bank Taherpur','23.2566','88.5336','West Bengal','Taherpur','Nadia','741159');
    INSERT INTO `blood_bank` VALUES ('4','Lifeline Blood Bank Taherpur','23.2652','88.5304','West Bengal','Taherpur','Nadia','741159');
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
