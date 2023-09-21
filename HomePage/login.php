<?php
// session_start();
  include_once("db_config/main_config.php");


?>


<?php
if(isset($_POST['login'])){
  $email_num=$_POST['email_number'];
  $password=$_POST['password'];

 

  $sql="SELECT * FROM `user_info` WHERE user_email = '$email_num' OR user_contactno = '$email_num'";
  $result= mysqli_query($con,$sql);

  if($result && $result-> num_rows ==1){

    if($result){
      $row=mysqli_fetch_assoc($result);
      $storedpassword= $row['password'];
  
      if(password_verify($password,$storedpassword)){
        header("location:index.php");
      }else{
        echo "<script>alert('Password incorrect! Enter a valid password')</script>";
      }
  
    }
  }else{
    echo "<script>alert('Invalid username or password!')</script>";
  }



}


?>


<!DOCTYPE html>
<!---Coding By CodingLab | www.codinglabweb.com--->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" /> -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="css/login.css" />
  </head>
  <body>
    <section class="container">
      <div class="title-bar">
        <header>Login</header>
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
        </div>
        <button name="login" id="sbmt-form">login</button>
      </form>
    </section>
    <!-- <script src="login_final.js"></script> -->
  </body>
</html>