<?php
include ("config.php");
//Backend for location modification starts here
setcookie("loc_modify","false");

$uid =  $_SESSION['user_id'];
$ufname =  $_SESSION['user_fname'];
$ulname = $_SESSION['user_lname'];

$lat_in_use = 0.0;
$lon_in_use = 0.0;
$full_address = "";
$loc_query = "SELECT lat_in_use,long_in_use,formatted_adrrs FROM user_info WHERE user_id='$uid'";

$loc_result = mysqli_query($conn,$loc_query);
$loc_rows = $loc_result->fetch_assoc();

if($loc_result)
{
    $lat_in_use = $loc_rows['lat_in_use'];
    $lon_in_use = $loc_rows['long_in_use'];
    $full_address = $loc_rows['formatted_adrrs'];
}
else
{
    echo "error";
}

if($_COOKIE['loc_modify'] == 'true')
{
    $mod_lat = $_COOKIE['lat_in_use'];
    $mod_lon = $_COOKIE['lon_in_use'];
    $mod_addrs = $_COOKIE['address_in_use'];

    $loc_mod_query = "UPDATE user_info SET lat_in_use=$mod_lat,long_in_use=$mod_lon,formatted_adrrs='$mod_addrs' WHERE user_id='$uid'";

    $mod_loc_result = mysqli_query($conn,$loc_mod_query);

    if($mod_loc_result)
    {
        header("Refresh: 1");
    }
}

$b_gr=strtoupper($_POST["s_value"]);

//Backend for location modification ends here
$query = "SELECT
    blood_bank.blood_bank_id,
    blood_bank.name,
    blood_bank.latitude,
    blood_bank.longitude,
    blood_bank.state,
    blood_bank.city,
    blood_bank.dist,
    blood_bank.pincode,
    ROUND((
        6371 *
        acos(cos(radians($lat_in_use)) * 
        cos(radians(blood_bank.latitude)) * 
        cos(radians($lon_in_use) - radians(blood_bank.longitude)) + 
        sin(radians($lat_in_use)) * sin(radians(blood_bank.latitude)))
     ),1) AS distance,
    blood_group.*
FROM blood_bank_blood_group
JOIN blood_group ON blood_bank_blood_group.blood_group_id = blood_group.blood_group_id
JOIN blood_bank ON blood_bank_blood_group.blood_bank_id = blood_bank.blood_bank_id
WHERE blood_bank_blood_group.blood_group_id = SELECT `blood_group_id` FROM `blood_group` WHERE `group_name` = '$b_gr'
ORDER BY distance";


?>