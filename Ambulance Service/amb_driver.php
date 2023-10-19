<?php
    include "db_config/main_config.php";

    $db = new database();
    $con = $db->connect();
    $result = 0;
    $amb_no = 'WB24B2100'; //get after login
    $amb_driver_rows = $db->select('ambulance_info',"amb_name,amb_no,amb_status,amb_driver_name,amb_type","amb_no='$amb_no'")->fetch_assoc();

    $amb_patient_rows = $db->select('user_ambulance',"patient_cont,patient_name,patient_age,patient_gender,total_fare,user_book_adrss,amb_no","amb_no='$amb_no' AND ride_status='Booked'")->fetch_assoc();

    if($amb_patient_rows=="")
    {
        $result = 0;
    }
    else
    {
        $result = 1;
    }
    //SET amb status in user_ambulance table(booked,completed)

    if(isset($_POST['reject']))
    {
        $ride_stat_updt = $db->update('user_ambulance',array('ride_status'=>'Rejected'),"ride_status='booked' AND amb_no='$amb_no'");

        $update_result = $db->update('ambulance_info',array('amb_status'=>'active'),"amb_no='$amb_no'");

        header("Refresh: 0");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambulance Driver</title>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/amb_form_booking.css">
    <link rel="stylesheet" href="css/navlink.css">
    <link rel="stylesheet" href="css/driver.css">
    <link rel="stylesheet" href="footer_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
</head>
<body>
<div class='driver-container'>
    <?php
        echo "<div class='header'>
        <img src='images/logo.png' alt='' width='50'>
        <h1 class='user-name'>Hello, $amb_driver_rows[amb_driver_name]</h1>
    </div>";

    ?>
    <div class="report-bar">
        <div class="card report-card">
            <h1>5</h1>
            <h3>Rides Completed</h3>
        </div>
        <div class="card report-card">
            <h1>0</h1>
            <h3>Rides Rejected</h3>
        </div>
        <div class="card report-card">
            <h1>0 Km</h1>
            <h3>Distance Travelled</h3>
        </div>
        <div class="card report-card">
            <h1>3</h1>
            <h3>Impressions</h3>
        </div>
    </div>
    <?php
        if($result==0)
        {
            echo "<div class='alg-x-top'>
            <div class='alg-cen-x active'>
                <h1 class='title'>$amb_driver_rows[amb_name]</h1>
                <h2>$amb_driver_rows[amb_no]</h2>
                <h2>$amb_driver_rows[amb_status]</h2>
                <h2>$amb_driver_rows[amb_type]</h2>
                <div class='card no-rides'>
                    <h1><img src='images/sleep.png' class='slide-bck-top' width='50'>No rides currently available !!</h1>
                </div>
            </div>
        </div>";
        }
        else
        {
            
            echo "<div class='alg-x-top'>
            <div class='alg-cen-x active'>
                <h1 class='title'>$amb_driver_rows[amb_name]</h1>
                <h2>$amb_driver_rows[amb_no]</h2>
                <h2>$amb_driver_rows[amb_status]</h2>
                <h2>$amb_driver_rows[amb_type]</h2>
                <div class='card'>
                    <h1 class='sub-h'><i class='fa-solid fa-bell fa-shake'></i>&nbsp&nbspRide request</h1>
                    <div class='card'>
                        <div class='alg-row'>
                            <h1>Patient name: $amb_patient_rows[patient_name]</h1>
                            <h2>Age: $amb_patient_rows[patient_age]</h2>
                            <h2>Gender: $amb_patient_rows[patient_gender]</h2>
                            <h2>Address: $amb_patient_rows[user_book_adrss]</h2>
                        </div>
                    </div>
                    <div class='alg-col cnfm_btns active'>
                        <form action='ride_accepted.php?refresh=0' method='post'>
                            <a href='#'><button class='btn' id='accept_ride' name='accept'><i class='fa-solid fa-check'></i>&nbsp&nbspAccept Ride</button></a>
                            <a href='#'><button class='btn-danger' id='reject-ride' name='reject'><i class='fa-solid fa-xmark'></i>&nbsp&nbspReject Ride</button></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>";
        }
    ?>
</div>
</body>
</html>