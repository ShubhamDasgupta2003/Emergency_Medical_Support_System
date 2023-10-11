<?php  
if(isset($_POST['register'])){
    include_once("db_config/main_config.php");
    $file_name=$_FILES["my_img"]["name"];
    $tmp_name=$_FILES["my_img"]["tmp_name"];
    $folder="images/".$file_name;
    // echo $folder;
    move_uploaded_file($tmp_name,$folder);
    $heading=$_POST['heading'];
    $des=$_POST['des'];
    $link=$_POST['link'];

    $sql="INSERT INTO `services`(`img_src`, `heading`, `des`, `link`) VALUES ('$folder','$heading','$des','$link')";
    $res=mysqli_query($con,$sql) or die("error in query");
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
        <img src="images/logo.png" alt="logo" width="70px">
        <header>New Service Registration Form</header>
      </div>

      <form class="form" method="post" enctype="multipart/form-data">
       
          <div class="input-box">
            <label>Upload image</label>
            <input type="file" name="my_img">
          </div>
          <div class="input-box">
            <label>Enter Service Name</label>
            <input type="text" name="heading">
          </div>
          <div class="input-box">
            <label>Write a small description</label>
            <input type="text" name="des">
          </div>
          <div class="input-box">
            <label>Enter page link</label>
            <input type="text" name="link">
          </div>

     
        <button id="sbmt-form" name="register">Register</button>
      </form>
    </section>
    <!-- <script src="js/signup.js"></script>
    <script src="js/location_signup.js"></script> -->
  </body>
</html>