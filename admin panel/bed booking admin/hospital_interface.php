<?php
header("Refresh: 20 ;url=/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/bed booking admin/hospital_interface.php");
include_once ('oop_config.php');
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
//    $patient_id= $_SESSION['p_id']; //patient session variable

    $hos_id= $_SESSION['adm_hos_id']; // hospital session variable 
// echo "$hos_id";

$sql2=$obj->select('hospital_info','*',"Id='$hos_id'")->fetch_assoc();

// echo $sql2['Name'];

$name= $sql2['Name'];
?>

<?php
$sql3=$obj->select("patient_booking_info","*","Hospital_name='$name' AND booking_status='booked'");
while($rowa=$sql3->fetch_assoc()){
    $curr_timestamp = time();
    // echo $curr_timestamp."<br>";
    $stored_timestamp = $rowa['booking_timestamp'];

    $diff = ($curr_timestamp - $stored_timestamp);
    // echo $diff."<br>";
    // echo $diff."<br>";
    if($diff >= 300){
        $booking_status = "expired";
        $exp_ptn =  $rowa['Patient_id'];
        $sql4=$obj->update("patient_booking_info",array("booking_status"=>$booking_status),"Patient_id ='$exp_ptn'");
        
    }
    // $result=$obj->update("hospital_info",array("Male_bed_available"=>$m_bedcount,"Female_bed_available"=>$f_bedcount),"Id='$hos_id'");
    // echo "$rowa[Patient_name]";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="bed_booking_admin.css">
    <title>Bed booking service | Dashboard</title>
</head>
<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-accusoft"></span><span>Index</span></h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <!-- <li>
                    <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/medical supplies admin/adminb.php"><span class="las la-igloo"></span>
                    <span>Dashboard</span></a>
                </li> -->
                <!-- <li>
                    <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/medical supplies admin/medical_supplies_admin.php" ><span class="icons8-hospital"></span> 
                    <span>Medical Supplies</span></a>
                </li> -->
                <li>
                    <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/bed booking admin/hospital_interface.php"  class="active"><span class="las la-igloo"></span>
                    <span>Dashboard</span></a>
                </li>
               <li>
                    <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/bed booking admin/display_update_bed.php"><span class="las la-clipboard-list"></span>
                    <span>Update Beds</span></a>
                </li>
                <li>
                    <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/bed booking admin/update_hos_info.php"><span class="las la-hospital"></span>
                    <span>Update Hospital Details</span></a>
                </li>
               <!--  <li>
                    <a href=""><span class="las la-shopping-bag"></span>
                    <span>Orders</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-circle"></span>
                    <span>Inventory</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-circle"></span>
                    <span>Accounts</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-clipboard-list"></span>
                    <span>Inventory</span></a>
                </li>  -->
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
                <!-- <h4> echo $sql2['Name']; </h4> -->
                <h4><?php echo $name; ?></h4>
                <small><?php echo $sql2['Id']; ?></small>
            </div>
        </div>
    </header>
    <main>
        <div class="cards">
            <!-- <div class="card-single">
                <div>
                    php open
                        $row_count=0;
                        $select_pro=$obj->viewrecord("hospital_info") ;
                        foreach($select_pro as $row)
                        {
                            $row_count+=1;
                        }

                     php close
                    <h1 style="color: #fff;"> php open echo $row_count php close</h1>
                    <span>Registered Hospitals</span>
                </div>
                <div>
                    <span class="las la-user-shield" style="color: #fff;"></span>
                </div>
            </div> -->
            <div class="card-single">
                <div>
                    <?php
                        // $ord_count=0;
                        $sqlr=$obj->select('patient_booking_info','COUNT(Patient_id) AS comp_booking',"Hospital_name='$name'")->fetch_assoc();    
                     ?>
                    <h1 style="color: #fff;"><?php echo $sqlr['comp_booking'] ?></h1>
                    <span>Successfull bookings through Emergency Medical Support System</span>
                </div>
                <div>
                    <span class="las la-check-circle" style="color: #fff;"></span>
                </div>
            </div>
            <div class="card-single">
                <div>
                     <?php
                        $ord_count=0;
                        $sqlr=$obj->select('patient_booking_info','COUNT(Patient_id) AS latest_booking',"Booking_date >= DATE_SUB(NOW(), INTERVAL 1 DAY) AND Hospital_name='$name'")->fetch_assoc();    
                     ?>
                    <h1 style="color: #fff;"> <?php  echo $sqlr['latest_booking'] ?> </h1>
                    <span>Last 24 Hour Successfull Bookings</span>
                </div>
                <div>
                    <span class="las la-clock" style="color: #fff;"></span>
                </div>
            </div>
            <div class="card-single">
                <div><?php
                          $t=0;
                          $j=0;
                          $sql=$obj->select('hospital_info','Male_bed_available',"Id='$hos_id'")->fetch_assoc();
                      ?>
                    <h1 style="color: #fff;"> <?php echo $sql['Male_bed_available'] ?></h1>
                    <span>Male Beds Available</span>
                </div>
                <div>
                   <span class="las la-male" ></span>  
                </div>
            </div>
            <div class="card-single">
                <div><?php
                          $t=0;
                          $j=0;
                          $sql=$obj->select('hospital_info','Female_bed_available',"Id='$hos_id'")->fetch_assoc();
                      ?>
                    <h1 style="color: #fff;"> <?php echo $sql['Female_bed_available'] ?></h1>
                    <span>Female Beds Available</span>
                </div>
                <div>
                   <span class="las la-female" ></span>  
                </div>
            </div>
        </div>


        <div class="recent-grid">
            <div class="projects">
            <div class="card">
                     <div class="card-header">
                          <h2> Patient Verification</h2>   
                     </div>
                     <div class="card-body">
                        <section class="search">
	                        <form action="" method="post">		    
		                        <input class="box" name="patient_id" placeholder="Enter patient id..." required>		    	
		                        <button name="submit" class="search-butt box">Search</button>
	                        </form>
                        </section>
                        <?php
                            if(isset($_POST['submit'])){
                                $given_id= $_POST['patient_id'];
                                $sqlb=$obj->select('patient_booking_info','*',"Patient_id='$given_id' AND Hospital_name='$name'")->fetch_assoc();
                                // $status= $sqlb['booking_status'];
                                // echo "$status";
                                if(empty($sqlb)){
                                    echo "No record found for id : $given_id";
                                }elseif($sqlb['booking_status']=="booked"){
                                    // echo "record found";
                                   echo"
                                   <table>
                                   <thead>
                                    <tr>
                                        <td>Patient Id.</td>
                                        <td>Date & Time</td>
                                        <td>Patient Name</td>
                                        <td>Contact Number</td>
                                        <td>Age</td>
                                        <td>Gender</td>
                                        <td>Email</td>
                                        <td>Address</td>
                                        <td>Postal Code</td>
                                        <td>Action</td>
                                    </tr>
                                </thead> 
                                <tbody>";

                                echo"<tr>
                                               <td >$sqlb[Patient_id] </td>
                                               <td >$sqlb[Booking_date] </td>
                                               <td>$sqlb[Patient_name]</td>
                                               <td>$sqlb[ContactNo]</td>
                                               <td>$sqlb[Age]</td>
                                               <td>$sqlb[Gender]</td>
                                               <td>$sqlb[email]</td>
                                               <td>$sqlb[Address2]</td>
                                               <td>$sqlb[Pin]</td>
                                               <td><form action='admit.php' method='post'><button class='box' name='admit'>Admit</button></form></td> 
                                               ";
                                   echo"     </tbody>
                                    </table>";
                                }
                                else{
                                    // echo "record found";
                                   echo"
                                   <table>
                                   <thead>
                                    <tr>
                                        <td>Patient Id.</td>
                                        <td>Date & Time</td>
                                        <td>Patient Name</td>
                                        <td>Contact Number</td>
                                        <td>Age</td>
                                        <td>Gender</td>
                                        <td>Email</td>
                                        <td>Address</td>
                                        <td>Postal Code</td>
                                        <td>Status</td>
                                    </tr>
                                </thead> 
                                <tbody>";

                                echo"<tr>
                                               <td >$sqlb[Patient_id] </td>
                                               <td >$sqlb[Booking_date] </td>
                                               <td>$sqlb[Patient_name]</td>
                                               <td>$sqlb[ContactNo]</td>
                                               <td>$sqlb[Age]</td>
                                               <td>$sqlb[Gender]</td>
                                               <td>$sqlb[email]</td>
                                               <td>$sqlb[Address2]</td>
                                               <td>$sqlb[Pin]</td>
                                               <td>$sqlb[booking_status]</td>
                                               ";
                                   echo"     </tbody>
                                    </table>";
                                }
                            }
                        ?>
                           <!-- <table width="100%">
                            <thead>
                                <tr>
                                    <td>Patient Id.</td>
                                    <td>Date & Time</td>
                                    <td>Patient Name</td>
                                    <td>Contact Number</td>
                                    <td>Age</td>
                                    <td>Gender</td>
                                    <td>DOB</td>
                                    <td>Email</td>
                                    <td>Address</td>
                                    <td>Postal Code</td>
                                </tr>
                            </thead>
                            <tbody> -->
                            <!-- php open  -->
                                    <!-- //   $sqla=$obj->vieworder("patient_booking_info");
                                    $sqla=$obj->select('patient_booking_info','*',"Hospital_name='$name'");
                                      while($rowa=mysqli_fetch_assoc($sqla))
                                        {
                                         
                                               echo"<tr>
                                               <td >$rowa[Patient_id] </td>
                                               <td >$rowa[Booking_date] </td>
                                               <td>$rowa[Patient_name]</td>
                                               <td>$rowa[ContactNo]</td>
                                               <td>$rowa[Age]</td>
                                               <td>$rowa[Gender]</td>
                                               <td>$rowa[Dob]</td>
                                               <td>$rowa[email]</td>
                                               <td>$rowa[Address2]</td>
                                               <td>$rowa[Pin]</td>
                                               ";
                                        }
                                        
                             ?>   
                            </tbody>
                           </table> -->
                     </div>
                  </div>
                  <div class="card">
                     <div class="card-header">
                          <h2> Patient Details</h2>
                          
                     </div>
                     <div class="card-body">
                           <table width="100%">
                            <thead>
                                <tr>
                                    <td>Patient Id.</td>
                                    <td>Date & Time</td>
                                    <td>Patient Name</td>
                                    <td>Contact Number</td>
                                    <td>Age</td>
                                    <td>Gender</td>
                                    <td>DOB</td>
                                    <td>Email</td>
                                    <td>Address</td>
                                    <td>Postal Code</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    //   $sqla=$obj->vieworder("patient_booking_info");
                                    $sqla=$obj->select('patient_booking_info','*',"Hospital_name='$name'");
                                      while($rowa=mysqli_fetch_assoc($sqla))
                                        {
                                         
                                               echo"<tr>
                                               <td >$rowa[Patient_id] </td>
                                               <td >$rowa[Booking_date] </td>
                                               <td>$rowa[Patient_name]</td>
                                               <td>$rowa[ContactNo]</td>
                                               <td>$rowa[Age]</td>
                                               <td>$rowa[Gender]</td>
                                               <td>$rowa[Dob]</td>
                                               <td>$rowa[email]</td>
                                               <td>$rowa[Address2]</td>
                                               <td>$rowa[Pin]</td>
                                               ";
                                        }
                                        
                             ?>   
                            </tbody>
                           </table>
                     </div>
                  </div>
            </div>
</body>
</html>