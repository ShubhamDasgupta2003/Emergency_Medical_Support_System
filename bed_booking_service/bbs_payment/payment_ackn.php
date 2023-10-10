<?php

    session_start();

    $user_id = $_SESSION['user_id'];


    echo "Thank you for payment";
    header("refresh:3; url=/Minor Project 5th_Sem/Emergency_Medical_Support_System/bed_booking_service/bed_booking_cnfm.php");
?>