<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Registration Form</title>
    <link rel="stylesheet" href="css/register_form.css">
</head>
<body>
    <div class="container">
        <form action="" method="post">
        <div class="title">
            Employee Registration Form
        </div>
        <div class="form">
            <div class="input_field">
                <label>Employee Full Name:</label>
                <input type="text" class="input" name="ename">
            </div>
            <div class="input_field">
                <label>Gender:</label>
                <div class="selectbox">
                    <select name="emp_gender">
                        <option>Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
            </div>
            <div class="input_field">
                <label>Email:</label>
                <input type="text" class="input" name="emp_email">
            </div>
            <div class="input_field">
                <label>Contact Number:</label>
                <input type="text" class="input" name="emp_contno">
            </div>
            <div class="input_field">
                <label>Salary</label>
                <input type="number" class="input" name="salary">
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

date_default_timezone_set("Asia/calcutta");
session_start();
if($_SESSION['is_adm_login']!=1)
    {
        echo "<script>alert('Please Login to continue!');
        window.location.href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/adminlogin.php';</script>";

    }



    $hos_id= $_SESSION['adm_hos_id'];
    
$sql=$db->select('medtech_org','*',"org_id='$hos_id'")->fetch_assoc();

// SELECT method from database class
$sl_row = $db->select("medtech_emp","COUNT(*) AS slno")->fetch_assoc();
$bill_id = $sl_row['slno']+1;
$type=$sql['org_type'];
$random_no = rand(1000,9999);
$eid = "$type"."$random_no"."$bill_id";//unique id generated
$status="free";

if(isset($_POST['register'])){
    $ename=$_POST['ename'];
    $emp_gender=$_POST['emp_gender'];
    $emp_email=$_POST['emp_email'];
    $emp_contno=$_POST['emp_contno'];
    $salary=$_POST['salary'];
    
   $insert_result = $db->insert('medtech_emp', array(
    $hos_id,
    $eid,
    $ename,
    $emp_gender,
    $emp_email,
    $emp_contno,
    $status,
    $salary
));
   if($insert_result){
    echo "<script>alert('Data Insert Sucessfull!');</script>";
    header("Location:/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/MedTechSupport/medtech_org_admin.php");;
    }
}
?>