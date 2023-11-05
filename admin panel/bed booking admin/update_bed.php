<?php
include_once ('oop_config.php');
date_default_timezone_set("Asia/calcutta");
$obj=new Database;
session_start();

if($_SESSION['is_adm_login']!=1)
    {
        echo "<script>alert('Please Login to continue!');
        window.location.href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/adminlogin.php';</script>";

    }



    $hos_id= $_SESSION['user_id'];
    // echo "$hos_id";
    
    $sql2=$obj->select('hospital_info','*',"Id='$hos_id'")->fetch_assoc();
    
    // echo $sql2['Name'];
    
    $name= $sql2['Name'];

?>

<?php

if(isset($_GET['hos_id'])){
    $hos_id = $_GET['hos_id'];
    $gender = $_GET['gender'];
    $bedcount = $_GET['bedcount'];
    // echo "$bedcount";
    // echo "$gender";
}
?>


<?php


if(isset($_POST['update'])){
    $bedcount2=$_POST['count'];

    
    $sqlupdate=$obj2->update("hospital_info",array("$bedcount2"));
// $values=['count'=>$count];
       
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Update Bed</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<link rel="stylesheet" href="update_bed.css">
</head>
<body>
<div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Bed <b>Details</b></h2></div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-info add-new"><a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/bed booking admin/display_update_bed.php">Bed Details</a></button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Gender</th>
                        <th>Number of Beds</th>
                        <!-- <th>Phone</th> -->
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        $sqlr=$obj->select('hospital_info','Male_bed_available,Female_bed_available',"Id='$hos_id'")->fetch_assoc();    
                     ?>

                    <tr>
                    <form action="" method="post">
                        <td>  <?= $gender ?></td>
                        <td><input type="number" name="count" class="form-control" value="<?php echo $bedcount;?>"></td>
                        <td>
                            
                            <!-- <a href="" class="edit" title="Edit" data-toggle="tooltip"><span class="material-symbols-outlined">save</span></a> -->
                            <button name="update">Update</button>
                            
                        </td>
                        </form>
                    </tr>
                    </tr>      
                </tbody>
            </table>
        </div>
    </div>
</div>     
</body>
</html>