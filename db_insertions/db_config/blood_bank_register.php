<?php
include("operation.php");
$obj = new Operation();
// $_SERVER['REQUEST_METHOD']=='POST'

if(isset($_POST["submit"])){
    $register = $obj->addRegister($_POST);
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/minor%20Project%205th_Sem//Emergency_Medical_Support_System/HomePage/style.css">
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
                    <div class="col-md-9 "><h2>Blood Bank's Registration form </h2></div>   <!-- text-center -->
                    <div class="col-md-3"><a href="BloodBanks.php" class="btn btn-info">login</a></div>
                </div>
              </div>

              <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="">Name</label>
                    <input type="text" name="name" placeholder="Enter your Blood bank name" class="form-control">

                    <label for="">Email</label>
                    <input type="email" name="email" placeholder="Enter email" class="form-control">

                    <label for="">Password</label>
                    <input type="password" name="pass" placeholder="Enter password" class="form-control">

                    <label for="">Latitude</label>
                    <input type="text" name="lat" placeholder="Enter your Latitude" class="form-control">

                    <label for="">Longitude</label>
                    <input type="text" name="lon" placeholder="Enter your Longitude" class="form-control">

                    <label for="">State</label>
                    <input type="text" readonly name="state" value="West Bengal" placeholder="Enter your state" class="form-control">

                    <label for="">City</label>
                    <input type="text" name="city" placeholder="Enter your city" class="form-control">

                    <label for="">Phone</label>
                    <input type="number" name="phone" placeholder="Enter your Longitude" class="form-control">

                     <label for="">Dist</label>
                    <!--<input type="text" name="branch" placeholder="Enter your district" > -->

                    <select name="dist" class="form-control">
                    <option value="" selected disabled>Select District</option>
                    <?php 
                    $obj2 = new Database();
                    $obj2->sql_select('districts', '*', null, null, null, null);
                    $result = $obj2->getResult();
                    foreach ($result as $row) {
                        $val = $row['value'];
                        $name = $row['name'];
                    ?>
                    <option value="<?=$val?>"><?=$name?></option>
                    <?php
                    }?>
                    </select>

                    <label for="">Pin code</label>
                    <input type="text" name="pin" placeholder="Enter your Pincode" class="form-control">

                    <!-- <label for="">Photo</label>
                    <input type="file" name="photo" id="photo" class="form-control"> -->

                    <input type="submit" value="Submit" name="submit" class="btn btn-success submit-btn form-control">
                </form>
              </div>
             
            </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>