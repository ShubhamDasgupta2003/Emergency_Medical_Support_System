<?php
    include_once("config.php");

    $dbname = new Database();
    $conn = $dbname->connect();

    session_start();
?>

<!-- get route feature starts here  -->

<?php


if(isset($_POST['get_route'])){
    // $id=$_GET['hosid'];
    session_start();
    $hosp_id = $_SESSION['id'];
// $sql= "SELECT * FROM `hospital_info` where Id='$hosp_id'";
// $result= mysqli_query($conn,$sql);
// $row=mysqli_fetch_assoc($result);
$sql_hos = $dbname->select("hospital_info","*","Id='$hosp_id'")->fetch_assoc();



$u_id= $_SESSION['user_id'];
// $u_sql="SELECT `lat_in_use`,`long_in_use` FROM `user_info` WHERE user_id='$u_id'";
// $result= mysqli_query($conn,$u_sql);
// $u_row=mysqli_fetch_assoc($result);
$sql_usr = $dbname->select("user_info","lat_in_use,long_in_use","user_id='$u_id'")->fetch_assoc();


$currentlatitude = $sql_usr['lat_in_use'];
$currentlongitude = $sql_usr['long_in_use'];
$destinationlatitude = $sql_hos['Latitude'];
$destinationlongitude = $sql_hos['Longitude'];


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
        <div class="thank-you-message">Your details has been received. Please proceed to the hospital for treatment.
        </div>
        <hr>
        <p id="p1"><u>Hospital information</u></p>
        <div class="hspl-details">
        <?php
            // $id=$_GET['hosid'];
            $hosp_id= $_SESSION['id'];
            // $sql= "SELECT * FROM `hospital_info` where Id='$hosp_id'";
            // $result= mysqli_query($conn,$sql);
            $sql_hos2 = $dbname->select("hospital_info","*","Id='$hosp_id'");
            while($rows=$sql_hos2->fetch_assoc())
            {
                echo"
                <div class='c1'><strong class='attribute1'>Name:</strong>$rows[Name]</div>
            <div class='c1'><strong class='attribute2'>Address:</strong>$rows[Address]</div>
            <div class='c1'><strong class='attribute7'>District:</strong>$rows[District]</div>
            <div class='c1'><strong class='attribute2'>Number:</strong>$rows[ContactNo]</div>
                ";
            }
        ?>
        </div>
        <p id="p1"><u>Other information</u></p>
        <div class="other-details">
                <?php
                    // session_start();

                   $p_id=$_SESSION['p_id'];

                    // $sql="SELECT * FROM `patient_booking_info` where Patient_id = '$p_id'";
                    // $result= mysqli_query($conn,$sql);
                    // while($row=mysqli_fetch_assoc($result))
                    $sql_pnt = $dbname->select("patient_booking_info","*","Patient_id ='$p_id'");
                    while($row=$sql_pnt->fetch_assoc())
                    {
                        // $p= $row[booking_timestamp];
                        // $fourhourafter = $p + 14400;
                        // $deadline_date = date('Y-m-d H:i:s', $fourhourafter);
                        $deadline_date = $_SESSION["deadline_date"];
                        echo "
                        <div class='c2'><strong class='attribute3'>Patient name:</strong>$row[Patient_name]</div>
                        <div class='c2'><strong class='attribute9'>Patient id:</strong>$row[Patient_id]</div>
                <div class='c2'><strong class='attribute8'>Gender:</strong>$row[Gender]</div>
                 <div class='c2'><strong class='attribute4'>Number:</strong>$row[ContactNo]</div>
                 <div class='c2'><strong class='attribute6'>Booking Date & Time:</strong>$row[Booking_date]</div>
                 <div class='c2'><strong class='attribute6'>Deadline Date & Time:</strong>$deadline_date</div>"
                 ;}
                ?>
                <p class = 'notice'>Note: Your bed reservation will automatically canceled if you do not arrive at hospital within four hours of Booking time.</p>
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