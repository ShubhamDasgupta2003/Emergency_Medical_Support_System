<?php
  include_once("db_config/main_config.php");

  $lat = $_COOKIE["lat"];
  $lon = $_COOKIE["lon"];
  // echo"$lat<br>$lon";

  if(isset($_POST['register_user']))
  {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email_id'];
    $cont_num = $_POST['contact_num'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $district = $_POST['district'];
    $city_town = $_POST['city-vill'];
    $state = $_POST['state'];
    $postcode = $_POST['post_code'];
    $password = password_hash($_POST['pswd'],PASSWORD_DEFAULT);
    
    //Unique user Id generation php code starts here
    $aadhaar_card_num = $_POST['id_num'];
    $last_4_dig_adhr = substr($aadhaar_card_num,-4);
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

    $user_id = "USR"."$digit"."$last_3_dig_cont"."$last_4_dig_adhr";
    //Unique user Id generation php code ends here
    
    echo "$fname <br> $lname <br> $email <br> $cont_num <br> $dob <br> $gender <br> $district <br> $city_town <br> $state <br> $postcode <br> $password<br>$user_id<br>";
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
    <link rel="stylesheet" href="css/signup.css" />
  </head>
  <body>
    <section class="container">
      <div class="title-bar">
        <img src="logo.png" alt="logo" width="70px">
        <header>New User Registration Form</header>
      </div>
      <form class="form" method="post">
        <div class="column">
          <div class="input-box">
            <label>First Name</label>
            <input name="fname" type="text" placeholder="Enter your first name" required />
          </div>

          <div class="input-box">
            <label>Last Name</label>
            <input name="lname" type="text" placeholder="Enter your last name" required />
          </div>
        </div>
        <div class="input-box">
          <label>Email Address</label>
          <input name="email_id" type="text" placeholder="Enter email address" required />
        </div>

        <div class="column">
          <div class="input-box">
            <label>Phone Number</label>
            <input name="contact_num" type="number" placeholder="Enter phone number" required />
          </div>
          <div class="input-box">
            <label>Date of Birth</label>
            <input name="dob" id="dtpick" type="date" placeholder="Enter birth date" required />
          </div>
        </div>
        <div class="column">
            <div class="input-box">
                <label>ID Card Type</label>
                <input type="text" placeholder="Enter ID type" required />
            </div>
            <div class="input-box">
                <label>ID Number</label>
                <input name="id_num" type="number" placeholder="Enter ID number (Aadhaar/Voter)" required />
            </div>
        </div>
        <div class="gender-box">
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
        </div>
        <div class="input-box address">
          <label>Address</label>
          <div class="column">
            <div class="select-box" >
                <select name="district">
                    <option hidden>District</option>
                    <option value="Alipurduar">Alipurduar</option>
                    <option value="Bankura">Bankura</option>
                    <option value="Birbhum">Birbhum</option>
                    <option value="Cooch Behar">Cooch Behar</option>
                    <option value="Dakshin Dinajpur">Dakshin Dinajpur</option>
                    <option value="Darjeeling">Darjeeling</option>
                    <option value="Hooghly">Hooghly</option>
                    <option value="Howrah">Howrah</option>
                    <option value="Jalpaiguri">Jalpaiguri</option>
                    <option value="Jhargram">Jhargram</option>
                    <option value="Kalimpong">Kalimpong</option>
                    <option value="Kolkata">Kolkata</option>
                    <option value="Malda">Malda</option>
                    <option value="Murshidabad">Murshidabad</option>
                    <option value="Nadia">Nadia</option>
                    <option value="North 24 Parganas">North 24 Parganas</option>
                    <option value="Paschim Bardhaman">Paschim Bardhaman</option>
                    <option value="Paschim Medinipur">Paschim Medinipur</option>
                    <option value="Purba Bardhaman">Purba Bardhaman</option>
                    <option value="Purba Medinipur">Purba Medinipur</option>
                    <option value="Purulia">Purulia</option>
                    <option value="South 24 Parganas">South 24 Parganas</option>
                    <option value="Uttar Dinajpur">Uttar Dinajpur</option>
                </select>
            </div>
            <input type="text" placeholder="Enter your city/vill" required name="city-vill">
          </div>
          <div class="column">
            <input type="text" placeholder="Enter your state" required name="state"/>
            <input type="number" placeholder="Enter postal code" required name="post_code"/>
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
        <button id="sbmt-form" name="register_user">Register</button>
      </form>
    </section>
    <script src="signup.js"></script>
    <script src="location_signup.js"></script>
  </body>
</html>