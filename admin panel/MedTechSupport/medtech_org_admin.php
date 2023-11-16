<?php
header("Refresh: 20 ;url=/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/MedTechSupport/medtech_org_admin.php");
include_once ('oop_connection.php');
date_default_timezone_set("Asia/calcutta");
$obj=new Database;
session_start();

if($_SESSION['is_adm_login']!=1)
    {
        echo "<script>alert('Please Login to continue!');
        window.location.href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/adminlogin.php';</script>";

    }


$s=0;
$p=0;
?>


<?php

$hos_id= $_SESSION['adm_hos_id']; // hospital session variable 
$sql2=$obj->select('medtech_org','*',"org_id='$hos_id'")->fetch_assoc();

// echo $sql2['Name'];

$name= $sql2['org_name'];
?>

<?php
$sql3=$obj->select("patient_booking_info","*","Hospital_name='$name' AND booking_status='booked'");
while($rowa=$sql3->fetch_assoc()){
    $curr_timestamp = time();
    // echo $curr_timestamp."<br>";
    $stored_timestamp = $rowa['booking_timestamp'];

    $diff = ($curr_timestamp - $stored_timestamp);
    if($diff >= 120){
        $booking_status = "expired";
        $exp_ptn =  $rowa['Patient_id'];
        $sql4=$obj->update("patient_booking_info",array("booking_status"=>$booking_status),"Patient_id ='$exp_ptn'");
        
    }

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="adminb.css">
    <title>Organisation | Dashboard</title>
</head>
<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-accusoft"></span><span>Index</span></h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/MedTechSupport/medtech_org_admin.php"  class="active"><span class="las la-igloo"></span>
                    <span>Dashboard</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
    <header>
        <h3>
           <label for="nav-toggle">
             <span class="las la-bars"></span>
           </label>
           Dashboard
        </h3>
        <div class="search-wrapper">
            
        </div>

        <div class="user-wrapper">
            <i class="fa-solid fa-user fa-lg account-avatar"></i>
            <div>
                <h4>user</h4>
                <small>Super Admin</small>
            </div>
        </div>
    </header>
    <main>
        <div class="cards">
            <div class="card-single">
                <div>
                <?php
                        $ord_count=0;
                        $sqlr=$obj->select('medtech_emp','COUNT(*) AS comp_rides',"org_id='$hos_id'")->fetch_assoc();    
                     ?>
                    <h1 style="color: #fff;"><?php echo $sqlr['comp_rides'] ?></h1>
                    <span>No of Register Employee</span>
                </div>
                <div>
                    <span class="las la-user-shield" style="color: #fff;"></span>
                </div>
            </div>
            <div class="card-single">
                <div>
                <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/emp_registration.php">
                    <span>Click Here to Add Employee</span>
</a>
                </div>
                <div>
                    <span class="las la-check-circle" style="color: #fff;"></span>
                </div>
            </div>
        </div>


        <div class="recent-grid">
            <div class="projects">
                  <div class="card">
                     <div class="card-header">
                          <h2> Registered Employee</h2>
                          
                     </div>
                     <div class="card-body">
                           <table width="100%">
                            <thead>
                                <tr>
                                    <td>Employee ID</td>
                                    <td>Employee Name</td>
                                    <td>Gender</td>
                                    <td>Contact Number</td>
                                    <td>ORG ID</td>
                                    <td>Salary</td>
                                    <td>Status</td>
                                    <td>Operations<td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                      $sqla=$obj->select('medtech_emp','*',"org_id='$hos_id'",'');
                                      
                                      while($rowa=$sqla->fetch_assoc())
                                        {
                                            
                                            echo"<tr>
                                            <td >$rowa[eid] </td>
                                            <td >$rowa[ename] </td>
                                            <td >$rowa[emp_gender] </td>
                                            <td >$rowa[e_cont_number]</td>
                                            <td >$rowa[org_id] </td>
                                            <td>&#8377 $rowa[salary]</td>
                                            <td >$rowa[e_status] </td>
                                            <td>
                                                <a href=\"medtech_emp_update.php?eid=$rowa[eid]\">
                                                    <button class=\"btn btn_blue\">Update</button>
                                                
                                                <a href=\"medtech_emp_delete.php?eid=$rowa[eid]\">
                                                <button class=\"btn btn_red\" onclick='return checkdelete()'>Delete</button>
                                                </a>
                                            </td>
                                        </tr>";
                                        }
                                        
                             ?>   
                            </tbody>
                           </table>
                     </div>
                  </div>
            </div>
      </div><br>
         <div class="projects">
                  <div class="card">
                     <div class="card-header">
                          <h2> Orders</h2>
                          
                     </div>
                      <div class="card-body">
                           <table width="100%">
                            <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Employee Id</td>
                                    <td>Address</td>
                                    <td>Book Date</td>
                                    <td>Book Time</td>
                                    <td>Status</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                       $sqla=$obj->select('medtech_emp em INNER JOIN medtech_order om
                                       ON em.eid = om.eid','*',"org_id='$hos_id'",'');
                                       while($rowa=mysqli_fetch_array($sqla))
                                         {
                                          
                                                echo"<tr>
                                                <td >$rowa[name] </td>
                                                <td>$rowa[eid]</td>
                                                <td>$rowa[user_book_address]</td>
                                                <td>$rowa[booking_date]</td>
                                                <td>$rowa[booking_time]</td>
                                                <td>$rowa[status]</td>";
                                         }             
                                        ?>   
                            </tbody>
                           </table>
                     </div> 
                  </div>
            </div>
                                        </div>
                                        </div>
</body>
<script>
    function checkdelete(){
        return confirm('Are you sure you want to delete this employee?');
    }
</script>
</html>