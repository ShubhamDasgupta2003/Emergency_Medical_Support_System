<?php
include_once ('connection.php');
session_start();
$uid =  $_SESSION['user_id'];
$e= $_SESSION['user_email'];
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
            <?php
             $b=$_GET['pgt'];
            ?>
            <div class="column">
                <h1 id="cnfm-msg"><i class="fa-solid fa-circle-check fa-bounce fa-2xl" style="color: #27b300;"></i> &nbsp;Booking Confirmed!</h1>
                <div class="amb_info_cont">
                    <h3>Your Order  is confirmed . Regarding any question about the order contact us with your registered <?php echo $e ?></h3>
                    <p class="descp" id="card-type"></p>
                    <p class="descp" id="card-address"><i class="fa-solid fa-location-dot"></i> Shipping To</p>
                    <p class="descp" id="card-type">WestBengal North - 24pgs Halisahar - 743135</p>
                    <p class="descp" id="card-address"><i class="fa-solid fa-calendar-days"></i>></i> Estimated Arrival</p>
                    <p class="descp" id="card-type">23 March</p>
                    <h2 class="descp" id="card-fare">Total Price: &#8377  <?php echo $b; ?></h2>
                    <div class="bton">
                    <?php echo "<a href='Receipt Generator.php?p= $b ' class='btn'>Receipt</a>"; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>