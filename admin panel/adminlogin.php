<?php
//   include_once ('oop_connection.php');
include_once('procedural_connect.php');

?>


<?php
session_start();
$_SESSION['is_adm_login'] = 0;

if(isset($_POST['login'])){
  $email_num=$_POST['email_number'];
  $password=$_POST['password'];
  $service=$_POST['service'];



  if($service == 'Ambulance Service'){
    // echo "Ambulance Service";
    $sql="SELECT * FROM `ambulance_admin` WHERE admin_email = '$email_num' OR admin_phone = '$email_num'";
    $result= mysqli_query($conn,$sql);

    if($result && $result-> num_rows==1){

        if($result){
          $row=mysqli_fetch_assoc($result);
          $storedpassword= $row['admin_pswd'];

          if(password_verify($password,$storedpassword)){
 
            $_SESSION['amb_no'] = $row['amb_no'];
            // $_SESSION['user_fname'] = $row['user_first_name'];
            // $_SESSION['user_lname'] = $row['user_last_name'];
            // $_SESSION['user_email'] = $row['user_email'];
            $_SESSION['is_adm_login'] = 1;
            header("location: /Minor Project 5th_Sem/Emergency_Medical_Support_System/Ambulance Service/amb_driver.php");
          }else{
            $_SESSION['is_adm_login'] = 0;
            echo "<script>alert('Password incorrect! Enter a valid password')</script>";
          }
        }
      }else{
        echo "<script>alert('Invalid username or password!')</script>";
      }
  }
  else if($service == 'Blood Bank Service'){
    echo "Blood Bank Service";
  }
  else if($service == 'Hospital Bed Booking Service'){
    // echo "Hospital Bed Booking Service";
    $sql="SELECT * FROM `hospital_info` WHERE email = '$email_num' OR ContactNo = '$email_num'";
    $result= mysqli_query($conn,$sql);

    if($result && $result-> num_rows==1){

        if($result){
          $row=mysqli_fetch_assoc($result);
          $storedpassword= $row['password'];

          if(password_verify($password,$storedpassword)){
 
            $_SESSION['user_id'] = $row['Id'];
            // $_SESSION['user_fname'] = $row['user_first_name'];
            // $_SESSION['user_lname'] = $row['user_last_name'];
            // $_SESSION['user_email'] = $row['user_email'];
            $_SESSION['is_adm_login'] = 1;
            header("location:adminb.php");
          }else{
            $_SESSION['is_adm_login'] = 0;
            echo "<script>alert('Password incorrect! Enter a valid password')</script>";
          }
        }
      }else{
        echo "<script>alert('Invalid username or password!')</script>";
      }
    }
    else if($service == 'NurseTechnician Service'){
      echo "NurseTechnician Service";
    }
  }

//  echo "$service";

//   $sql="SELECT * FROM `user_info` WHERE user_email = '$email_num' OR user_contactno = '$email_num'";
//   $result= mysqli_query($con,$sql);

//   if($result && $result-> num_rows==1){

//     if($result){
//       $row=mysqli_fetch_assoc($result);
//       $storedpassword= $row['password'];
  
//       if(password_verify($password,$storedpassword)){
 
//         $_SESSION['user_id'] = $row['user_id'];
//         $_SESSION['user_fname'] = $row['user_first_name'];
//         $_SESSION['user_lname'] = $row['user_last_name'];
//         $_SESSION['user_email'] = $row['user_email'];
//         $_SESSION['is_adm_login'] = 1;
//         header("location:index.php");
//       }else{
//         $_SESSION['is_adm_login'] = 0;
//         echo "<script>alert('Password incorrect! Enter a valid password')</script>";
//       }
//     }
//   }else{
//     echo "<script>alert('Invalid username or password!')</script>";
//   }
// }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Admin login</title>
    <link rel="stylesheet" href="adminlogin.css" />
  </head>
  <body>
    <section class="container">
      <div class="title-bar">
        <header> Admin login</header>
      </div>
      <form method="post" class="form">
        <div class="column">
            <div class="input-box">
                <label>Email/Number</label>
                <input id="email" type="text" name="email_number" placeholder="Enter your email or number" required />
            </div>
            <div class="input-box">
                <label>Password</label>
                <input id="pswd"type="password" name="password" placeholder="Enter your password" required />
            </div>
            <div class="input-box menu" >
            <label>Service</label>
            <select id="service" name="service">
                <option hidden>Select Service</option>
                <option value = "Ambulance Service">Ambulance Service</option>
                <option value = "Blood Bank Service">Blood Bank Service</option>
                <option value = "Hospital Bed Booking Service">Hospital Bed Booking Service</option>
                <option value = "Medical Supplies Service">Medical Supplies Service</option>
                <option value = "NurseTechnician Service">NurseTechnician Service</option>
            </select>
            </div>
            
        </div>
        <button name="login" id="sbmt-form">login</button>
        <div class="signuplink">
          <div class="text">New user?</div>
          <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/Homepage/service_insert.php?refresh=0">click here</a>
        </div>
        <!-- <div class="signuplink">
        <a href="signup.php?refresh=0">Forgot password</a>
        </div> -->
      </form>
    </section>
  </body>
</html>