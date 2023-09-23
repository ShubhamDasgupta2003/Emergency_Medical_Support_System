<?php
    //Path for main config file 
    include_once("db_config/main_config.php");
    
    //This php file inserts data into ambulance_info table in mysql
    
    $query = "ALTER TABLE `emp_medtech` ADD `salary` INT(20) NOT NULL AFTER `e_rating`;
    ALTER TABLE `emp_medtech` CHANGE `e_cont_number` `e_cont_number` VARCHAR(15) NOT NULL;
    ALTER TABLE `emp_medtech` ADD CONSTRAINT `emp_medtech_fk` FOREIGN KEY (`org_id`) REFERENCES `org_medtech`(`org_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
    INSERT INTO `emp_medtech` (`org_id`, `eid`, `ename`, `e_cont_number`, `e_status`, `e_rating`, `salary`) VALUES ('O1', 'M1', 'Ramesh Roy', '9593672360', 'free', '4.5', '1200'), ('O1', 'M2', 'Suresh Roy', '9593673241', 'free', '4.5', '1100');
    INSERT INTO `emp_medtech` (`org_id`, `eid`, `ename`, `e_cont_number`, `e_status`, `e_rating`, `salary`) VALUES ('O2', 'N1', 'Priya Roy', '6723618977', 'free', '4.5', '1200'), ('O2', 'N2', 'Sneha Das', '8100056000', 'free', '4.5', '1100');
    INSERT INTO `emp_medtech` (`org_id`, `eid`, `ename`, `e_cont_number`, `e_status`, `e_rating`, `salary`) VALUES ('O3', 'A1', 'Nandini Saha', '9593672369', 'free', '4.5', '1200'), ('O3', 'A2', 'Anamika Roy', '9593673249', 'free', '4.5', '1100');
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