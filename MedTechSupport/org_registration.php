<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registation Form</title>
    <link rel="stylesheet" href="css/register_form.css">
</head>
<body>
    <div class="container">
        <form action="" method="post">
        <div class="title">
            Registration Form
        </div>
        <div class="form">
            <div class="input_field">
                <label>Organisation Name:</label>
                <input type="text" class="input" name="org_name">
            </div>
            <div class="input_field">
                <label>Email:</label>
                <input type="text" class="input" name="org_email">
            </div>
            <div class="input_field">
                <label>Password:</label>
                <input type="text" class="input" name="org_password">
            </div>
            <div class="input_field">
                <label>Latitude:</label>
                <input type="text" class="input" name="org_lat">
            </div>
            <div class="input_field">
                <label>Longitude:</label>
                <input type="text" class="input" name="org_long">
            </div>
            <div class="input_field">
                <label>Vill/Town:</label>
                <input type="text" class="input" name="org_vill_or_town">
            </div>
            <div class="input_field">
                <label>Post Office:</label>
                <input type="text" class="input" name="org_po">
            </div>
            <div class="input_field">
                <label>District:</label>
                <input type="text" class="input" name="org_dist">
            </div>
            <div class="input_field">
                <label>PIN Code:</label>
                <input type="text" class="input" name="org_pin">
            </div>
            <div class="input_field">
                <label>State:</label>
                <input type="text" class="input" name="org_state">
            </div>
            <div class="input_field">
                <label>land Mark:</label>
                <input type="text" class="input" name="org_lmark">
            </div>
            <div class="input_field">
                <label>Contact Number 1:</label>
                <input type="text" class="input" name="org_contno1">
            </div>
            <div class="input_field">
                <label>Contact Number 2:</label>
                <input type="text" class="input" name="org_contno2">
            </div>
            <div class="input_field">
                <label>Contact Number 3:</label>
                <input type="text" class="input" name="org_contno3">
            </div>
            <div class="input_field">
                <label>Organisation Type:</label>
                <div class="selectbox">
                    <select name="org_type">
                        <option>Select</option>
                        <option value="A">Aya</option>
                        <option value="N">Nurse</option>
                        <option value="MT">Technician</option>
                    </select>
                </div>
            </div>
            <div class="input_field terms">
                <label class="check">
                    <input type="checkbox">
                </label>
                <p>Agree to terms and conditions</p>
            </div>
            <div class="input_field">
                <input type="submit"  value="Register" class="btn" name="register">
            </div>
        </form>
        </div>
    </div>
</body>
</html>
<?php
include_once("db_config/main_config.php");

$db = new Database();   //Creating object of Databse class
$con = $db->connect(); //Calling connect() method
// session_start();
// $uid =  $_SESSION['user_id'];
// $ufname =  $_SESSION['user_fname'];
// $ulname = $_SESSION['user_lname'];

//$db->isLoggedIn($_SESSION['is_logged_in']);

date_default_timezone_set("Asia/calcutta");

// SELECT method from database class
$sl_row = $db->select("medtech_org","COUNT(*) AS slno")->fetch_assoc();

$bill_id = $sl_row['slno']+1;
$org_id = "O"."$bill_id";//unique invoice id generated
$cur_date = $db->currentDateTime()['date'];
$cur_time = $db->currentDateTime()['time'];

if(isset($_POST['register'])){
    $org_name=$_POST['org_name'];
    $org_email=$_POST['org_email'];
    $org_password=password_hash($_POST['org_password'],PASSWORD_DEFAULT);;
    $org_lat=$_POST['org_lat'];
    $org_long=$_POST['org_long'];
    $org_vill_or_town=$_POST['org_vill_or_town'];
    $org_po=$_POST['org_po'];
    $org_dist=$_POST['org_dist'];
    $org_pin=$_POST['org_pin'];
    $org_state=$_POST['org_state'];
    $org_lmark=$_POST['org_lmark'];
    $org_contno1=$_POST['org_contno1'];
    $org_contno2=$_POST['org_contno2'];
    $org_contno3=$_POST['org_contno3'];
    $org_type=$_POST['org_type'];
   // $insert_result = $db->insert('medtech_org',array('$org_id','$org_name','$org_email','$org_password','$org_lat','$org_long','$org_vill_or_town','$org_po','$org_dist','$org_pin','$org_state',$org_lmark,$org_contno1,$org_contno1,$org_contno2,$org_contno3,$cur_date,$cur_time));
   $insert_result = $db->insert('medtech_org', array(
    $org_id,
    $org_name,
    $org_email,
    $org_password,
    $org_lat,
    $org_long,
    $org_vill_or_town,
    $org_po,
    $org_dist,
    $org_pin,
    $org_state,
    $org_lmark,
    $org_contno1,
    $org_contno1,
    $org_contno2,
    $org_contno3,
    $cur_date,
    $cur_time
));
   if($insert_result){
        echo "Data Insert Sucessfull";
    }
}