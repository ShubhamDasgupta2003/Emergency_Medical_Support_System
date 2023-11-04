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


if(isset($_POST['submit1'])){
    $m_bedcount=$_POST['m_count'];
    $f_bedcount=$sqlr['Female_bed_available'];
    $result=$obj->update("hospital_info",array("Male_bed_available"=>$m_bedcount,"Female_bed_available"=>$f_bedcount),"Id='$hos_id'");
    header("location:/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/bed booking admin/display_update_bed.php");
       
}

if(isset($_POST['submit2'])){
    $f_bedcount=$_POST['f_count'];
    $m_bedcount= $sqlr['Male_bed_available'];
    $result=$obj->update("hospital_info",array("Female_bed_available"=>$f_bedcount,"female_bed_available"=>$f_bedcount),"Id='$hos_id'");
    header("location:/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/bed booking admin/display_update_bed.php");
       
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
                        <button type="button" class="btn btn-info add-new"><a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/bed booking admin/hospital_interface.php">Go to Dashboard</a></button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Gender</th>
                        <th>Number of Beds</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        $sqlr=$obj->select('hospital_info','Male_bed_available,Female_bed_available',"Id='$hos_id'")->fetch_assoc();
                        // $mcount= $sqlr['Male_bed_available']; 
                        $male="Male";
                        $female="Female";
                     ?>

                    <tr>
                    <form action="" method="post">
                        <td><?php echo $male; ?></td>
                        <td><input type="number" name="m_count" class="form-control" value="<?php echo $sqlr['Male_bed_available'];?>"></td>
                        <td>
                            <!-- <a href="#" class="edit" title="Edit" data-toggle="tooltip"><span class="material-symbols-outlined">edit_square</span></a> -->
                            <button name="submit1">update</button>
                        </td>
                        </form>
                    </tr>
                    <tr>
                    <form action="" method="post">
                        <td><?php echo $female; ?></td>
                        <td><input type="number" name="f_count" class="form-control" value="<?php echo $sqlr['Female_bed_available'];?>"></td>
                        <td>
                            <!-- <a href="#" class="edit" title="Edit" data-toggle="tooltip"><span class="material-symbols-outlined">edit_square</span></a> -->
                            <button name="submit2">update</button>
                        </td>
                        </form>
                    </tr>
                    <!-- <tr>
                        <td>Female</td>
                        <td>Customer Service</td>
                        <td>(313) 555-5735</td>
                        <td>
                            <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                            <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Fran Wilson</td>
                        <td>Human Resources</td>
                        <td>(503) 555-9931</td>
                        <td>
                            <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                            <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td> -->
                    </tr>      
                </tbody>
            </table>
        </div>
    </div>
</div>     
</body>
</html>