<?php
    include_once("Backend/config.php");
    session_start();

    $id=$_SESSION['bank_id'];
    // echo $id;
    
    // $id=$_SESSION['bank_id'];
    $sql1= "SELECT * FROM `blood_order` where bloodbank_id='$id'";
    $result1= mysqli_query($con,$sql1);
    $row1=mysqli_fetch_assoc($result1);
    // print_r($row1);
    $patient_name=$row1['Patient_name'];
    $Order_bloodgr=$row1['Blood_gr'];
    $Order_date=$row1['Order_date'];
    $Order_id=$row1['Order_id'];
    $Order_time=$row1['Order_time'];
    $Order_price=$row1['price'];

    $sql2= "SELECT * FROM `blood_bank` where blood_bank_id='$id'";
    $result2= mysqli_query($con,$sql2);
    $row2=mysqli_fetch_assoc($result2);
    $Bloodbank_name=$row2['name'];

    $mailid = $_SESSION['user_email'];
    $recp_name = $_SESSION['user_fname'].$_SESSION['user_lname'];
    $userid = $_SESSION['user_id'];
    
    
    
    $to_email = "$mailid";      //the receiver email will be used here
    $subject = "Blood Booking Confirmation";
$body = "Hi $recp_name,
Thank you for choosing our service! We're grateful for your trust and business.
Your satisfaction is our priority, and we look forward to serving you again soon.

The following is your Blood booking details:
Your invoice no: $Order_id
Blood Bank: $Bloodbank_name
Your subtotal amount is: Rs $Order_price /-

Please get your blood from the blood bank just showing your invoice number.

Regards,
Emergency Medical Support System";
    
    
    
    $headers = "From: emergencymedicalservices23@gmail.com";//this email was created for this project
    if (mail($to_email, $subject, $body, $headers)) {

        echo "";
        
    }
    
    if(isset($_POST['get_route'])){
    $sql= "SELECT * FROM `blood_bank` where blood_bank_id='$id'";
    $result= mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    
    
    
    $u_id= $_SESSION['user_id'];
    $u_sql="SELECT `lat_in_use`,`long_in_use` FROM `user_info` WHERE user_id='$u_id'";
    $result= mysqli_query($con,$u_sql);
    $u_row=mysqli_fetch_assoc($result);
    
    
    $currentlatitude = $u_row['lat_in_use'];
    $currentlongitude = $u_row['long_in_use'];
    $destinationlatitude = $row['latitude'];
    $destinationlongitude = $row['longitude'];
    
    
    
    // Code for sending confirmation mail to the user
    // $otp_code = rand(1111,9999);    //generating otp for verification email
    
    
    $googleMapsURL = "https://www.google.com/maps/dir/?api=1&origin={$currentlatitude},{$currentlongitude}&destination={$destinationlatitude},{$destinationlongitude}&travelmode=driving";
    header("Location: $googleMapsURL");
    }else{
        echo "<script><alert>geolocation not available for this browser.</alert></script>";
    }
    
    
    
    ?>
    
    <!-- get route feature ends here  -->
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link rel="stylesheet" href="css/confirmation.css">
        <title>Confirmation | Thank you</title>
    </head>
    
    <body>
        <div class="container">
            <h2 id="cnfm-msg"><i class="fa-solid fa-circle-check fa-bounce fa-2xl" style="color: #00a896;"></i>
                &nbsp;Booking Confirmed!</h2>
            <div class="thank-you-message">Your details has been received. Kindly proceed to the blood bank to collect the required blood."</div>
            <hr>
            <p id="p1"><u>Blood Bank information</u></p>
            <div class="hspl-details">
            <?php
                $id=$_SESSION['bank_id'];
                $sql= "SELECT * FROM `blood_bank` where blood_bank_id='$id'";
                $result= mysqli_query($con,$sql);
                while($row=mysqli_fetch_assoc($result)){
                    echo"
                    <div class='c1'><strong class='attribute1'>Name:</strong>$row[name]</div>
                <div class='c1'> <strong class='attribute2'>Address:</strong>$row[state] $row[dist] $row[city]</div>
                <div class='c1'><strong class='attribute7'>District:</strong>$row[dist]</div>
                <div class='c1'><strong class='attribute2'>Number:</strong>$row[phone]</div>
                    ";
                }
            ?>
            </div>
            <p id="p1"><u>Other information</u></p>
            <div class="other-details">
                    <?php
                        $order_id=$_GET['order_id'];
                    //    session_start();
                    //    $order_id=$_SESSION['blood_order_id'];
                    //    echo "$order_id";
                       $sql="SELECT * FROM `blood_order` WHERE order_id='$order_id'";
                       $result= mysqli_query($con,$sql);
                       while($row=mysqli_fetch_assoc($result)){
                            
                           echo "<div class='c2'><strong class='attribute3'>Patient name:</strong>$row[Patient_name]</div>
                              <div class='c2'><strong class='attributebg'>Blood group:</strong>$row[Blood_gr]</div>
                              <div class='c2'><strong class='attribute4'>Number:</strong>$row[Contact_No]</div>
                              <div class='c2'><strong class='attribute6'>Booking Date & Time:</strong>$row[Order_date]</div>"
                               ;
                       }
                    ?>
    
            </div>
            <!-- <p>Go back to <a href="/">Homepage</a></p> -->
            <div class="btns">
                <form method="post"><button name="get_route" class="btn">get route</button></form>
                <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/">
                    <button class="btn">go to homepage</button>
                </a>
            </div>
        </div>
    </body>
    
    </html>