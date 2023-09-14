<?php
$to_email = "";//the receiver email will be used here
$subject = "welcome";
$body = "Hi there!
I, Aatraya Roy,on befalf of our team would like to welcome you on board with project [Emergency Medical Services]!
This Project was made by
->Subham Dasgupta
->Jagannath Sarkar
->Sourav Paul
->Ramesh Roy
->Aatraya Roy

This Project includes services like Ambulance Service,Bed Booking Service,Blood Booking Service,Nurse-Technician support and Medical Supplies service
WELCOME ABOARD!!!!!";
$headers = "From: emergencymedicalservices23@gmail.com";//this email was created for this project

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email sent ";
} else {
    echo "Email failed";
}


//credentails for the sender's email
/* Email is emergencymedicalservices23@gmail.com */
/* user is user */
/* Email Password is Password23!@$  */
/* on app password  is kzlufembtfmlsyfr */