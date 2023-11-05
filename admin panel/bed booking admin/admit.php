<?php

include_once ('oop_config.php');
date_default_timezone_set("Asia/calcutta");
$obj=new Database;
session_start();

$patient_id= $_SESSION['p_id'];
echo "$patient_id";

if(isset($_POST['admit'])){
    $booking_status="admitted";
    echo "$booking_status";
    $sql3=$obj->update("patient_booking_info",array("booking_status"=>$booking_status),"Patient_id ='$patient_id'");
    header("location:/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/bed booking admin/hospital_interface.php");
}

?>