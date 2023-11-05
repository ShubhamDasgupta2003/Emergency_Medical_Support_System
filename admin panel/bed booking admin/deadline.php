<?php
include_once ('oop_config.php');
date_default_timezone_set("Asia/calcutta");
$obj=new Database;
session_start();


// $patient_id= $_SESSION['p_id'];
$patient_id = "PNT4359898956";

$sql2=$obj->select("patient_booking_info","Booking_date,booking_status","Patient_id='$patient_id'")->fetch_assoc();
echo "$sql2[Booking_date]";

if($sql2){
    $storedDate = new DateTime($sql2['Booking_date']);

    $storedDate->add(new DateInterval('PT4H'));
    // echo "$storedDate";
    echo $storedDate->format('Y-m-d H:i:s');
}
// if ($result) {
    // Convert the stored date string to a DateTime object
    // $storedDate = new DateTime($result['booking_time']);
    
    // Add 4 hours to the stored date
    // $storedDate->add(new DateInterval('PT4H'));

?>