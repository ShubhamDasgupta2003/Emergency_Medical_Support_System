<?php

  include_once("config.php");
  $db = new Database();
  $conn = $db->connect();
//   date_default_timezone_set("Asia/calcutta");


  $is_refreshed = @$_GET['refresh'];
  if($is_refreshed==1)
  {
    $lat = number_format($_COOKIE["cur_lat"],7,".","");
    $lon = number_format($_COOKIE["cur_lon"],7,".","");
    $address = $_COOKIE['cur_addrss'];
  }
  else
  {
    header("Refresh: 2; url=hospital_register.php?refresh=1");
  }

  // echo"$lat<br>$lon<br>$address";

  if(isset($_POST['register_hosp']))
  {
    $name = $_POST['name'];
    $email = $_POST['email_id'];
    $cont_num = $_POST['contact_num'];
    $address = $_POST['address'];
    $district = $_POST['district'];
    $city_town = $_POST['city-vill'];
    $state = $_POST['state'];
    $postcode = $_POST['post_code'];
    $m_bed_avail = $_POST['malebed'];
    $f_bed_avail = $_POST['femalebed'];
    $password = password_hash($_POST['pswd'],PASSWORD_DEFAULT);
    // $cur_timestamp = date("l jS \of F Y h:i:s A");

    //Unique hpspital Id generation php code starts here

    // $aadhaar_card_num = $_POST['id_num'];
    // $last_4_dig_adhr = substr($aadhaar_card_num,-4);
    $last_3_dig_cont = substr($cont_num,-3);
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

    $hosp_id = "HSP"."$digit"."$last_3_dig_cont";  //generated hospital id

    //Unique hospital Id generation php code ends here

    $check_dup_reg = "SELECT * FROM hospital_info WHERE email='$email' OR ContactNo='$cont_num'";

    $insert_records ="INSERT INTO `hospital_info` (`Id`, `Name`,`ContactNo`,`email`,`password`,`Address`, `State`, `District`, `City`, `Pincode`, `Latitude`, `Longitude`,`Male_bed_available`,`Female_bed_available`)VALUES('$hosp_id','$name',$cont_num,'$email','$password','$address','$state','$district','$city_town',$postcode,$lat,$lon,$m_bed_avail,$f_bed_avail)";

    $result = mysqli_query($conn,$check_dup_reg);
    $rows = mysqli_num_rows($result);

    if(strlen($cont_num) != 10) //validating mobile number
    {
      echo "<script>alert('Please enter a valid mobile number')</script>";
    }
    else if(strlen($password)<5)
    {
      echo "<script>alert('Password should be minimum of 5 characters')</script>";
    }
    else if($rows>=1)
    {
      echo "<script>alert('email-id or mobile number is already registered with us')</script>";
    }
    else
    {
      $result =mysqli_query($conn,$insert_records);
      if($result)
      {
        echo "<script>alert('Successfully Registered')</script>";
        // header("Location:verification_email.php?emailid=$email&name=$fname&userid=$user_id");
        header("Location:\Minor Project 5th_Sem\Emergency_Medical_Support_System\HomePage\index.php");
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!--<title>Registration Form in HTML CSS</title>-->
    <!---Custom CSS File--->
    <link rel="stylesheet" href="css/hosp_register.css" />
  </head>
  <body>
    <section class="container">
      <div class="title-bar">
        <img src="\Minor Project 5th_Sem\Emergency_Medical_Support_System\HomePage\images\logo.png" alt="logo" width="70px">
        <header>Hospital Registration Form</header>
      </div>
      <form class="form" method="post">
        <div class="column">
          <div class="input-box">
            <label>Hospital Name</label>
            <input name="name" type="text" placeholder="Enter the hospital name" required/>
          </div>

          <!-- <div class="input-box">
            <label>Last Name</label>
            <input name="lname" type="text" placeholder="Enter your last name" required />
          </div> -->
        </div>
        <div class="input-box">
          <label>Email Address</label>
          <input name="email_id" type="text" placeholder="Enter email address" required />
        </div>

        <div class="column">
          <div class="input-box">
            <label>Phone Number</label>
            <input name="contact_num" type="number" placeholder="Enter phone number" required minlength="10" maxlength="10"/>
          </div>
          <!-- <div class="input-box">
            <label>Date of Birth</label>
            <input name="dob" id="dtpick" type="date" placeholder="Enter birth date" required/>
          </div> -->
        </div>
        <!-- <div class="column">
            <div class="input-box">
                <label>ID Card Type</label>
                <input type="text" placeholder="Enter ID type" required />
            </div>
            <div class="input-box">
                <label>ID Number</label>
                <input name="id_num" type="number" placeholder="Enter ID number (Aadhaar/Voter)" required />
            </div>
        </div> -->
        <!-- <div class="gender-box">
          <h3>Gender</h3>
          <div class="gender-option">
            <div class="gender">
              <input type="radio" id="check-male" name="gender" checked value="male"/>
              <label for="check-male">male</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-female" name="gender" value="female"/>
              <label for="check-female">Female</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-other" name="gender" value="others"/>
              <label for="check-other">others</label>
            </div>
          </div>
        </div> -->
        <div class="input-box">
          <label>Address</label>
          <input name="address" type="text" placeholder="Enter hospital address" required />
        </div>
        <div class="input-box address">
          <label>Other details</label>
          <div class="column">
            <div class="select-box" >
                <select name="district">
                <option value="" selected disabled>Select District</option >
                <?php
                    $res= $db->select('districts',"*",'','');
                    while($row=$res->fetch_assoc()){
                    echo"
                    <option value=$row[value]>$row[name]</option>";
                    }?>
                </select>
            </div>
            <input type="text" placeholder="Enter the city / village" required name="city-vill">
          </div>
          <div class="column">
            <input type="text" placeholder="Enter the state" required name="state"/>
            <input type="number" placeholder="Enter postal code" required name="post_code"/>
          </div>
          <div class="column">
            <input type="number" placeholder="Enter male bed available" required name="malebed"/>
            <input type="number" placeholder="Enter female bed available" required name="femalebed"/>
          </div>
        </div>
        <div class="column">
            <div class="input-box">
                <label>Password</label>
                <input id="pswd" type="password" placeholder="Enter your password" required />
            </div>
            <div class="input-box">
                <label>Confirm Password</label>
                <input id="cnf-pswd"type="text" placeholder="Confirm your password" name ="pswd" required />
            </div>
        </div>
        <button id="sbmt-form" name="register_hosp">Register</button>
      </form>
    </section>
    <script src="js/hosp_register.js"></script>
    <script src="js/location_hosp_reg.js"></script>
  </body>
</html>