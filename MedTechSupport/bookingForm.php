<?php
    include_once("db_config/main_config.php");

    $db = new Database();
    $con = $db->connect();

    session_start();
    $uid =  $_SESSION['user_id'];
    $ufname =  $_SESSION['user_fname'];
    $ulname = $_SESSION['user_lname'];

    $db->isLoggedIn($_SESSION['is_logged_in']);

    date_default_timezone_set("Asia/calcutta");

    $otp_code = rand(1111,9999);  //Generating random otp code

    // SELECT method from database class
    $sl_row = $db->select("user_ambulance","COUNT(*) AS slno")->fetch_assoc();

    $bill_id = $sl_row['slno']+1;
    $random_no = rand(1000,9999);
    
    $invoice_no = "AMB-INV-"."$random_no"."$bill_id";    //unique invoice id generated

    $user_id = $uid;
    $user_name = "$ufname "."$ulname";
    $cur_date = $db->currentDateTime()['date'];
    $cur_time = $db->currentDateTime()['time'];
    $eid= $_GET['eid'];
    $pickup = $_GET['book_adrs'];
    $distance = $_GET['dist'];
    $book_lat = $_GET['booklat'];
    $book_lon = $_GET['booklon'];
    $ride_status = "Booked";
    //SELECT query from databse class
    $rows = $db->select("emp_medtech","*","eid='$eid'")->fetch_assoc();

    $ename = $rows['ename'];
    // $amb_type = $rows['amb_type'];
    // $amb_driver = $rows['amb_driver_name'];
    // $amb_name = $rows['amb_name'];
    if(isset($_POST['book_ride']))
    {
        $patient_name = $_POST['pat_name'];
        $patient_age = $_POST['pat_age'];
        $patient_gender = $_POST['gender'];
        $patient_cont = $_POST['cont_num'];
        //UPDATE method called from Database class
        $update_result = $db->update('emp_medtech',array('e_status'=>'busy'),"eid='$eid'");
        if($update_result)
        {
             //INSERT method called from Database class
            $insert_result = $db->insert('order_medtech',array("$invoice_no","$amb_no","$amb_type","$user_id","$user_name","$patient_name","$patient_age","$patient_gender","$patient_cont","$book_lat","$book_lon","$pickup","$cur_date","$cur_time","$tot_fare","$ride_status",$otp_code,$distance));
            if($insert_result)
            {
                header("Location:amb_invoice_mail.php?ambno=$amb_no&ambname=$amb_name&driver=$amb_driver&fare=$tot_fare&dist=$distance&billno=$invoice_no&otp=$otp_code");
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
            <img src="images/employee.png" alt="">
            <div class="column">
                <!-- <?php
                    $amb_fare = $distance * $rows['amb_rate'];
                    echo "<div class='amb_info_cont'>
                    <h1 class='descp' id='title'>$rows[amb_name]</h1>
                    <h3><p class='descp' id='card-address'><i class='fa-solid fa-location-dot'></i> $rows[amb_state] $rows[amb_district] $rows[amb_town]</p></h3>
                    <h3><p class='descp' id='card-type'>$rows[amb_type]</p></h3>
                    <h2><p class='descp' id='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i>&nbsp&nbsp$distance km</p></h2>
                    <h2 class='descp' id='card-fare'>&#8377 $tot_fare/- per Hr</h2>
                    </div>";
                ?>  -->
                <div class="patient_info_cont">
    
                    <form method="post">
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
                    <a href="ambulance_booking.php"><button class="btn-danger" name="cancel_ride">Cancel Ride</button></a>
                </div>
            </div>     
        </div>
    </div>
</body>
</html>