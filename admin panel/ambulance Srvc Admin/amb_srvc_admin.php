<?php
include_once ('oop_connection.php');
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
    <link rel="stylesheet" href="adminb.css">
    <title>Document</title>
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
                    <a href="adminb.php"><span class="las la-igloo"></span>
                    <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/medical supplies admin/medical_supplies_admin.php" ><span class="las la-shopping-bag"></span>
                    <span>Medical Supplies</span></a>
                </li>
                <li>
                    <a href="amb_srvc_admin.php"  class="active"><span class="las la-ambulance"></span>
                    <span>Ambulance Service</span></a>
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
                        $select_pro=$obj->viewrecord("ambulance_info","null") ;
                        foreach($select_pro as $row)
                        {
                            $row_count+=1;
                        }

                     ?>
                    <h1 style="color: #fff;"><?php echo $row_count ?></h1>
                    <span>Registered Drivers</span>
                </div>
                <div>
                    <span class="las la-user-shield" style="color: #fff;"></span>
                </div>
            </div>
            <div class="card-single">
                <div>
                    <?php
                        $ord_count=0;
                        $sql=$obj->vieworder("user_ambulance","Rejected");
                        while($rowl=mysqli_fetch_array($sql))
                        {
                            $ord_count=$ord_count+1; 
                        }
                          
                     ?>
                    <h1 style="color: #fff;"><?php echo $ord_count ?></h1>
                    <span>Rides</span>
                </div>
                <div>
                    <span class="las la-ambulance" style="color: #fff;"></span>
                </div>
            </div>
            <div class="card-single">
                <div><?php
                          $t=0;
                          $j=0;
                          $sql=$obj->vieworder("user_ambulance",'Rejected');

                          while($rowl=mysqli_fetch_array($sql))
                                 {
                                    $t=$rowl['total_fare'];
                                    $j+=$t;
                                 }
                      ?>
                    <h1 style="color: #fff;"> &#8377 <?php echo $j ?></h1>
                    <span>Income</span>
                </div>
                <div>
                   <span class="lab la-google-wallet" ></span>  
                </div>
            </div>
        </div>


        <div class="recent-grid">
            <div class="projects">
                  <div class="card">
                     <div class="card-header">
                          <h2> Registered Ambulances</h2>
                          
                     </div>
                     <div class="card-body">
                           <table width="100%">
                            <thead>
                                <tr>
                                    <td>Amb No.</td>
                                    <td>Ambulance Name</td>
                                    <td>Ambulance Rate</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                      $sqla=$obj->vieworder("ambulance_info");
                                      while($rowa=mysqli_fetch_array($sqla))
                                        {
                                         
                                               echo"<tr>
                                               <td >$rowa[amb_no] </td>
                                               <td>$rowa[amb_name]</td>
                                               <td>&#8377 $rowa[amb_rate]</td>";
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
                          <h2> Ride Requests</h2>
                          
                     </div>
                     <div class="card-body">
                           <table width="100%">
                            <thead>
                                <tr>
                                    <td>Date</td>
                                    <td>Time</td>
                                    <td>Ride Id</td>
                                    <td>Amb No.</td>
                                    <td>Ride Fare</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                      $sqla=$obj->vieworder("user_ambulance");
                                      while($rowa=mysqli_fetch_array($sqla))
                                        {
                                         
                                            echo"<tr>
                                            <td >$rowa[booking_date] </td>
                                            <td >$rowa[booking_time] </td>
                                            <td >$rowa[invoice_no] </td>
                                            <td>$rowa[amb_no]</td>
                                            <td>&#8377 $rowa[total_fare]</td>";
                                        }
                                        
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