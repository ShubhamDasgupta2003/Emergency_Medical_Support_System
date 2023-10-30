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
                    <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/medical supplies admin/adminb.php"><span class="las la-igloo"></span>
                    <span>Dashboard</span></a>
                </li>
                
                <li>
                    <a href=""  class="active"><span class="las la-landmark"></span>
                    <span>Blood Bank Service</span></a>
                </li>
               <li>
                    <a href="http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/db_insertions/db_config/BloodBanks.php"><span class="las la-clipboard-list"></span>
                    <span>Blood Banks</span></a>
                </li>
                <li>
                    <a href="http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/db_insertions/db_config/BloodDetails.php"><span class="las la-shopping-bag"></span>
                    <span>Blood</span></a>
                </li>
                <!-- <li>
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
                </li>   -->
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
                        $select_pro=$obj->viewrecord("blood_bank","null") ;
                        foreach($select_pro as $row)
                        {
                            $row_count+=1;
                        }

                     ?>
                    <h1 style="color: #fff;"><?php echo $row_count ?></h1>
                    <span>Registered Blood Banks</span>
                </div>
                <div>
                    <span class="las la-user-shield" style="color: #fff;"></span>
                </div>
            </div>
            <div class="card-single">
                <div>
                    <?php
                        $ord_count=0;
                        $sqlr=$obj->select('blood_order','COUNT(order_id) AS comp_rides')->fetch_assoc();    
                     ?>
                    <h1 style="color: #fff;"><?php echo $sqlr['comp_rides'] ?></h1>
                    <span>Successfull Orders</span>
                </div>
                <div>
                    <span class="las la-check-circle" style="color: #fff;"></span>
                </div>
            </div>
           
            <div class="card-single">
                <div><?php
                          $t=0;
                          $j=0;
                          $sql=$obj->select('blood_order','SUM(price) AS earnings')->fetch_assoc();
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
                          <h2> Ride Requests</h2>
                          
                     </div>
                     <div class="card-body">
                           <table width="100%">
                            <thead>
                                <tr>
                                    <td>Blood Bank Name</td>
                                    <td>Dist</td>
                                    <td>City</td>
                                    <td>Pincode</td>
                                    <!-- <td>Price</td> -->
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                       $sqla=$obj->vieworder("blood_bank");
                                       while($rowa=mysqli_fetch_array($sqla))
                                         {
                                          
                                                echo"<tr>
                                                <td >$rowa[name] </td>
                                                <td>$rowa[dist]</td>
                                                <td>$rowa[city]</td>
                                                <td>$rowa[pincode]</td>";
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
                                    <td>Order Id</td>
                                    <td>Blood Group</td>
                                    <td>Price</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                      $sqla=$obj->select('blood_order','*','','Order_date DESC LIMIT 5');
                                      while($rowa=$sqla->fetch_assoc())
                                        {
                                         
                                            echo"<tr>
                                            <td >$rowa[Order_date] </td>
                                            <td >$rowa[Order_time] </td>
                                            <td >$rowa[Order_id]</td>
                                            <td >$rowa[Blood_gr] </td>
                                            <td>&#8377 $rowa[price]</td>";
                                        }
                                        
                             ?>   
                            </tbody>
                           </table>
                     </div>
                  </div>
            </div>
         </div>

    
</body>
</html>