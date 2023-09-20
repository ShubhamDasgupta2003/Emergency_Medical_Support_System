<?php

$otp_code = rand(100000,999999);    //generating otp for verification email
$otp_hash = password_hash($otp_code,PASSWORD_DEFAULT);

$mailid = $_GET['emailid'];
$recp_name = $_GET['name'];
$userid = $_GET['userid'];

$to_email = "$mailid";//the receiver email will be used here
$subject = "Welcome to Emergency Medical Services";
$body = "Hi $recp_name
We are happy to have you signedup for Emergency Medical Services.
To start exploring our services, please confirm your email address.
Your OTP is $otp_code";

$headers = "From: emergencymedicalservices23@gmail.com";//this email was created for this project

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email sent ";
    header("Location:confirm_mail.php?pswd_hash=$otp_hash&emailid=$mailid&userid=$userid");
} else {
    echo "Email failed";
}


//credentails for the sender's email
/* Email is emergencymedicalservices23@gmail.com */
/* user is user */
/* Email Password is Password23!@$  */
/* on app password  is kzlufembtfmlsyfr */