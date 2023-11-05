<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

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
<body onload=loadFunc()>
    <div id="load-container">
    <div class="d-flex justify-content-center">
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <h3>Please wait Loading</h3>
    </div>
    <script>
        const loader = document.getElementById('load-container');
        function loadFunc()
        {
            loader.style.display = 'none';
        }
    </script>
</body>
</html>

<?php

session_start();

$mailid = $_SESSION['user_email'];
$recp_name = $_SESSION['user_fname'];
$userid = $_SESSION['user_id'];

$eid = $_GET['eid'];
$ename = $_GET['ename'];
$name=$_GET['name'];
$addess = $_GET['address'];
$billno = $_GET['billno'];

$to_email = "$mailid";      //the receiver email will be used here
$subject = "Aya/Nurse/Medical Techninian Booking Confirmation";
$body = "Hi $recp_name
Thank you for using our Aya/Nurse/Medical Techninian services.
The following is your Aya/Nurse/Medical Techninian booking details:

Your invoice no: $billno
Employee Id: $eid
Assigned Employee Name:$ename

You can pay via any of your preferred payment method
Employee will contact you when he reaches your destination.

Your Details,
Your name: $name
Assigned Employee Name:$ename


Regards
Emergency Medical Support System";



$headers = "From: emergencymedicalservices23@gmail.com";//this email was created for this project

if (mail($to_email, $subject, $body, $headers)) {
    echo "<script>alert('Booked Successfully \\n A booking confirmation is sent to your mail');
    window.location.href = '/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingConfirmation.php?eid=$eid&ename=$ename&dist=$dist&salary=$salary'</script>";
    
} else {
    echo "Email failed";
}


//credentails for the sender's email
/* Email is emergencymedicalservices23@gmail.com */
/* user is user */
/* Email Password is Password23!@$  */
/* on app password  is kzlufembtfmlsyfr */
?>
