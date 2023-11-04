<?php
include("operation.php");
$obj2=new Operation();
$obj = new Database();


    $id = base64_decode($_GET['delstd']);
    $bg_id = base64_decode($_GET['bg_id']);
    // echo $id." ".$bg_id;

    // $_SESSION["Blood_Bank_id"] = $id;
    // $_SESSION["Blood_id"] = $bg_id;
    
    if(isset($_POST['submit'])){
        $count=$_POST['count'];
        $result=$obj2->update_Blood_Details($count,$id,$bg_id);
    // $values=['count'=>$count];
           
    }

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/minor%20Project%205th_Sem//Emergency_Medical_Support_System/HomePage/style.css">
    <link rel="stylesheet" href="bloodUpdate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7 col-sm-6">
                <div class="card shadow">
                    <?php
                    if (isset($result)) {
                        ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>
                                <?= $result ?>
                            </strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        // header('BloodDetails.php');
                    }
                    ?>

                    <div class="card-header">
                        <div class="row ">
                            <div class="col-md-9">
                                <h2>Blood Bank's Blood Data</h2>
                                <div class="col-md-8">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <select name="blood_bank_id" class="form-control">
                                                    <option value="" selected disabled>Select Blood Bank</option>
                                                    <?php
                                                    $obj1 = new Database();
                                                    $obj1->sql_select('blood_bank', '*', null, 'blood_bank_id='.$id, null, null);
                                                    $result = $obj1->getResult();
                                                    foreach ($result as $row) {
                                                        $val = $row['blood_bank_id'];
                                                        $name = $row['name'];
                                                        ?>
                                                        <option selected value="<?= $val ?>">
                                                            <?= $name ?>
                                                        </option>
                                                        <?php
                                                    } ?>
                                                </select>
                                            </div>
                                            <!-- <div class="col-md-2">
                                                <input type="submit" value="Search" name="search" class="btn btn-success">
                                            </div> -->
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <a href="BloodDetails.php" class="btn btn-info">Blood details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Blood Group</th>
                            <th>Quantity</th>
                            <th>Operations</th>
                        </tr>
                        <?php
                            $condition = "blood_bank_id = $id AND blood_group_id = $bg_id";                       
                            $obj->sql_select('blood_bank_blood_group', '*', null, $condition, null, null);
                            $result = $obj->getResult();
                            foreach ($result as list("blood_bank_id" => $id, "blood_group_id" => $bg_id, "count" => $count)) {
                                $obj2 = new Database();
                                $obj2->sql_select('blood_group', '*', null, 'blood_group_id=' . $bg_id, null, null);
                                $result_bg = $obj2->getResult();
                                foreach ($result_bg as list("blood_group_id" => $bg_id, "group_name" => $g_name)) {
                                    ?>
                                    <tr>
                                        <form action="" method="post">
                                            <td>
                                                <?= $g_name ?>
                                            </td>
                                            <td>
                                                <!-- <input type="number" name="ucount" value=""  class="form-control num"> -->
                                                <input type="number" name="count" class="form-control" value="<?php echo $count;
                                                ?>">

                                            </td>
                                            <td>

                                            <input type="submit" name="submit" value="Update" class="btn btn-sm btn-success">
                                            
                                            </td>
                                        </form>
                                    </tr>
                                    <?php
                                }
                            }
                        
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>