<?php
    include_once("Backend/config.php");
    session_start();

if(isset($_POST['get_route'])){
    $id=$_SESSION['Bank_id'];
    echo $id;
$sql= "SELECT * FROM `blood_bank` where blood_bank_id='$id'";
$result= mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);



$u_id= $_SESSION['user_id'];
$u_sql="SELECT `lat_in_use`,`long_in_use` FROM `user_info` WHERE user_id='$u_id'";
$result= mysqli_query($con,$u_sql);
$u_row=mysqli_fetch_assoc($result);


$currentlatitude = $u_row['lat_in_use'];
$currentlongitude = $u_row['long_in_use'];
$destinationlatitude = $row['latitude'];
$destinationlongitude = $row['longitude'];


$googleMapsURL = "https://www.google.com/maps/dir/?api=1&origin={$currentlatitude},{$currentlongitude}&destination={$destinationlatitude},{$destinationlongitude}&travelmode=driving";



header("Location: $googleMapsURL");
}else{
    echo "<script><alert>geolocation not available for this browser.</alert></script>";
}



?>

<!-- get route feature ends here  -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/confirmation.css">
    <title>Confirmation | Thank you</title>
</head>

<body>
    <div class="container">
        <h2 id="cnfm-msg"><i class="fa-solid fa-circle-check fa-bounce fa-2xl" style="color: #00a896;"></i>
            &nbsp;Booking Confirmed!</h2>
        <div class="thank-you-message">Your details has been received. Kindly proceed to the blood bank to collect the required blood."</div>
        <hr>
        <p id="p1"><u>Blood Bank information</u></p>
        <div class="hspl-details">
        <?php
            $id=$_SESSION['Bank_id'];
            $sql= "SELECT * FROM `blood_bank` where blood_bank_id='$id'";
            $result= mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($result)){
                echo"
                <div class='c1'><strong class='attribute1'>Name:</strong>$row[name]</div>
            <div class='c1'> <strong class='attribute2'>Address:</strong>$row[state] $row[dist] $row[city]</div>
            <div class='c1'><strong class='attribute7'>District:</strong>$row[dist]</div>
            <div class='c1'><strong class='attribute2'>Number:</strong>2547812345</div>
                ";
            }
        ?>
        </div>
        <p id="p1"><u>Other information</u></p>
        <div class="other-details">
                <?php
                    $id=$_GET['order_id'];
                   $sql="SELECT * FROM `blood_order` WHERE order_id= '$id'";
                   $result= mysqli_query($con,$sql);
                   while($row=mysqli_fetch_assoc($result)){
                        
                       echo "<div class='c2'><strong class='attribute3'>Patient name:</strong>$row[Patient_name]</div>
                          <div class='c2'><strong class='attributebg'>Blood group:</strong>$row[Blood_gr]</div>
                          <div class='c2'><strong class='attribute4'>Number:</strong>$row[Contact_No]</div>
                          <div class='c2'><strong class='attribute6'>Booking Date & Time:</strong>$row[Order_date]</div>"
                           ;
                   }
                ?>

        </div>
        <!-- <p>Go back to <a href="/">Homepage</a></p> -->
        <div class="btns">
            <form method="post"><button name="get_route" class="btn">get route</button></form>
            <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/">
                <button class="btn">go to homepage</button>
            </a>
        </div>
    </div>
</body>

</html>

<?php

    session_start();

    $user_id = $_SESSION['user_id'];


    echo "Thank you for payment";
    // header("refresh:3; url=/Minor Project 5th_Sem/Emergency_Medical_Support_System/bed_booking_service/bed_booking_cnfm.php");
?>