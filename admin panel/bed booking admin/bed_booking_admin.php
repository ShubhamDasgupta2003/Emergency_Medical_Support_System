<?php
include_once ('oop_config.php');
date_default_timezone_set("Asia/calcutta");
$obj=new Database;
session_start();


$s=0;
$p=0;
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
                <li>
                    <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/medical supplies admin/adminb.php"><span class="las la-igloo"></span>
                    <span>Dashboard</span></a>
                </li>
                <!-- <li>
                    <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/medical supplies admin/medical_supplies_admin.php" ><span class="icons8-hospital"></span> 
                    <span>Medical Supplies</span></a>
                </li> -->
                <li>
                    <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/bed booking admin/bed_booking_admin.php"  class="active"><span class="las la-hospital"></span>
                    <span>Bed booking Service</span></a>
                </li>
              <!--  <li>
                    <a href=""><span class="las la-clipboard-list"></span>
                    <span>Projects</span></a>
                </li>
                <li>
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
                        $row_count=0;
                        $select_pro=$obj->viewrecord("hospital_info") ;
                        foreach($select_pro as $row)
                        {
                            $row_count+=1;
                        }

                     ?>
                    <h1 style="color: #fff;"><?php echo $row_count ?></h1>
                    <span>Registered Hospitals</span>
                </div>
                <div>
                    <span class="las la-user-shield" style="color: #fff;"></span>
                </div>
            </div>
            <div class="card-single">
                <div>
                    <?php
                        $ord_count=0;
                        $sqlr=$obj->select('patient_booking_info','COUNT(Patient_id) AS comp_booking')->fetch_assoc();    
                     ?>
                    <h1 style="color: #fff;"><?php echo $sqlr['comp_booking'] ?></h1>
                    <span>Successfull bookings</span>
                </div>
                <div>
                    <span class="las la-check-circle" style="color: #fff;"></span>
                </div>
            </div>
            <div class="card-single">
                <div>
                     <?php
                        $ord_count=0;
                        $sqlr=$obj->select('patient_booking_info','COUNT(Patient_id) AS latest_booking',"Booking_date >= DATE_SUB(CURDATE(), INTERVAL 1 DAY)")->fetch_assoc();    
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
                          $sql=$obj->select('patient_booking_info','SUM(bed_charge) AS earnings')->fetch_assoc();
                      ?>
                    <h1 style="color: #fff;"> &#8377 <?php echo $sql['earnings'] ?></h1>
                    <span>Income</span>
                </div>
                <div>
                   <span class="las la-wallet" ></span>  
                </div>
            </div>
        </div>


        <div class="recent-grid">
            <div class="projects">
                  <div class="card">
                     <div class="card-header">
                          <h2> Registered Hospitals</h2>
                          
                     </div>
                     <div class="card-body">
                           <table width="100%">
                            <thead>
                                <tr>
                                    <td>Hospital Id.</td>
                                    <td>Hospital Name</td>
                                    <td>Male Bed Available</td>
                                    <td>Female Bed Available</td>
                                    <td>Bed Charge</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                      $sqla=$obj->vieworder("hospital_info");
                                      while($rowa=mysqli_fetch_array($sqla))
                                        {
                                         
                                               echo"<tr>
                                               <td >$rowa[Id] </td>
                                               <td>$rowa[Name]</td>
                                               <td>$rowa[Male_bed_available]</td>
                                               <td>$rowa[Female_bed_available]</td>
                                               <td>&#8377 $rowa[bed_charge]</td>";
                                        }
                                        
                             ?>   
                            </tbody>
                           </table>
                     </div>
                  </div>
            </div>

            <div class="projects">
                  <div class="card">
                     <div class="card-header">
                          <h2> Recent Successfull Bookings</h2>
                          
                     </div>
                     <div class="card-body">
                           <table width="100%">
                            <thead>
                                <tr>
                                    <td>Date & Time</td>
                                    <!-- <td>Time</td> -->
                                    <td>Hospital Name</td>
                                    <td>Patient Id.</td>
                                    <td>Patient Name</td>
                                    <td>Contact Number</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
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
         </div>

      

    
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