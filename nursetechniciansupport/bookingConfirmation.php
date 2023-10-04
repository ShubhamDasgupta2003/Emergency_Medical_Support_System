<?php
if(isset($_POST["submit"])){
    include "connect.php";
    $villortown=$_POST["user_vill_or_town"];
    $postoff=$_POST["user_post_off"];
    $pincode=$_POST["user_pincode"];
    $dist=$_POST["user_dist"];
    $state=$_POST["user_state"];
    $lmark=$_POST["user_lmark"];
    $sql="INSERT INTO order_medtech(user_vill_or_town,user_post_off,user_pincode,user_dist,user_state,user_lmark) VALUES('$villortown','$postoff','$pincode','$dist','$state','$lmark')";
    if(mysqli_query($conn,$sql)){
        echo "Data Insert Sucessfull!";
    }
    else{
        echo "error";
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/bookingConfirmation.css">
    <title>Confirmation | Thank you</title>
</head>
<body>
    <div class="container">
        <h2 id="cnfm-msg"><i class="fa-solid fa-circle-check fa-bounce fa-2xl" style="color: #00a896;"></i>
            &nbsp;Booking Confirmed!</h2>
        <div class="thank-you-message">Your details has been received.
        </div>
        <hr>
        <p id="p1"><u>Mediacl Technicians information.</u></p>
        <div class="hspl-details">
            <div class="c1"><strong class="attribute1">Name:</strong>Ramesh Roy</div>
            <div class="c1"><strong class="attribute1">Organization Name:</strong>Ramesh Roy</div>
            <div class="c1"><strong class="attribute2">Address:</strong>Khadinamore, Chinsurah, Hooghly.
            </div>
            <div class="c1"><strong class="attribute2">Number:</strong>+91-8697921086</div>
            <div class="c1"><strong class="attribute1">E-mail:</strong>rameshroyprl2019@gmail.com</div>
        </div>
        <p id="p1"><u>Other information</u></p>
        <div class="other-details">
            <div class="c2"><strong class="attribute3">User name:</strong>Suresh Roy</div>
            <div class="c2"><strong class="attribute4">Contact Number:</strong>9593672361</div>
            <div class="c2"><strong class="attribute6">Booking Date and Time</strong>10.09.2023 | 12:12 pm
            </div>
        </div>
        <!-- <p>Go back to <a href="/">Homepage</a></p> -->
        <div class="btns">
            <button class="btn">Get route</button>
            <a href="/HomePage/index.php">
                <button class="btn">Go to homepage</button>
            </a>
        </div>
    </div>
</body>

</html>