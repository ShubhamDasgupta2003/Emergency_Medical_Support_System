<?php

    include_once("config.php");
    session_start();
    if($_SESSION['is_logged_in'] == 0){
        header("refresh:0 ; url=/Minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/login.php");
        echo "<script>alert('Please login before book bed. Press ok to go to login page.')</script>";
    }

    date_default_timezone_set("Asia/Kolkata");
    $query = "SELECT * FROM hospital_info";
    $result = mysqli_query($conn,$query);

    // getting hospitalid(primary key) from url by using get method 
    // $id=$_GET['hospitalid'];
    // $sql= "SELECT * FROM `hospital_info` where Id=$id";
    // $result= mysqli_query($conn,$sql);
?>



<?php

if(isset($_POST['submit'])){
    $name=$_POST["name"];
    $gender=$_POST['gender'];
    $age=$_POST['age'];
    $contact=$_POST['contact'];
    $dob=$_POST['dob'];
    $address2=$_POST['address2'];
    $city=$_POST['city'];
    $pin=$_POST['pin'];
    $bookdatetime= date('Y-m-d H:i:s');


     //Unique user Id generation php code starts here
     $adhr_num = $_POST['adhr_num'];
     $last_4_dig_adhr = substr($adhr_num,-4);
     $last_3_dig_cont = substr($contact,-3);
     $random_dig = rand(1,999);
     $digit = "";
     if($random_dig>=1 && $random_dig<=9)
     {
       $digit = "00"."$random_dig";
     }
     else if($random_dig>=10 && $random_dig<=99)
     {
       $digit = "0"."$random_dig";
     }
     else
     {
       $digit = "$random_dig";
     }
 
     $patient_id = "PNT"."$digit"."$last_3_dig_cont"."$last_4_dig_adhr";
     //Unique user Id generation php code ends here

     session_start();
     $_SESSION['p_id'] = "$patient_id";

     //'storing hospitaal name in patient table accordingly' php code starts here
     $id=$_GET['hospitalid'];
     $sql= "SELECT * FROM `hospital_info` where Id=$id";
     $result= mysqli_query($conn,$sql);
     $row=mysqli_fetch_assoc($result);

    //  available bed updation code starts here 

     $malebed = $row['Male_bed_available'];
     $femalebed = $row['Female_bed_available'];
     if($gender == 'male' ){
        // $malebed = max(0, $malebed - 1);
        $malebed-=1;
        $sql3= "UPDATE `hospital_info` SET Male_bed_available=$malebed WHERE Id=$id";
        $result=mysqli_query($conn,$sql3);
        
     }
     else{
        $femalebed-=1;
        $sql3= "UPDATE `hospital_info` SET Female_bed_available=$femalebed WHERE Id=$id";
        $result=mysqli_query($conn,$sql3);
     }
    //  else($gender == 'female' ){
    //     // $gender = max(0, $gender - 1);
    //     $sql3= "UPDATE `hospital_info` SET Female_bed_available= $row[Female_bed_available] - 1";
    //  }
     
    
      //  available bed updation code ends here 

    //'storing hospitaal name in patient table accordingly' php code ends here


    $sql2="INSERT INTO `patient_booking_info` (Hospital_name,Patient_id,Patient_name,Gender,Age,ContactNo,Dob,address2,City,Pin,Booking_date) VALUES ('$row[Name]','$patient_id','$name','$gender','$age','$contact','$dob','$address2','$city','$pin','$bookdatetime')";
    $result=mysqli_query($conn,$sql2);


    //  echo "$row[Name],$name,$gender,$age,$contact,$dob,$address2,$city,$pin,$bookdatetime,$patient_id";


    header("location:bed_booking_cnfm.php?hosid=$row[Id]");


    // header("location:bed_booking_cnfm.php?hosid=$row[Id]&p_id=$patient_id");

}


?>

    <!-- for send mail to hospital for notify them that a patient booked a bed  -->


    <!-- if(isset($_POST['submit'])){

        // $mailid = $_GET['emailid'];
        // $recp_name = $_GET['name'];
        // $userid = $_GET['userid'];

        $to_email = "sourav97972@gmail.com";//specific hospital email should be here
        $subject = "Bed booked by a patient";
        $body = "a bed is booked for patient.Here is the patient details
        Name: $name
        Contact number : $contact";

        $headers = "From: emergencymedicalservices23@gmail.com";//this email was created for this project

        if (mail($to_email, $subject, $body, $headers)) {
            echo "Email sent ";
        } else {
            echo "Email failed";
        }
    } -->

        <!-- mail code ends here  -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/form_book.css" />
</head>

<body>
    <section class="container">
        <header>
            <div class="parent">
                <div class="logo">
                    <img src="image/logo.png" alt="logo" width="100px">
                </div>
                <div class="info" style="line-height: 18px; text-align: right; padding-top: 24px;">

                    <?php

                        // getting hospitalid(primary key) from url by using get method 
                        $id=$_GET['hospitalid'];
                        $sql= "SELECT * FROM `hospital_info` where Id=$id";
                        $result= mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_assoc($result)){

                        echo "<div style='font-size: 12pt;'><strong>$row[Name]</strong></div>
                        <div style='font-size: 10pt;'>&nbsp;$row[Address]</div>
                        <div style='line-height: 14px;'>
                        <div style='font-size: 9pt;'>$row[District]</div>
                        <div style='font-size: 9pt;'>$row[ContactNo]</div>
                    </div>";}
                    ?>
                </div>
            </div>
        </header>
        <div class="line">
            <hr>
        </div>
        <div>
            <form method="post" class="form">
                <div class="input-box">
                    <label>Patient's Full Name</label>
                    <input type="text" name="name" placeholder="Enter full name" required />
                </div>
                <div class="gender-box">
                    <lable>Gender</lable>
                    <div class="gender-option">
                        <div class="gender">
                            <input type="radio" id="check-male" name="gender" value="male" checked />
                            <label for="check-male">
                                <pre>    male</pre>
                            </label>
                        </div>
                        <div class="gender">
                            <input type="radio" id="check-female" name="gender" value="Female" />
                            <label for="check-female">
                                <pre>    Female</pre>
                            </label>
                        </div>
                        <!-- use strong password showing because of this -> starts here  -->
                        <div class="input-box" id="age">
                            <label>Age</label>
                            <input type="number" name="age" placeholder="Enter age" required />
                        </div>
                        <!-- use strong password showing because of this -> ends here  -->
                        <div class="column">
                            <div class="input-box">
                                <label>Phone Number</label>
                                <input type="number" name="contact" placeholder="Enter phone number" required />
                            </div>
                            <div class="input-box">
                                <label>Birth Date</label>
                                <input type="date" name="dob" placeholder="Enter birth date" required />
                            </div>
                        </div>
                    </div>
                    <div class="input-box" id="age">
                            <label>Aadhaar card</label>
                            <input type="number" name="adhr_num" placeholder="Enter aadhaar card number" required />
                        </div>
                </div>
                <div class="input-box address">
                    <label>Address</label>
                    <input type="text" name="address2" placeholder="Enter street address" required />
                    <div class="column">
                        <div class="select-box">
                            <select>
                                <option hidden>District</option>
                                <option>Alipurduar</option>
                                <option>Bankura</option>
                                <option>Birbhum</option>
                                <option>Cooch Behar</option>
                                <option>Dakshin Dinajpur</option>
                                <option>Darjeeling</option>
                                <option>Hooghly</option>
                                <option>Howrah</option>
                                <option>Jalpaiguri</option>
                                <option>Jhargram</option>
                                <option>Kalimpong</option>
                                <option>Kolkata</option>
                                <option>Malda</option>
                                <option>Murshidabad</option>
                                <option>Nadia</option>
                                <option>North 24 Parganas</option>
                                <option>Paschim Bardhaman</option>
                                <option>Paschim Medinipur</option>
                                <option>Purba Bardhaman</option>
                                <option>Purba Medinipur</option>
                                <option>Purulia</option>
                                <option>South 24 Parganas</option>
                                <option>Uttar Dinajpur</option>
                            </select>
                        </div>
                        <input type="text" name="city" placeholder="Enter your city" required />
                    </div>
                    <div class="column">
                        <input type="number" name="pin" placeholder="Enter postal code" required />
                    </div>
                    <!-- only change in input id "check-male to pay-yes"&"gender to pay" for payment section -->


                    <!-- the below option is temporarily not in use  -->


                    <!-- <div class="gender-box">
                        <lable>Types of Bed</lable>
                        <div class="gender-option">
                            <div class="gender">
                                <input type="radio" id="pay-yes" name="pay" checked />
                                <label for="pay-yes">
                                    <pre>    General ward</pre>
                                </label>
                            </div>
                            <div class="gender">
                                <input type="radio" id="pay-no" name="pay" />
                                <label for="pay-no">
                                    <pre>    Private room</pre>
                                </label>
                            </div>
                            <div class="gender">
                                <input type="radio" id="pay-no2" name="pay" />
                                <label for="pay-no2">
                                    <pre>    ICU</pre>
                                </label>
                            </div> -->
                            <a href=""><button type="submit" name="submit">Submit</button></a>
                        </div>
            </form>
        </div>
    </section>
</body>

</html>