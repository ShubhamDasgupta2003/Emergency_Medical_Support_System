<?php
    //TO DO : Update query to set status busy when amb book_ride

    session_start();
    $uid =  $_SESSION['user_id'];
    $ufname =  $_SESSION['user_fname'];
    $ulname = $_SESSION['user_lname'];
    $islogin =  $_SESSION['is_logged_in'];

    if($islogin!=1)
    {
        echo "<script>alert('It seems like you have not logged in\\nPlease login to book your ride');
        window.location.href = '/minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/login.php'</script>";
    }

    include_once("db_config/main_config.php");
    date_default_timezone_set("Asia/calcutta");

    $slno_query = "SELECT COUNT(*) AS slno FROM user_ambulance";
    $slno_result = mysqli_query($con,$slno_query);
    if($slno_result)
    {
        $sl_row = $slno_result->fetch_assoc();
    }

    $bill_id = $sl_row['slno']+1;
    $random_no = rand(1000,9999);
    
    $invoice_no = "AMB-INV-"."$random_no"."$bill_id";    //unique invoice id generated

    $user_id = $uid;
    $user_name = "$ufname "."$ulname";
    $cur_date = date("Y-m-d");
    $cur_time = date("H:i:s");
    $amb_no = $_GET['ambno'];
    $pickup = $_GET['book_adrs'];
    $distance = $_GET['dist'];
    $book_lat = $_GET['booklat'];
    $book_lon = $_GET['booklon'];
    $tot_fare = $_GET['amb_fare'];
    // echo $pickup;

    $query = "SELECT * FROM ambulance_info WHERE amb_no='$amb_no'";

    $result = mysqli_query($con,$query);
    if($result)
    {
        $rows = $result->fetch_assoc();
    }
    $amb_rate = $rows['amb_rate'];
    $amb_type = $rows['amb_type'];
    $amb_driver = $rows['amb_driver_name'];
    $amb_name = $rows['amb_name'];
    if(isset($_POST['book_ride']))
    {
        $patient_name = $_POST['pat_name'];
        $patient_age = $_POST['pat_age'];
        $patient_gender = $_POST['gender'];

        $book_ride_query = "INSERT INTO `user_ambulance`(`invoice_no`, `amb_no`, `amb_type`, `user_id`, `user_name`, `patient_name`, `patient_age`, `patient_gender`, `user_book_lat`, `user_book_long`, `booking_date`, `booking_time`, `total_fare`) VALUES ('$invoice_no','$amb_no','$amb_type','$user_id','$user_name','$patient_name','$patient_age','$patient_gender','$book_lat','$book_lon','$cur_date','$cur_time','$tot_fare')";

        $amb_stat_update_query = "UPDATE ambulance_info SET amb_status='busy' WHERE amb_no='$amb_no'";

        $update_result = mysqli_query($con,$amb_stat_update_query);
        if($update_result)
        {
            $insert_result = mysqli_query($con,$book_ride_query);
            if($insert_result)
            {
                header("Location:amb_invoice_mail.php?ambno=$amb_no&ambname=$amb_name&driver=$amb_driver&fare=$tot_fare&dist=$distance&billno=$invoice_no");
            }
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/amb_form_booking.css">
    <link rel="stylesheet" href="css/navlink.css">

</head>
<body>
    <div class="container">
        <div class="card">
            <img src="https://maishacare.com/wp-content/uploads/2022/06/ambulance-service-van-emergency-medical-vehicle-vector-illustration-white-background-ambulance-service-van-emergency-medical-127018462.jpg" alt="">
            <div class="column">
                <?php
                    $amb_fare = $distance * $rows['amb_rate'];
                    echo "<div class='amb_info_cont'>
                    <h1 class='descp' id='title'>$rows[amb_name]</h1>
                    <h3><p class='descp' id='card-address'><i class='fa-solid fa-location-dot'></i> $rows[amb_state] $rows[amb_district] $rows[amb_town]</p></h3>
                    <h3><p class='descp' id='card-type'>$rows[amb_type]</p></h3>
                    <h2><p class='descp' id='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i>&nbsp&nbsp$distance km</p></h2>
                    <h2 class='descp' id='card-fare'>&#8377 $tot_fare/-</h2>
                    </div>";
                ?>
                <div class="patient_info_cont">
    
                    <form method="post" action="book_data_Insert.php">
                        <label for="">Patient's Full Name<sup class="mandatory">*</sup></label>
                        <input type="text" name="pat_name" id="" placeholder="Enter Patient's full name"  required>

                        <label for="">Age<sup class="mandatory">*</sup></label>
                        <input type="number" name="pat_age" id="" placeholder="Patient's age" required>

                        <label for="">Mobile No.<sup class="mandatory">*</sup></label>
                        <input type="tel" name="cont_num" id="" placeholder="Contact number" required>

                        <label for="">Gender<sup class="mandatory">*</sup></label>
                        <div class="row">
                            <input type="radio" name="gender" value="male"> Male
                            <input type="radio" name="gender" value="female"> Female
                        </div>
                        <label for="">Pickup Address</label>
                        <textarea type="text" name="" id="" readonly><?php echo $pickup;?></textarea>
                        <button class="btn" name="book_ride">Confirm Ride</button>
                    </form>
                    <a href="bloodB.php"><button class="btn-danger" name="cancel_ride">Cancel Ride</button></a>
                </div>
            </div>     
        </div>
    </div>
</body>
</html>