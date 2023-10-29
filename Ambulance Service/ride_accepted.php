<?php
    include "db_config/main_config.php";
    session_start();

    $db = new database();
    $con = $db->connect();
    $amb_no = $_SESSION['amb_no']; //get after login

    if(isset($_POST['reject']))
    {
        $ride_stat_updt = $db->update('user_ambulance',array('ride_status'=>'Rejected'),"ride_status='booked' AND amb_no='$amb_no'");

        $update_result = $db->update('ambulance_info',array('amb_status'=>'active'),"amb_no='$amb_no'");

        header("Location: amb_driver.php");
    }
    
    if(isset($_POST['accept']))     //Update the ride status to Accepted
    {
        $ride_stat_updt = $db->update('user_ambulance',array('ride_status'=>'Accepted'),"ride_status='booked' AND amb_no='$amb_no'");

    }
    $amb_driver_rows = $db->select('ambulance_info',"amb_name,amb_no,amb_status,amb_driver_name,amb_type","amb_no='$amb_no'")->fetch_assoc();

    $amb_patient_rows = $db->select('user_ambulance',"invoice_no,OTP,user_book_lat,user_book_long,patient_cont,patient_name,patient_age,patient_gender,total_fare,user_book_adrss,amb_no","amb_no='$amb_no' AND ride_status='accepted'")->fetch_assoc();
    print_r($amb_patient_rows);

    if(isset($_POST['start_ride']))
    {
        $otp_customer = $_POST['otp'];
        if($otp_customer==$amb_patient_rows['OTP'])
        {

            $ride_stat_updt = $db->update('user_ambulance',array('ride_status'=>'Started'),"ride_status='Accepted' AND amb_no='$amb_no'");
            
            header("Location: ride_completed.php?inv=$amb_patient_rows[invoice_no]");
        }
        else
        {
            echo "<script>alert('Invalid OTP!')</script>";
        }
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
<div class='container'>
    <?php
        echo "<div class='header'>
        <img src='images/logo.png' alt='' width='50'>
        <h1 class='user-name'>Hello, $amb_driver_rows[amb_driver_name]</h1>
    </div>
    <div class='alg-x-top'>
        <div class='alg-cen-x'>
            <h1 class='title'>$amb_driver_rows[amb_name]</h1>
            <h2 id='amb-no'>$amb_driver_rows[amb_no]</h2>
            <h2 class='status status-active'>$amb_driver_rows[amb_status]</h2>
            <h2>$amb_driver_rows[amb_type]</h2>
            <div class='card'>
                <h1 class='cnfm-sub-h'><i class='fa-regular fa-circle-check fa-beat'></i>&nbsp&nbspRide Accepted</h1>
                <div class='card'>
                    <div class='alg-row'>
                        <h1>Patient name: $amb_patient_rows[patient_name]</h1>
                        <h2>Age: $amb_patient_rows[patient_age]</h2>
                        <h2>Gender: $amb_patient_rows[patient_gender]</h2>
                        <h2>Address: $amb_patient_rows[user_book_adrss]</h2>
                    </div>
                    <div class='alg-col contact_btns active'>
                        <button class='btn call-btn'><a href='tel:$amb_patient_rows[patient_cont]' target='_blank'><i class='fa-solid fa-phone fa-xl'></i>&nbsp&nbsp+91$amb_patient_rows[patient_cont]</a></button>

                        <button class='btn wp-btn'><a href='//wa.me/$amb_patient_rows[patient_cont]' target='_blank'><i class='fa-brands fa-whatsapp fa-xl'></i>&nbsp&nbsp+91$amb_patient_rows[patient_cont]</a></button>
                    </div>"
            ?>
            <?php
                echo "<div class='card' id='otp-card'>
                <h1 class='title'>Enter OTP to start ride</h1>
                <div class='alg-row otp-box'>
                    <form method='post'>
                        <div class='alg-col otp-input'>
                            <h1><i class='fa-solid fa-key'></i>&nbsp&nbspOTP</h1>
                            <input type='number' name='otp' id=''>
                        </div>
                        <button class='btn-danger' name='start_ride' id='startride'><i class='fa-solid fa-truck-fast fa-lg'></i>&nbsp&nbspStart Ride</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>";
                    

?>
    <script src="amb_status.js"></script>
    <!-- <script src="driver.js"></script> -->
</body>
</html>