<?php
  include "db_config/main_config.php";
  $db = new Database();
  $con = $db->connect();
  session_start();
  $amb_no = $_SESSION['amb_no'];//$_SESSION['amb_no'];        //get after login
  $is_refreshed = @$_GET['refresh'];
  if($is_refreshed==1)
  {
    $lat = number_format(@$_COOKIE["cur_lat"],7,".","");
    $lon = number_format(@$_COOKIE["cur_lon"],7,".","");
    $address = $_COOKIE["cur_addrss"];
  }
  else
  {
    header("Refresh: 2; url=amb_admin_update.php?refresh=1");
  }

  $amb_info = $db->select('ambulance_info',"*","amb_no='$amb_no'")->fetch();
//   print_r($amb_info);
  if(isset($_POST['submit']))
  {
    $amb_name = $_POST['ambname'];
    $driver_name = $_POST['drvname'];
    $driver_cont = $_POST['drvcont'];
    $amb_rate = $_POST['ambrate'];
    $distr = $_POST['districts'];
    $town = $_POST['city-vill'];
    $state = $_POST['state'];
    $pincode = $_POST['post_code'];

    //$amb_info_inst = $db->insert('ambulance_info',array("$amb_num","$amb_name","$amb_type","active",$lat,$lon,$amb_rate,$driver_cont,"$driver_name","$state","$distr","$town",$pincode));
    $amb_update_recs = $db->update('ambulance_info'," SET amb_name='$amb_name',amb_driver_name='$driver_name',amb_contact=$driver_cont,amb_rate=$amb_rate,amb_district='$distr',amb_state='$state',amb_town='$town',amb_loc_pincode=$pincode WHERE amb_no='$amb_no'");

    if($amb_update_recs)
    {
      echo "<script>alert('Ambulance details updated successfully!')</script>";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Ambulance Service Details</title>
    <link rel="stylesheet" href="css/amb_admin_reg.css">
</head>
<body>
<section class="container">
      <div class="title-bar">
        <img src="images/logo.png" alt="logo" width="70px">
        <header>Update Ambulance Service Details</header>
      </div>
      <form class="form" method="post">
        <div class="column">
          <div class="input-box">
            <label>Ambulance Service name <sub>(max 50 characters)</sub></label>
            <input name="ambname" type="text" value="<?php echo"$amb_info[amb_name]"; ?>" placeholder="Enter ambulance service name" maxlength="50" required/>
          </div>
        </div>
        <div class="column">
          <div class="input-box">
            <label>Name of Driver</label>
            <input name="drvname" type="text" value="<?php echo"$amb_info[amb_driver_name]"; ?>" placeholder="Enter full name of driver" required/>
          </div>
          <div class="input-box">
            <label>Phone Number<sub>(without including +91)</sub</label>
            <input name="drvcont" type="number" value="<?php echo"$amb_info[amb_contact]"; ?>" placeholder="Enter phone number" required maxlength="10"/>
          </div>
        </div>
        <div class="column">
            <div class="input-box">
                <label>Ambulance Rate(in Rs)</label>
                <input name="ambrate" type="number" value="<?php echo"$amb_info[amb_rate]"; ?>" placeholder="Enter ambulance rate per 5Km" required maxlength="10"/>
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
            <?php 
                $sql1=$db->select('districts',"*");
                if($sql1->fetch()){
                    echo '<select name="districts">';
                    while($row1=$sql1->fetch()){
                        if($amb_info['amb_district']==$row1['value']){
                            $select="selected";
                        }else{
                            $select="";
                        }
                    echo"
                    <option $select value=$row1[value]> $row1[name] </option>"; 
                    }
                
                    echo "</select>" ;
                }
                ?> 
            </div>
            <input type="text" value="<?php echo"$amb_info[amb_town]"; ?>" placeholder="Enter your city/vill" required name="city-vill">
          </div>
          <div class="column">
            <input type="text" value="<?php echo"$amb_info[amb_state]"; ?>" placeholder="Enter your state" required name="state"/>
            <input type="number" value="<?php echo"$amb_info[amb_loc_pincode]"; ?>" placeholder="Enter postal code" required name="post_code"/>
          </div>
        </div>
        <button id="sbmt-form" name="submit">Update</button>
      </form>
    </section>
    <script src="amb_admin_loc.js"></script>
    <!-- <script src="amb_adminReg_form.js"></script> -->
</body>
</html>