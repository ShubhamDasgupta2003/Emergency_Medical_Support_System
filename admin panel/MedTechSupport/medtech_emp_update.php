<?php
include_once ('oop_connection.php');
$obj=new Database;
session_start();
$eid=$_GET['eid'];
$sql = $obj->select('medtech_emp', '*', "eid='$eid'", '')->fetch_assoc();
$org_id=$sql['org_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Registration Form</title>
    <link rel="stylesheet" href="register_form.css">
</head>
<body>
    <div class="container">
        <form action="" method="post">
        <div class="title">
            Employee Registration Form
        </div>
        <div class="form">
            <div class="input_field">
                <label>Employee Full Name:</label>
                <input type="text"  class="input" value="<?php echo $sql['ename']?>"name="ename">
            </div>
            <div class="input_field">
                <label>Email:</label>
                <input type="email" class="input" value="<?php echo $sql['emp_email']?>"name="emp_email">
            </div>
            <div class="input_field">
                <label>Contact Number:</label>
                <input type="text" class="input" value="<?php echo $sql['e_cont_number']?>"name="emp_contno">
            </div>
            <div class="input_field">
                <label>Gender:</label>
                <div class="selectbox">
                    <select name="emp_gender">
                        <option value="Male"
                        <?php
                        if($sql['emp_gender']=="Male")
                        {
                            echo "selected";
                        }?>>Male</option>
                        <option value="Female"
                        <?php
                        if($sql['emp_gender']=='Female')
                        {
                            echo "selected";
                        }?>>Female</option>
                        <option value="Others"<?php
                        if($sql['emp_gender']=='Others')
                        {
                            echo "selected";
                        }?>>Others</option>

                    </select>
                </div>
            </div>
            <div class="input_field">
                <label>Status:</label>
                <div class="selectbox">
                    <select name="emp_status">
                        <option value="free">Free</option>
                        <option value="busy">Busy</option>
                    </select>
                </div>
            </div>
            <div class="input_field">
                <label>Salary</label>
                <input type="number" class="input" value="<?php echo $sql['salary']?>"name="salary">
            </div>
            <div class="input_field">
                <input type="submit"  value="Update" class="btn" name="register">
            </div>
        </form>
        </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['register'])){
    $ename=$_POST['ename'];
    $emp_gender=$_POST['emp_gender'];
    $emp_status=$_POST['emp_status'];
    $emp_email=$_POST['emp_email'];
    $emp_contno=$_POST['emp_contno'];
    $salary=$_POST['salary'];
    $conn=mysqli_connect("localhost","root","","emgmedicalsystem");
    $sql1 = "UPDATE medtech_emp SET org_id = '$org_id', eid = '$eid', ename = '$ename', emp_gender = '$emp_gender',emp_email='$emp_email', e_cont_number = '$emp_contno', e_status = '$emp_status', salary = $salary  
    WHERE eid = '$eid'";
    $sql2="UPDATE medtech_order SET status = 'Completed' WHERE eid = '$eid'";

    $result = mysqli_query($conn, $sql1);
    $result1 = mysqli_query($conn, $sql2);

    // Associative array
//     $row = mysqli_fetch_assoc($result);
//    $insert_result = $obj->update('medtech_emp',"eid='$eid'", array(
//     $org_id,
//     $eid,
//     $ename,
//     $emp_gender,
//     $emp_email,
//     $emp_contno,
//     $emp_status,
//     $salary
// ));
   if($result){
    echo "<script>alert('Data Update Sucessfull!');</script>";

    header("Location:/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/MedTechSupport/medtech_org_admin.php");;
    }
}
?>