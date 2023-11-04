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


$s=0;
$p=0;
?>


<?php

$hos_id= $_SESSION['user_id'];
// echo "$hos_id";

$sql2=$obj->select('hospital_info','*',"Id='$hos_id'")->fetch_assoc();

// echo $sql2['Name'];

$name= $sql2['Name'];
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
                          $sql=$obj->select('hospital_info','Male_bed_available')->fetch_assoc();
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
                          $sql=$obj->select('hospital_info','Female_bed_available')->fetch_assoc();
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

            <!-- <div class="projects">
                  <div class="card">
                     <div class="card-header">
                          <h2> Recent Successfull Bookings</h2>
                          
                     </div>
                     <div class="card-body">
                           <table width="100%">
                            <thead>
                                <tr>
                                    <td>Date & Time</td>
                                    
                                    <td>Hospital Name</td>
                                    <td>Patient Id.</td>
                                    <td>Patient Name</td>
                                    <td>Contact Number</td>
                                </tr>
                            </thead>
                            <tbody>
                            php open
                                      $sqla=$obj->select('patient_booking_info','*','','Booking_date DESC LIMIT 5');
                                    //   $sqla=$obj->select('patient_booking_info','*','','Booking_date >= DATE_SUB(CURDATE(), INTERVAL 1 DAY)');
                                      while($rowa=$sqla->fetch_assoc())
                                        {
                                        //  $booking_dt = $rowa[Booking_date(yy-mm-dd)];
                                        // $DateTime=$rowa[Booking_date];
                                        // $date = date('Y-m-d', strtotime($DateTime));
                                        // $time = date('h:i:s', strtotime($DateTime));
                                            echo"<tr>
                                            <td >$rowa[Booking_date] </td>
                                            
                                            <td >$rowa[Hospital_name] </td>
                                            <td>$rowa[Patient_id]</td>
                                            <td>$rowa[Patient_name]</td>
                                            <td>$rowa[ContactNo]</td>";
                                        }
                                        // <td> &#8377 $rowa[total_fare]</td> 
                                        
                             ?>   
                            </tbody>
                           </table>
                     </div>
                  </div>
            </div>
         </div> -->

      

    
    <!--   <a href="" style="color:#fff"><div class="card-single">
                <div>
                    <h1 style="color: #fff;">Insert Data</h1>
                    <span>in the table</span>
                </div>
                <div>
                </div>
            </div></a>  
        
    
           echo"<tr>
            <td >$row[product_image] </td>
            <td>$row[product_name]</td>
            <td>&#8377 $row[product_rate]</td>
          

        </tr>"; -->
</body>
</html>