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

<?php
// include("Operation.php");
// $obj = new Operation();
// // $_SERVER['REQUEST_METHOD']=='POST'

// if(isset($_POST["submit"])){
//     $register = $obj->addRegister($_POST,$_FILES);
//   }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <div class="card shadow">
              <?php
              if(isset($register)){
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong><?=$register?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
              }
              ?>

              <div class="card-header">
                 <div class="row "> <!--justify-content-center -->
                    <div class="col-md-9 "><h2>Service Registration form </h2></div>   <!-- text-center -->
                    <div class="col-md-3"><a href="index.php" class="btn btn-info">Service Info</a></div>
                </div>
              </div>

              <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="">Service Name</label>
                    <input type="text" name="name" placeholder="Enter your service name" class="form-control">

                    <label for="">Description</label>
                    <input type="text" name="des" placeholder="Write a brief Description" class="form-control">

                    <label for="">PageLink</label>
                    <input type="number" name="phone" placeholder="Submit page link" class="form-control">

                    <!-- <label for="">Branch</label>
                    <input type="text" name="branch" placeholder="Enter your Branch" class="form-control"> -->

                    <label for="">Photo</label>
                    <input type="file" name="photo" id="photo" class="form-control">

                    <input type="submit" value="Register Your Service" name="submit" class="btn btn-success submit-btn form-control">
                </form>
              </div>
             
            </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>