<?php
    include_once("db_config/main_config.php");

    $db = new Database();
    $con = $db->connect();

    $eid = $_GET['eid'];
    // $address = $_GET['address'];
    // $distance = $_GET['dist'];
    // $otp_code = $_GET['otp'];
    // $fare = $_GET['fare'];
    $query = "SELECT * FROM medtech_emp WHERE eid='$eid'";
    $result = $con->query($query);
    if($result)
    {
        $rows = $result->fetch_assoc();;
    }

    $order_info_query = "SELECT * FROM medtech_order WHERE eid='$eid'";
    $order_result = $con->query($order_info_query);
    if($order_result)
    {
        $order_rows = $order_result->fetch_assoc();;
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
            <div class="c1"><strong class="attribute1">Name:</strong><?php echo $rows['ename']?></div>
            <div class="c1"><strong class="attribute1">Organization Name:</strong>XYZ</div>
            <div class="c1"><strong class="attribute2">Address:</strong>Name:<?php echo $order_rows['user_book_address']?>
            </div>
            <div class="c1"><strong class="attribute2">Number:</strong>+91-8697921086</div>
            <div class="c1"><strong class="attribute1">E-mail:</strong>rameshroyprl2019@gmail.com</div>
        </div>
        <p id="p1"><u>Other information</u></p>
        <div class="other-details">
            <div class="c2"><strong class="attribute3">Your name:</strong><?php echo $order_rows['name']?></div>
            <div class="c2"><strong class="attribute4">Contact Number:</strong><?php echo $order_rows['contact_number']?></div>
            <div class="c2"><strong class="attribute6">Booking Date and Time</strong><?php echo $order_rows['booking_date']?>| <?php echo $order_rows['booking_time']?>
            </div>
        </div>
        <!-- <p>Go back to <a href="/">Homepage</a></p> -->
        <div class="btns">
            <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/index.php">
                <button class="btn">Go to homepage</button>
            </a>
        </div>
    </div>
</body>

</html>