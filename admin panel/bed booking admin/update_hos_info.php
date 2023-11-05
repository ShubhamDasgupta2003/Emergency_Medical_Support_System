<?php

  include_once("oop_config.php");
  $obj = new Database();
  session_start();


  if($_SESSION['is_adm_login']!=1)
    {
        echo "<script>alert('Please Login to continue!');
        window.location.href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/adminlogin.php';</script>";

    }

    $hos_id= $_SESSION['adm_hos_id'];
    // echo "$hos_id";
    
    $sql2=$obj->select('hospital_info','*',"Id='$hos_id'")->fetch_assoc();
    
    // echo $sql2['Name'];
    
    $name= $sql2['Name'];

    if(isset($_POST['register_hosp'])){

      $name = $_POST['name'];
      $email = $_POST['email_id'];
      $lat = $_POST['lat'];
      $long = $_POST['long'];
      $cont_num = $_POST['contact_num'];
      $address = $_POST['address'];
      $city_town = $_POST['city-vill'];
      $state = $_POST['state'];
      $postcode = $_POST['post_code'];
      $bed_charge = $_POST['bed_charge'];

        $result=$obj->update("hospital_info",array("Name"=>$name,"email"=>$email,"Latitude"=>$lat,"Longitude"=>$long,"ContactNo"=>$cont_num,"Address"=>$address,"City"=>$city_town,"State"=>$state,"Pincode"=>$postcode,"bed_charge"=>$bed_charge,),"Id='$hos_id'");
        header("location:/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/bed booking admin/hospital_interface.php");
    }
?>

<?php

$sqlr=$obj->select('hospital_info','*',"Id='$hos_id'")->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Hospital Updation Form</title>
    <link rel="stylesheet" href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/bed_booking_service/css/hosp_register.css" />
  </head>
  <body>
    <section class="container">
      <div class="title-bar">
        <img src="\Minor Project 5th_Sem\Emergency_Medical_Support_System\HomePage\images\logo.png" alt="logo" width="70px">
        <header>Hospital Updation Form</header>
      </div>
      <form class="form" method="post">
        <div class="column">
          <div class="input-box">
            <label>Hospital Name</label>
            <input name="name" type="text" placeholder="Enter the hospital name" value="<?php echo $sqlr['Name'];?>" required/>
          </div>
        </div>
        <div class="input-box">
          <label>Email Address</label>
          <input name="email_id" type="text" placeholder="Enter email address" value="<?php echo $sqlr['email'];?>" required />
        </div>
        <div class="input-box">
          <label>Latitude</label>
          <input name="lat" type="number" step="any" placeholder="Enter hospital latitude" value="<?php echo $sqlr['Latitude'];?>" required/>
        </div>
        <div class="input-box">
          <label>Longitude</label>
          <input name="long" type="number" step="any" placeholder="Enter hospital longitude" value="<?php echo $sqlr['Longitude'];?>" required/>
        </div>

        <div class="column">
          <div class="input-box">
            <label>Phone Number</label>
            <input name="contact_num" type="number" placeholder="Enter phone number" value="<?php echo $sqlr['ContactNo'];?>" required minlength="10" maxlength="10"/>
          </div>
        </div>
        <div class="input-box">
          <label>Address</label>
          <input name="address" type="text" placeholder="Enter hospital address" value="<?php echo $sqlr['Address'];?>" required />
        </div>
        <div class="input-box address">
          <label>Other details</label>
          <div class="column">
            <!-- <div class="select-box" >
                <select name="district">
                <option value="" selected disabled> <php echo $sqlr['District'];?></option >
                php open tag
                    $res= $db->select('districts',"*",'','');
                    while($row=$res->fetch_assoc()){
                    echo"
                    <option value=$row[value]>$row[name]</option>";
                    }
                    ?>
                </select>
            </div> -->
            <input type="text" placeholder="Enter the city / village" value="<?php echo $sqlr['City'];?>" required name="city-vill">
          </div>
          <div class="column">
            <input type="text" placeholder="Enter the state" value="<?php echo $sqlr['State'];?>" required name="state"/>
            <input type="number" placeholder="Enter postal code" value="<?php echo $sqlr['Pincode'];?>" required name="post_code"/>
          </div>
          <!-- <div class="column">
            <input type="number" placeholder="Enter male bed available" value="<php echo $sqlr['Male_bed_available'];?>" required name="malebed"/>
            <input type="number" placeholder="Enter female bed available" value="<php echo $sqlr['Female_bed_available'];?>" required name="femalebed"/>
          </div> -->
        </div>
        <!-- <div class="column">
            <div class="input-box">
                <label>Password</label>
                <input id="pswd" type="password" placeholder="Enter your password" required />
            </div>
            <div class="input-box">
                <label>Confirm Password</label>
                <input id="cnf-pswd"type="text" placeholder="Confirm your password" name ="pswd" required />
            </div>
        </div> -->
        <div class="input-box">
            <label>Bed Charge</label>
            <input name="bed_charge" type="number" placeholder="Enter bed charge" value="<?php echo $sqlr['bed_charge'];?>" required/>
          </div>
        <button id="sbmt-form" name="register_hosp">Update</button>
      </form>
    </section>
    <script src="js/hosp_register.js"></script>
    <script src="js/location_hosp_reg.js"></script>
  </body>
</html>