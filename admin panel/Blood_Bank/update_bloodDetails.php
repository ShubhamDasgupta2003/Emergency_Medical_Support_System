<?php
session_start();
include_once ('oop_connection.php');
date_default_timezone_set("Asia/calcutta");
$obj=new Database;
$blood_bank_id=$_SESSION['blood_bank_id']; 
echo 'blood_bank:'.$blood_bank_id.'';
if (isset($_GET['submit'])) {
    // Check if the form was submitted

    // Get the values from the URL parameters
    $ucount = $_GET['ucount'];
    $bg_id = $_GET['bg_id'];


    echo 'count:'.$ucount.'bg:'.$bg_id.'';
    $obj->update('blood_bank_blood_group', ['count' => $ucount], 'blood_bank_id="' . $blood_bank_id . '" and blood_group_id="' . $bg_id . '"');

}
// $_SESSION["Blood_Bank_id"] = $id;
// $_SESSION["Blood_id"] = $bg_id;

// if(isset($_POST['submit'])){
//     $count=$_POST['count'];
//     $result=$obj2->update_Blood_Details($count,$id,$bg_id);
// $values=['count'=>$count];
       
// }


?>