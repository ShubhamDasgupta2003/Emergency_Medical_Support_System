<?php
include("operation.php");
$obj = new Operation();
// $_SERVER['REQUEST_METHOD']=='POST'


  session_start();
    $id=$_SESSION['blood_bank_id'];
    echo ''.$id.'';
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $register = $obj->update($_POST,$id);
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
                    <div class="col-md-8 "><h2>Updates Blood Bank's Details</h2></div>   <!-- text-center -->
                    <div class="col-md-2"><a href="http://localhost/minor%20Project%205th_Sem/Emergency_Medical_Support_System/admin%20panel/Blood_Bank/bloodBooking_interface.php" class="btn btn-info">Dashboard</a></div>
                    <div class="col-md-2"><a href="http://localhost/minor%20Project%205th_Sem/Emergency_Medical_Support_System/HomePage/logout.php" class="btn btn-danger">Logout</a></div>
                </div>
              </div>

              <div class="card-body">
              <?php  

                    $obj1=new Database();
                    $obj1->sql_select('blood_bank','*',null,'blood_bank_id='.$id,null,null);

                    $result=$obj1->getResult();
                    foreach($result as list("name"=>$name,"latitude"=>$lat,"longitude"=>$lon,"dist"=>$dist,"state"=>$state,"city"=>$city,"phone"=>$phone,"pincode"=>$pin)){
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="">Name</label>
                    <input type="text" name="name" value="<?=$name?>" placeholder="Enter your Blood bank name" class="form-control">

                    <label for="">Latitude</label>
                    <input type="text" name="lat" value="<?=$lat?>" placeholder="Enter your Latitude" class="form-control">

                    <label for="">Longitude</label>
                    <input type="text" name="lon" value="<?=$lon?>" placeholder="Enter your Longitude" class="form-control">
                    
                    <label for="">State</label>
                    <input type="text" name="state" readonly value="<?=$state?>" placeholder="Enter your state" class="form-control">

                    <label for="">City</label>
                    <input type="text" name="city" value="<?=$city?>" placeholder="Enter your city" class="form-control">

                    <label for="">Phone</label>
                    <input type="number" name="phone" value="<?=$phone?>" placeholder="Enter your Longitude" class="form-control">

                    <label for="">Pin code</label>
                    <input type="text" name="pin" value="<?=$pin?>" placeholder="Enter your Pincode" class="form-control">
                    
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
                             $named = $row['name'];
                             if($val==$dist){
                                $select="selected";
                             }else{
                                $select= "";
                             }
                         ?>
                          <option <?= $select ?> value="<?= $val ?>"><?= $named ?></option>
                         <?php
                         }?>
                         </select>
                        <?php
     
                    }
                    ?>
                


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