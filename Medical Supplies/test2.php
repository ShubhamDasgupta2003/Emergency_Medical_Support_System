<?php
    include_once("db_config/main_config.php");

    $db = new Databaset();       //Creating object of Databse class
    $con = $db->connect();      //Calling connect() method

    session_start();
    $db->isLoggedIn($_SESSION['is_logged_in']);          //Checking login status

    //Backend for location modification starts here
    setcookie("loc_modify","false");

    $uid =  $_SESSION['user_id'];
    $ufname =  $_SESSION['user_fname'];
    $ulname = $_SESSION['user_lname'];

    $lat_in_use = 0.0;
    $lon_in_use = 0.0;
    $full_address = "";
    $loc_query = $db->select('user_info',"*","user_id='$uid'");
    //$loc_query = "SELECT lat_in_use,long_in_use,formatted_adrrs FROM user_info WHERE user_id='$uid'";

    //$loc_result = $con->query($loc_query);
    $loc_rows = $loc_query->fetch();

    if($loc_rows)
    {
        $lat_in_use = $loc_rows['lat_in_use'];
        $lon_in_use = $loc_rows['long_in_use'];
        $full_address = $loc_rows['formatted_adrrs'];
    }
    else
    {
        echo "error";
    }

    if(@$_COOKIE['loc_modify'] == 'true')
    {
        $mod_lat = $_COOKIE['lat_in_use'];
        $mod_lon = $_COOKIE['lon_in_use'];
        $mod_addrs = $_COOKIE['address_in_use'];

        $loc_mod_query = $db->update('user_info'," SET lat_in_use=$mod_lat,long_in_use=$mod_lon,formatted_adrrs='$mod_addrs' WHERE user_id='$uid'");

        //$loc_mod_query = "UPDATE user_info SET lat_in_use=$mod_lat,long_in_use=$mod_lon,formatted_adrrs='$mod_addrs' WHERE user_id='$uid'";

        //$mod_loc_result = $con->query($loc_mod_query);

        if($loc_mod_query)
        {
            header("Refresh: 1");
        }
    }
    //Backend for location modification ends here


    //Query for displaying results on screen

    $amb_filter_query = "active";

    if(@$_GET['q'])
    {
        $amb_filter_query = $_GET['q'];
    }
    else
    {
        $amb_filter_query = "active";
    }
    // $search_filter = ;
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

    $sqli_condition = "amb_town LIKE '$amb_filter_query%' OR amb_status='$amb_filter_query' OR amb_name='$amb_filter_query' OR amb_type = '$amb_filter_query' OR amb_district='$amb_filter_query'";
    $sqli_order = 'distance';
?>