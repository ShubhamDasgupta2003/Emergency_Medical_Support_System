<?php

session_start();
$otp_code = rand(1111,9999);    //generating otp for verification email

$mailid = $_SESSION['user_email'];
$recp_name = $_SESSION['user_fname'];
$userid = $_SESSION['user_id'];

$ambno = $_GET['ambno'];
$ambname = $_GET['ambname'];
$ambdriver = $_GET['driver'];
$amb_fare = $_GET['fare'];
$ambdist = $_GET['dist'];
$billno = $_GET['billno'];

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
Your subtotal amount is: Rs $amb_fare /-

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