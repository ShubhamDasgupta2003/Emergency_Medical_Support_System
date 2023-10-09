<?php
    include_once("db_config/main_config.php");
    $amb_no = $_GET['ambno'];
    $distance = $_GET['dist'];
    $otp_code = $_GET['otp'];
    $fare = $_GET['fare'];
    $query = "SELECT * FROM ambulance_info WHERE amb_no='$amb_no'";
    $result = mysqli_query($con,$query);
    if($result)
    {
        $rows = $result->fetch_assoc();
    }

    $order_info_query = "SELECT * FROM user_ambulance WHERE amb_no='$amb_no'";
    $order_result = mysqli_query($con,$order_info_query);
    if($order_result)
    {
        $order_rows = $order_result->fetch_assoc();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/amb_form_booking.css">
    <link rel="stylesheet" href="css/navlink.css">

</head>
<body>
    <div class="container">
        <div class="card">
            <div class="column">
                <h1 id="cnfm-msg"><i class="fa-solid fa-circle-check fa-bounce fa-2xl" style="color: #27b300;"></i> &nbsp;Booking Confirmed!</h1>
                <?php
                    $amb_fare = $distance * $rows['amb_rate'];
                    echo "<div class='amb_info_cont'>
                    <h3>Your ambulance is on it's way and will be here by 15 mins</h3>
                    <h1 class='descp' id='title'>$rows[amb_name]</h1>
                    <p class='descp' id='card-address'><i class='fa-solid fa-location-dot'></i> $rows[amb_state] $rows[amb_district] $rows[amb_town]</p>
                    <p class='descp' id='card-type'>$rows[amb_type]</p>
                    <p class='descp' id='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> $distance Km</p>
                    <h2 class='descp' id='card-fare'>&#8377 $fare/-</h2>
                </div>";
                ?>

                <?php
                    echo "<div class='amb_info_cont'>
                    <h2>Contact details of ambulance driver.</h2>
                    <p>Driver Name: $rows[amb_driver_name]</p>
                    <p>Ambulance No: $rows[amb_no]</p>
                    <h2 id='otp_num'>OTP - $otp_code</h2>
                    <h4><em>Please share your live location on whatsapp and directly talk to your ambulance driver on phone call</em></h4>
                    <div class='btn-row'>
                        <button class='btn wp-btn'><a href='//wa.me/91$rows[amb_contact]'><i class='fa-brands fa-whatsapp fa-xl'></i>+91$rows[amb_contact]</a></button>

                        <button class='btn call-btn'><a href='tel:$rows[amb_contact]'><i class='fa-solid fa-phone fa-xl'></i>+91$rows[amb_contact]</a></button>
                    </div>
                    <div class='btn-row'>
                        <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/index.php'><button class='btn'><i class='fa-solid fa-house'></i>&nbsp&nbspHome</button></a>
                    </div>
                </div>";

                    header("Refresh: 3,url=/Minor Project 5th_Sem/Emergency_Medical_Support_System/Payment/razor_pay.php?order_id=$order_rows[invoice_no]&amount=$fare");
                ?>
            </div>
        </div>
    </div>
</body>
</html>