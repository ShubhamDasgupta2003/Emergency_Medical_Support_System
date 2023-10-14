<?php
    include "db_config/main_config.php";

    $db = new database();
    $con = $db->connect();
    $amb_no = 'WB24AZ5732';
    $amb_driver_rows = $db->select('ambulance_info',"amb_name,amb_no,amb_status,amb_driver_name","amb_no='$amb_no'")->fetch_assoc();

    print_r($amb_driver_rows);
?>