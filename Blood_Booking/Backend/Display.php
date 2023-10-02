<?php
include ("config.php");
// $b_gr=strtoupper($_POST["search"]);
$b_gr="O+";
// $query1="";
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
             ), 1) AS distance,
            blood_group.*
            FROM blood_bank_blood_group
            JOIN blood_group ON blood_bank_blood_group.blood_group_id = blood_group.blood_group_id
            JOIN blood_bank ON blood_bank_blood_group.blood_bank_id = blood_bank.blood_bank_id
            WHERE blood_bank_blood_group.blood_group_id = (
            SELECT blood_group_id 
            FROM blood_group 
            WHERE group_name = '$b_gr'
            )
            ORDER BY distance;
         ";
        

?>