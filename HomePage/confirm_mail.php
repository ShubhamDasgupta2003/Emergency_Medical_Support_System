<?php
    include_once("db_config_p/main_config.php");

    $hashed_otp = $_GET['pswd_hash'];
    $email_otp = $_GET['emailid'];
    $userid = $_GET['userid'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email confirmation</title>

    <link rel="stylesheet" href="css/amb_form_booking.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/navLink.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .card
        {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: rgb(208, 255, 247)
        }
        form input
        {
            border-bottom: 1px solid var(--light-color);
        }
        
    </style>
</head>
<body>
    <div class="patient_info_cont card">
        <?php

            echo "<h1>Please enter OTP sent at <em><h6>$email_otp</h5></em></h1>";

            $email_query = "UPDATE user_info SET email_verified=1 WHERE user_id='$userid'";

            if(isset($_POST['submit_otp']))
            {
                $user_input_otp = $_POST['otp'];
                if(password_verify($user_input_otp,$hashed_otp))
                {
                    $result = mysqli_query($con,$email_query);

                    echo "<div class='row'>
                    <i class='fa-solid fa-circle-check fa-bounce fa-2xl' style='color: #27b300;'></i>
                    <h2>&nbsp&nbspEmail verified successfully!</h2>
                    </div>";

                    header("Refresh: 3; url=login.php");
                }
                else
                {
                    echo "<script>alert('Invalid OTP')</script>";
                }
            }
        ?>
        <form method="post">
            <div class="row">
                <input type="number" name="otp" id="" placeholder="Enter OTP here">
                <button class="btn" name="submit_otp">Submit</button>
            </div>
        </form>
        <h3><em>Do not close this tab</em></h3>
        <h3><em>You will be automatically redirected after 3secs of submitting the OTP</em></h3>
    </div>
</body>
</html>