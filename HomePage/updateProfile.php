<?php
  include_once("db_config/main_config.php");
  session_start();
  $user_id=$_SESSION['user_id'];

  include_once("db_config/main_config.php");
  $sql="SELECT * FROM `user_info` WHERE user_id='$user_id'";
  $result=mysqli_query($con,$sql) or die ("error found in sql query");
  $data=mysqli_fetch_assoc($result);
  // if(mysqli_num_rows($result)){
  //   while($data=mysqli_fetch_assoc($result)){
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
        <img src="images/logo.png" alt="logo" width="70px">
        <header>Update your details</header>
      </div>
      <form class="form" method="post" action="updatePdata.php">
        <div class="column">
          <div class="input-box">
            <label>First Name</label>
            <input name="fname" type="text" value="<?php echo  $data['user_first_name'] ?>" placeholder="Enter your first name" required/>
          </div>

          <div class="input-box">
            <label>Last Name</label>
            <input name="lname" type="text" value="<?php echo  $data['user_last_name'] ?>" placeholder="Enter your last name" required />
          </div>
        </div>
        <div class="input-box">
          <label>Email Address</label>
          <input name="email_id" type="text" value="<?php echo  $data['user_email'] ?>" placeholder="Enter email address" required />
        </div>

        <div class="column">
          <div class="input-box">
            <label>Phone Number</label>
            <input name="contact_num" type="number"value="<?php echo  $data['user_contactno'] ?>" placeholder="Enter phone number" required minlength="10" maxlength="10"/>
          </div>
          <div class="input-box">
            <label>Date of Birth</label>
            <input name="dob" id="dtpick" type="date"value="<?php echo  $data['user_dob'] ?>" placeholder="Enter birth date" required/>
          </div>
        </div>

        <div class="input-box address">
          <label>Address</label>
          <div class="column">
            <div class="select-box" >
               
            <?php 

            $sql1="SELECT * FROM districts";
            $res1=mysqli_query($con,$sql1) or die("query unsuccesfull");
            if(mysqli_num_rows($res1)){
                echo '<select name="districts">';
                while($row1=mysqli_fetch_assoc($res1)){
                    if($data['district']==$row1['value']){
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
            <input type="text" value="<?php echo  $data['town_vill'] ?>" placeholder="Enter your city/vill" required name="city-vill">
          </div>
          <div class="column">
            <input type="text" value="<?php echo  $data['state'] ?>" placeholder="Enter your state" required name="state"/>
            <input type="number" value="<?php echo  $data['pincode'] ?>" placeholder="Enter postal code" required name="post_code"/>
          </div>
        </div>

        </div>
        <a href="profile.php"><button id="sbmt-form" name="register_user">Update</button></a>
        
      </form>
      
    </section>
    <!-- <script src="js/signup.js"></script>
    <script src="js/location_signup.js"></script> -->
  </body>
</html>
