<?Php
  include_once("db_config/main_config.php");
  session_start();
  $user_id=$_SESSION['user_id'];
  $sql="SELECT * FROM `user_info` WHERE user_id='$user_id'";
  $result=mysqli_query($con,$sql) or die ("error found in sql query");
  $data=mysqli_fetch_assoc($result);
  
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email_id'];
    $cont_num = $_POST['contact_num'];
    $dob = $_POST['dob'];
    $district = $_POST['district'];
    $town_vill = $_POST['city-vill'];
    $state = $_POST['state'];
    $postcode = $_POST['post_code'];
    $cur_timestamp = date("l jS \of F Y h:i:s A");

    if($data['user_email']!=$email){
        header("location:verification_email.php");
    }


    $update_sql= "UPDATE `user_info` SET `user_first_name`='$fname',`user_last_name`='$lname',`user_dob`='$dob',`user_email`='$email',`user_contactno`='$cont_num',`state`='$state',`district`='$district',`town_vill`='$town_vill',`pincode`='$postcode' WHERE user_id='$user_id'";

    $res=mysqli_query($con,$update_sql);

    if($res){
        // echo "data inserted succesfully";
    }else{
        echo "data not inserted";
    }

    // for redirection to index.php 
    header("location:index.php");

?>