<?php
//   $is_refreshed = $_GET['refresh'];
//   if($is_refreshed==1)
//   {
//     $lat = number_format(@$_COOKIE["cur_lat"],7,".","");
//     $lon = number_format(@$_COOKIE["cur_lon"],7,".","");
//     $address = $_COOKIE['cur_addrss'];
//   }
//   else
//   {
//     header("Refresh: 2; url=amb_admin_reg.php?refresh=1");
//   }

//   if(isset($_POST['submit']))
//   {

//   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Ambulance Service Registration</title>
    <link rel="stylesheet" href="css/amb_admin_reg.css">
</head>
<body>
<section class="container">
      <div class="title-bar">
        <img src="images/logo.png" alt="logo" width="70px">
        <header>New Ambulance Service Registration Form</header>
      </div>
      <form class="form" method="post">
        <div class="column">
          <div class="input-box">
            <label>Ambulance Service name <sub>(max 50 characters)</sub></label>
            <input name="fname" type="text" placeholder="Enter ambulance service name" maxlength="50" required/>
          </div>

        </div>
        <div class="column">
            <div class="input-box">
                <label>Ambulance Van No <sub>(Govt. Reg number)</sub></label>
                <input name="amb_no" id="amb_no" type="text" placeholder="Enter ambulance van no" required />
                <p for="" class="validation-inactive" id="amb_no_validation">Invalid Ambulance Number<br>eg. WB 24 DB 2547 <br>Please maintain the above format</p>
            </div>

            <div class="input-box">
                <label>Ambulance Type</label>
                <div class="select-box">
                    <select name="amb_type" id="">
                        <option value="Normal">Normal</option>
                        <option value="Life-Support">Life-Support</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="column">
          <div class="input-box">
            <label>Name of Driver</label>
            <input name="name" type="text" placeholder="Enter full name of driver" required/>
          </div>
          <div class="input-box">
            <label>Phone Number<sub>(without including +91)</sub</label>
            <input name="contact_num" type="number" placeholder="Enter phone number" required maxlength="10"/>
          </div>
        </div>
        <div class="column">
            <div class="input-box">
                <label>Ambulance Rate(in Rs)</label>
                <input name="rate" type="number" placeholder="Enter ambulance rate per 5Km" required maxlength="10"/>
            </div>
        </div>
        <div class="input-box address">
          <label>Address</label>
          <div class="column">
            <div class="input-box">
            <p class="warning">If address shown is not correct it is recommended to use GPS device<br>Current address in use: <b><?php echo @$_COOKIE['cur_addrss'];?></b></p>
            </div>
          </div>
          <div class="column">
            <div class="select-box" >
                <select name="district">
                <option value="" selected disabled>Select District</option >
                <?php
                include("db_config/main_config.php");
                    // include("connection.php");
                    $db = new database;
                    $con = $db->connect();
                     $sql="SELECT * FROM districts";
                     $res=mysqli_query($con,$sql) or die("query unsuccesfull");
                     while($row=mysqli_fetch_assoc($res)){
                     echo"
                     <option value=$row[value]>$row[name]</option>";
                    }?>
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
        <button id="sbmt-form" name="submit">Register</button>
      </form>
    </section>
    <!-- <script src="amb_admin_loc.js"></script> -->
    <script src="amb_adminReg_form.js"></script>
</body>
</html>