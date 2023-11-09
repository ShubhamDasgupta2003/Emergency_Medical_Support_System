<?php
include_once("Backend/config.php");
    session_start();


    $id=$_SESSION['Bank_id'];
    $sql1= "SELECT * FROM `blood_order` where bloodbank_id='1'";
    $result1= mysqli_query($con,$sql1);
    $row1=mysqli_fetch_assoc($result1);
    print_r($row1);
    $patient_name=$row1['Patient_name'];
    $Order_bloodgr=$row1['Blood_gr'];
    $Order_date=$row1['Order_date'];
    $Order_id=$row1['Order_id'];
    $Order_time=$row1['Order_time'];
    $Order_price=$row1['price'];
    echo $patient_name;
?>