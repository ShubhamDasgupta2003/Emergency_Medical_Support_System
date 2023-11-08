<?php

    session_start();
    include_once("db_config/main_config.php");

    $db = new Database();
    $con = $db->connect();

    $userid = $_GET['user_id'];
    $amount = $_GET['amount'];
    $query = "SELECT * FROM user_info WHERE user_id='$userid'";
    $result = mysqli_query($con,$query);
    if($result)
    {
        $rows = mysqli_fetch_assoc($result);
    }

    $mailid = $rows['user_email'];
    $recp_name = $rows['user_first_name'];
    
    
    $ambno = $_SESSION['amb_no'];
    $ambname = $_SESSION['ambname'];
    $billno = $_GET['payment_id'];
    $cur_time = $db->currentDateTime()['time'];
    $cur_date = $db->currentDateTime()['date'];

    $to_email = "$mailid";      //the receiver email will be used here
    $subject = "Payment Confirmation";
    $body = "Hi $recp_name
    Thank you for using $ambname ($ambno).
    We have received a payment of Rs $amount /-

    Your Payment Id: $billno

    Regards
    Emergency Medical Support System";

    $headers = "From: emergencymedicalservices23@gmail.com";//this email was created for this project
    if (mail($to_email, $subject, $body, $headers)) {

        echo "";
        
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
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/amb_form_booking.css">
    <link rel="stylesheet" href="css/navlink.css">
    <link rel="stylesheet" href="css/payment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <title>Payment Confirmation</title>
</head>
<body>
<?php

echo "<div class='container'>
<div class='card'>
    <div class='column'>
        <h1 id='cnfm-msg' class='title'><i class='fa-regular fa-circle-check fa-beat'></i>&nbsp&nbspPayment Successfull</h1>
            <div class='amb_info_cont'>
            <h1 class='descp' id='title'>$_SESSION[pt_name]</h1>
            <h3>Contact no.</h3>
            <p class='descp' id='card-distance'>$_SESSION[pt_cont]</p>
            <h3>Order Id</h3>
            <p class='descp' id='card-type'>$billno</p>
            <h3>Total</h3>
            <h2 class='descp' id='card-fare'>&#8377 $amount/-</h2>
            <h3>Date</h3>
            <h2 class='descp' id='card-fare'>$cur_date</h2>
            <h3>Time</h3>
            <h2 class='descp' id='card-fare'>$cur_time</h2>
    </div>
    <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/Ambulance Service/amb_driver.php' target='_blank'><button class='btn'>Dashboard</button></a>
</div>
</div>";

?>
</body>
</html>