<?php

    include_once("db_config/main_config.php");
    $db = new Database();
    $db->connect();

    $lat_in_use = 88.2536;
    $lon_in_use = 22.3254;
    $filter = 'halisahar';

    // All the params for SELECT function here
    $sqli_table = 'ambulance_info';
    $sqli_rows = "`amb_no`, `amb_name`, `amb_type`, `amb_status`, `amb_loc_lat`, `amb_loc_long`, `amb_rate`, `amb_contact`, `amb_driver_name`, `amb_state`, `amb_district`, `amb_town`, `amb_loc_pincode`,ROUND((
        6371 *
        acos(cos(radians($lat_in_use)) * 
        cos(radians(amb_loc_lat)) * 
        cos(radians($lon_in_use) - 
        radians(amb_loc_long)) + 
        sin(radians($lat_in_use)) * 
        sin(radians(amb_loc_lat)))
     ),1) AS distance";

    $sqli_condition = "amb_town='$filter' OR amb_status='$filter'";
    $sqli_order = 'distance';

    //Storing result as assoc array
    // $result = $db->select($sqli_table,$sqli_rows,$sqli_condition,$sqli_order);

    // $result = $db->select($sqli_table,"COUNT(*) AS slno")->fetch_assoc();
    // print_r($result['slno']);
    
    // $ins = $db->insert('ambulance_info',array("WB24B6533","Test Ambulance Service","Normal","active","21.3145","87.9524","430","9748329717","Rajib","West Bengal","Hooghly","Chinsura","743123"))

    // $upd = $db->update('ambulance_info',array('amb_status'=>'busy'),"amb_no='WB24B4475'");
    echo $upd;
?>