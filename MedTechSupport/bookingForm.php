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
    $sl_row = $db->select("medtech_order","COUNT(*) AS slno")->fetch_assoc();

    $bill_id = $sl_row['slno']+1;
    $random_no = rand(1000,9999);
    
    $invoice_no = "MEDTECH"."$random_no"."$bill_id";    //unique invoice id generated

    $user_id = $uid;
    $user_name = "$ufname "."$ulname";
    $cur_date = $db->currentDateTime()['date'];
    $cur_time = $db->currentDateTime()['time'];
    $eid= $_GET['eid'];
    $address = $_GET['book_adrs'];
    $distance = $_GET['dist'];
    $book_lat = $_GET['booklat'];
    $book_lon = $_GET['booklon'];
    $ride_status = "Booked";
    //SELECT query from databse class
    $rows = $db->select("medtech_emp","*","eid='$eid'")->fetch_assoc();

    $ename = $rows['ename'];
    $book_amount=500;
    // $amb_type = $rows['amb_type'];
    // $amb_driver = $rows['amb_driver_name'];
    // $amb_name = $rows['amb_name'];
    if(isset($_POST['book_ride']))
    {
        $name = $_POST['name'];
        $contno=$_POST['cont_num'];
        $lmark=$_POST['lmark'];
        // $patient_age = $_POST['pat_age'];
        // $patient_gender = $_POST['gender'];
        // $patient_cont = $_POST['cont_num'];
        //UPDATE method called from Database class
        $update_result = $db->update('medtech_emp',array('e_status'=>'busy'),"eid='$eid'");
        if($update_result)
        {
             //INSERT method called from Database class
            $insert_result = $db->insert('medtech_order',array("$invoice_no","$eid","$user_id","$name","$contno","$book_lat","$book_lon","$address","$lmark","$cur_date","$cur_time","$salary"));
            if($insert_result)
            {
                header("Location:/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/payment/razor_pay.php?eid=$eid&ename=$ename&name=$name&address=$address&billno=$invoice_no&contno=$contno&salary=$book_amount");
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
                <div class="patient_info_cont">
    
                    <form method="post">
                        <label for="">Full Name<sup class="mandatory">*</sup></label>
                        <input type="text" name="name" id="" placeholder="Enter full name"  required>

                        <label for="">Mobile No.<sup class="mandatory">*</sup></label>
                        <input type="tel" name="cont_num" id="" placeholder="Contact number" required>

                        <label for="">Land Mark<sup class="mandatory">*</sup></label>
                        <input type="text" name="lmark" id="" placeholder="Land Mark" required>

                        <label for="">Your Address</label>
                        <textarea type="text" name="" id=""><?php echo $address;?></textarea>
                        <button class="btn" name="book_ride">Confirm</button>
                    </form>
                    <a href="ambulance_booking.php"><button class="btn-danger" name="cancel_ride">Cancel</button></a>
                </div>
            </div>     
        </div>
    </div>
</body>
</html>