<?php

include("oop_config.php");
$obj=new Database();

if(isset($_GET['delstd'])){
  $id=base64_decode($_GET['delstd']);
  $obj->delete('blood_bank','blood_bank_id='.$id);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="adminb.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/minor%20Project%205th_Sem//Emergency_Medical_Support_System/HomePage/style.css">
  
    <title>Document</title>
</head>
<body>
    
  

  <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-11 col-sm-6">
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
                    <div class="col-md-10 "><h2>Registered Blood Bank's Data </h2></div> <!--text-center-->
                    <div  class="col-md-1"><a href="blood_bank_register.php" class="btn btn-info">Register</a></div>
                </div>
              </div>

              <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Blood Bank Name</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>State</th>
                        <th>District</th>
                        <th>City</th>
                        <th>Pincode</th>
                        <th>Phone</th>
                        <th>Operations</th>
                    </tr>
                    <?php  
                    // $obj->select("SELECT * FROM oop");
                    $obj->sql_select('blood_bank','*',null,null,null,null);

                    $result=$obj->getResult();
                    foreach($result as list("blood_bank_id"=>$id,"name"=>$name,"latitude"=>$lat,"longitude"=>$lon,"phone"=>$phone,"state"=>$state,"dist"=>$dist,"city"=>$city,"pincode"=>$pin)){
                              ?>
                               
                               <tr>
                                <td><?=$name?></td>
                                <td><?=$lat?></td>
                                <td><?=$lon?></td>
                                <td><?=$state?></td>
                                <td><?=$dist?></td>
                                <td><?=$city?></td>
                                <td><?=$pin?></td>
                                <td><?=$phone?></td>
                                <td><a href='update_Blood_bank.php?id=<?=base64_encode($id);?>' class='btn btn-sm btn-warning '>Edit</a>
                                 <a href="?delstd=<?=base64_encode($id);?>" onclick="return confirm('are your sure to delete this record')" class='btn btn-sm btn-danger '>Delete</a></td>
                              
                              </tr>
                              <?php
                            }
                          ?>
                </table>
              </div>
             
            </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   
    
</body>
</html>
