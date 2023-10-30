<?php
include("Blood_insert_op.php");
$obj = new Operation();

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
                    <div class="col-md-9 "><h2>Blood Details form </h2></div>   <!-- text-center -->
                    <div class="col-md-3"><a href="BloodDetails.php" class="btn btn-info">Blood details</a></div>
                </div>
              </div>

              <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="">Blood Bank ID</label>
                    <select name="blood_bank_id" class="form-control">
                    <option value="" selected disabled>Select Blood Bank</option>
                    <?php 
                    $obj1 = new Database();
                    $obj1->sql_select('blood_bank', '*', null, null, null, null);
                    $result = $obj1->getResult();
                    foreach ($result as $row) {
                        $val = $row['blood_bank_id'];
                        $name = $row['name'];
                    ?>
                    <option value="<?=$val?>"><?=$name?></option>
                    <?php
                    }?>
                    </select>

                    <label for="">Blood Group</label>
                    <select name="blood" class="form-control">
                    <option value="" selected disabled>Select Blood Group</option>
                    <?php 
                    $obj2 = new Database();
                    $obj2->sql_select('blood_group', '*', null, null, null, null);
                    $result = $obj2->getResult();
                    foreach ($result as $row) {
                        $val = $row['blood_group_id'];
                        $name = $row['group_name'];
                    ?>
                    <option value="<?=$val?>"><?=$name?></option>
                    <?php
                    }?>
                    </select>
                    <!-- <input type="text" name="lat" placeholder="Enter your Latitude" class="form-control"> -->

                    <label for="">Unit</label>
                    <input type="number" name="unit" placeholder="Enter quantity" class="form-control">

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