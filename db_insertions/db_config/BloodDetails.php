<?php
include("oop_config.php");
$obj = new Database();



?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/minor%20Project%205th_Sem//Emergency_Medical_Support_System/HomePage/style.css">
    <link rel="stylesheet" href="bloodUpdate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
</head>

<body>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7 col-sm-6">
                <div class="card shadow">
                    <?php
                    if (isset($register)) {
                        ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>
                                <?= $register ?>
                            </strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                    }
                    ?>

                    <div class="card-header">
                        <div class="row ">
                            <div class="col-md-9">
                                <h2>Blood Bank's Blood Data</h2>
                                <div class="col-md-8">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="search_select_box col-md-10">
                                                <select name="blood_bank_id" class="form-control" data-live-search="true">
                                                    <option value="" selected disabled>Select Blood Bank</option>
                                                    <?php
                                                    $obj1 = new Database();
                                                    $obj1->sql_select('blood_bank', '*', null, null, null, null);
                                                    $result = $obj1->getResult();
                                                    foreach ($result as $row) {
                                                        $val = $row['blood_bank_id'];
                                                        $name = $row['name'];
                                                        ?>
                                                        <option value="<?= $val ?>">
                                                            <?= $name ?>
                                                        </option>
                                                        <?php
                                                    } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="submit" value="Search" name="search" class="btn btn-success">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <a href="Blood_insert.php" class="btn btn-info">Add Blood details</a>
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
                        if (isset($_POST['search'])) {
                            $id = $_POST['blood_bank_id'];
                            $obj->sql_select('blood_bank_blood_group', '*', null, 'blood_bank_id=' . $id, null, null);
                            $result = $obj->getResult();
                            foreach ($result as list("blood_bank_id" => $id, "blood_group_id" => $bg_id, "count" => $count)) {
                                $obj2 = new Database();
                                $obj2->sql_select('blood_group', '*', null, 'blood_group_id=' . $bg_id, null, null);
                                $result_bg = $obj2->getResult();
                                foreach ($result_bg as list("blood_group_id" => $bg_id, "group_name" => $g_name)) {
                                    ?>
                                    <tr>
                                        <form action="" method="get">
                                            <td>
                                                <?= $g_name ?>
                                            </td>
                                            <td>
                                                <!-- <input type="number" name="ucount" value=""  class="form-control num"> -->
                                                <input type="number" readonly class="form-control" value="<?php echo $count;
                                                ?>">

                                            </td>
                                            <td>
                                        
                                            <a href="Update_BloodDetails.php?delstd=<?= base64_encode($id) ?>&bg_id=<?= base64_encode($bg_id) ?>?>" class='btn btn-sm btn-success check'><i class="fa-solid fa-pen-to-square"></i></a>
                                            <!-- <input type="submit" name="submit" value="Update" class="btn btn-sm btn-success"> -->
                                            </td>
                                        </form>
                                    </tr>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
   

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script src="select.js"></script>
</body>
</html>
