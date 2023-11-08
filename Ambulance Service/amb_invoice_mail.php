<?php

session_start();

$mailid = $_SESSION['user_email'];
$recp_name = $_SESSION['user_fname'];
$userid = $_SESSION['user_id'];

$ambno = $_GET['ambno'];
$ambname = $_GET['ambname'];
$ambdriver = $_GET['driver'];
$amb_fare = $_GET['fare'];
$ambdist = $_GET['dist'];
$billno = $_GET['billno'];
$otp_code = $_GET['otp'];

$to_email = "$mailid";      //the receiver email will be used here
$subject = "Ambulance Booking Confirmation";
$body = "Hi $recp_name
Thank you for using our ambulance services.
The following is your ambulance booking details:

Your invoice no: $billno
Ambulance service provider: $ambname
Ambulance no: $ambno
Distance travelling: $ambdist Km

You can pay via any of your preferred payment method
The ambulance rate is: Rs $amb_fare /- per Hr

Your driver will contact you when he reaches your destination.
He will help you to handle the patient properly.

Please share the OTP with your driver, to start the ride
Ambulance No: $ambno
Driver name: $ambdriver
Your OTP is $otp_code

Regards
Emergency Medical Support System";

$headers = "From: emergencymedicalservices23@gmail.com";//this email was created for this project
if (mail($to_email, $subject, $body, $headers)) {

    echo "<script>alert('Ride Booked Successfully \\n A booking confirmation is sent to your mail');
    window.location.href = '/minor Project 5th_Sem/Emergency_Medical_Support_System/Ambulance Service/amb_booking_cnfm.php?ambno=$ambno&dist=$ambdist&otp=$otp_code&fare=$amb_fare'</script>";
    
} else {
    echo "Email failed";
}

//credentails for the sender's email
/* Email is emergencymedicalservices23@gmail.com */
/* user is user */
/* Email Password is Password23!@$  */
/* on app password  is kzlufembtfmlsyfr */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <title>Email</title>
    <style>
        body
        {
            overflow-y:hidden;
            background-color:rgb(255,255,255);
        }
        #load-container
        {
            height:100vh;
            width:100vw;
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
        }
    </style>
</head>
<body>
    <div id="load-container">
    <div class="d-flex justify-content-center">
        <h1><i class='fa-solid fa-envelope-circle-check fa-bounce fa-2xl' style='color: #00bd97;'></i></h1>
        <h3>Mail Sent</h3>
    </div>
    </div>
    <!-- <script>
        const loader = document.getElementById('load-container');
        function loadFunc()
        {
            loader.style.display = 'none';
        }
    </script> -->
</body>
</html>
