<?php
    include_once("config.php");
    

?>

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
            $id=$_GET['hosid'];
            $sql= "SELECT * FROM `hospital_info` where Id=$id";
            $result= mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result)){
                echo"
                <div class='c1'><strong class='attribute1'>Name:</strong>$row[Name]</div>
            <div class='c1'><strong class='attribute2'>Address:</strong>$row[Address]</div>
            <div class='c1'><strong class='attribute7'>District:</strong>$row[District]</div>
            <div class='c1'><strong class='attribute2'>Number:</strong>$row[ContactNo]</div>
                ";
            }
        ?>
            <!-- <div class="c1"><strong class="attribute1">Name:</strong>Naihati Matri Sadan Municipal Hospital</div>
            <div class="c1"><strong class="attribute2">Address:</strong>6, Rishi Bankim Chandra Road, Naihati, West
                Bengal
                743165
            </div>
            <div class="c1"><strong class="attribute2">District:</strong>+91-8697921086</div>
            <div class="c1"><strong class="attribute2">Number:</strong>sourav97972@gmail.com</div> -->
        </div>
        <p id="p1"><u>Other information</u></p>
        <div class="other-details">

        
            <!-- $p_id=$_GET['p_id'];
            $sql3= "SELECT * FROM `patient_booking_info` where Patient_id=$p_id";
            $result= mysqli_query($conn,$sql3);
            while($row=mysqli_fetch_assoc($result)){
                echo "
                <div class=c2><strong class=attribute3>Patient name:</strong>$row[Patient_name]</div>
                <div class='c2'><strong class='attribute4'>Gender:</strong>$row[Gender]</div>
                <div class='c2'><strong class='attribute4'>Number:</strong>$row[ContactNo]</div>
                // <div class='c2'><strong class='attribute5'>Type of Bed:</strong>General ward</div>
                <div class='c2'><strong class='attribute6'>Booking Date & Time:</strong>$row[Booking_date]</div>"
            ;} -->

                <!-- php tag  -->
                    <!-- session_start();

                   $p_id=$_SESSION['p_id'];

                    $sql="SELECT * FROM `patient_booking_info` where Patient_id = $p_id";
                    $result= mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($result)){
                        echo "
                        <div class='c2'><strong class='attribute3'>Patient name:</strong>$row[Patient_name]</div>
            <div class='c2'><strong class='attribute4'>Gender:</strong>Male</div>
            <div class='c2'><strong class='attribute4'>Number:</strong>8697921086</div>
            <div class='c2'><strong class='attribute6'>Booking Date & Time:</strong>10.09.2023 | 12:12 pm
            </div>
                        "
                    ;} -->
                <!-- php tag end  -->




            <!-- <div class="c2"><strong class="attribute3">Patient name:</strong>Sourav paul</div>
            <div class="c2"><strong class="attribute4">Gender:</strong>Male</div>
            <div class="c2"><strong class="attribute4">Number:</strong>8697921086</div>
            <div class="c2"><strong class="attribute5">Type of Bed:</strong>General ward</div>
            <div class="c2"><strong class="attribute6">Booking Date & Time:</strong>10.09.2023 | 12:12 pm
            </div> -->
        </div>
        <!-- <p>Go back to <a href="/">Homepage</a></p> -->
        <div class="btns">
            <button class="btn">get route</button>
            <a href="/HomePage/index.html">
                <button class="btn">go to homepage</button>
            </a>
        </div>
    </div>
</body>

</html>