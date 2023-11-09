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
include_once("db_config/main_config.php");
$db = new Database();
$con = $db->connect();
session_start();

$mailid = $_SESSION['user_email'];
$recp_name = $_SESSION['user_fname'];
$userid = $_SESSION['user_id'];

$billno = $_GET['order_id'];
$payment_id = $_GET['payment_id'];
$rows = $db->select("medtech_order","*","invoice_no='$billno'")->fetch_assoc();
$eid=$rows['eid'];
$rows1 = $db->select("medtech_emp","*","eid='$eid'")->fetch_assoc();
$to_email = "$mailid";      //the receiver email will be used here
$subject = "Aya/Nurse/Medical Techninian Booking Confirmation";
$body = "Hello $recp_name,

Thank you for using our Aya/Nurse/Medical Technician services. We are glad to serve you and hope you have a pleasant experience with us.

Here are the details of your Aya/Nurse/Medical Technician booking:

Invoice number: $billno
Salary: INR $rows1[salary]
Employee ID: $rows[eid]
Assigned employee name: $rows1[ename]
Payment status: Successful 😊
Employee contact: The employee will contact you when he/she reaches your destination within 48 hours.
Your details:
Name: $rows[name]
Contact number: $rows[contact_number]
Full address: $rows[user_book_address]
Landmark: $rows[lmark]
Booking date: $rows[booking_date]
Booking time: $rows[booking_time]
Booking amount: 500

Please keep this email as a confirmation of your booking and payment. If you have any questions or concerns, please feel free to contact us at emergencymedicalservices23@gmail.com.

Thank you for choosing us and have a great day!

Sincerely, Emergency Medical Support System";

$headers = "From: Emergency Medical Support System emergencymedicalservices23@gmail.com";//this email was created for this project

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
