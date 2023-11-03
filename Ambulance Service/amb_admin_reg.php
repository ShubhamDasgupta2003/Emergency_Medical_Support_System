<?php
  include "db_config/main_config.php";
  $db = new Database();
  $con = $db->connect();

  $is_refreshed = @$_GET['refresh'];
  if($is_refreshed==1)
  {
    $lat = number_format(@$_COOKIE["cur_lat"],7,".","");
    $lon = number_format(@$_COOKIE["cur_lon"],7,".","");
    $address = $_COOKIE["cur_addrss"];
  }
  else
  {
    header("Refresh: 2; url=amb_admin_reg.php?refresh=1");
  }


  if(isset($_POST['submit']))
  {
    $amb_name = $_POST['ambname'];
    $amb_email = $_POST['ambmail'];
    $amb_num = $_POST['ambno'];
    $amb_type = $_POST['ambtype'];
    $driver_name = $_POST['drvname'];
    $driver_cont = $_POST['drvcont'];
    $amb_rate = $_POST['ambrate'];
    $distr = $_POST['district'];
    $town = $_POST['city-vill'];
    $state = $_POST['state'];
    $pincode = $_POST['post_code'];
    $password = password_hash($_POST['pswd'],PASSWORD_DEFAULT);

    $amb_info_inst = $db->insert('ambulance_info',array("$amb_num","$amb_name","$amb_type","active",$lat,$lon,$amb_rate,$driver_cont,"$driver_name","$state","$distr","$town",$pincode));

    $amb_adm_inst = $db->insert('ambulance_admin',array('',"$amb_num","$amb_email",$driver_cont,"$password"));

    if($amb_adm_inst)
    {
      echo "<script>alert('Ambulance registered successfully!')</script>";
    }
  }

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
            <input name="ambname" type="text" placeholder="Enter ambulance service name" maxlength="50" required/>
          </div>
        </div>
        <div class="column">
          <div class="input-box">
            <label>Email id</label>
            <input name="ambmail" type="text" placeholder="Enter email id" maxlength="50" required/>
          </div>
        </div>
        <div class="column">
            <div class="input-box">
                <label>Ambulance Van No <sub>(Govt. Reg number)</sub></label>
                <input name="ambno" id="amb_no" type="text" placeholder="Enter ambulance van no" required />
            </div>

            <div class="input-box">
                <label>Ambulance Type</label>
                <div class="select-box">
                    <select name="ambtype" id="">
                        <option value="Normal">Normal</option>
                        <option value="Life-Support">Life-Support</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="column">
          <div class="input-box">
            <label>Name of Driver</label>
            <input name="drvname" type="text" placeholder="Enter full name of driver" required/>
          </div>
          <div class="input-box">
            <label>Phone Number<sub>(without including +91)</sub</label>
            <input name="drvcont" type="number" placeholder="Enter phone number" required maxlength="10"/>
          </div>
        </div>
        <div class="column">
            <div class="input-box">
                <label>Ambulance Rate(in Rs)</label>
                <input name="ambrate" type="number" placeholder="Enter ambulance rate per 5Km" required maxlength="10"/>
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
                     $res= $db->select('districts',"*",'','');
                     while($row=$res->fetch()){
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
    <script src="amb_admin_loc.js"></script>
    <!-- <script src="amb_adminReg_form.js"></script> -->
</body>
</html>