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
                    <a href="http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/admin panel/MedTechSupport/medtech_admin.php" class="active"><span class="las la-landmark"></span>
                    <span>Aya/Nurse/Medical Technician Support</span></a>
                </li>
               <li>
               <li>
                    <a href="http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/admin panel/MedTechSupport/medtech_org.php"><span class="las la-clipboard-list"></span>
                    <span>Registered Organisations table</span></a>
                </li>
                <li>
                    <a href="http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/admin panel/MedTechSupport/medtech_emp.php"><span class="las la-clipboard-list"></span>
                    <span>Registered employees table</span></a>
                </li>
                <li>
                    <a href="http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/admin panel/MedTechSupport/medtech_order.php"><span class="las la-clipboard-list"></span>
                    <span>Order table</span></a>
                </li>
                    <!-- <a href="http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/db_insertions/db_config/BloodBanks.php"><span class="las la-clipboard-list"></span>
                    <span>Blood Banks</span></a>
                </li>
                <li>
                    <a href="http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/db_insertions/db_config/BloodDetails.php"><span class="las la-shopping-bag"></span>
                    <span>Blood</span></a>
                </li> -->
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
                        $select_pro=$obj->viewrecord("medtech_emp","null") ;
                        foreach($select_pro as $row)
                        {
                            $row_count+=1;
                        }

                     ?>
                    <h1 style="color: #fff;"><?php echo $row_count ?></h1>
                    <span>Registered Employees</span>
                </div>
                <div>
                    <span class="las la-user-shield" style="color: #fff;"></span>
                </div>
            </div>
            <div class="card-single">
                <div>
                    <?php
                        $ord_count=0;
                        $sqlr=$obj->select('medtech_order','COUNT(*) AS comp_rides')->fetch_assoc();    
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
                          $sql=$obj->select('medtech_order','SUM(book_amount) AS earnings')->fetch_assoc();
                      ?>
                    <h1 style="color: #fff;"> &#8377 <?php echo $sql['earnings'] ?></h1>
                    <span>Total Booked Amount</span>
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
                          <h2> Registered Employee</h2>
                          
                     </div>
                     <div class="card-body">
                           <table width="100%">
                            <thead>
                                <tr>
                                    <td>Employee ID</td>
                                    <td>Employee Name</td>
                                    <td>Contact Number</td>
                                    <td>ORG ID</td>
                                    <td>Salary</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                      $sqla=$obj->select('medtech_emp','*','','eid LIMIT 5');
                                      while($rowa=$sqla->fetch_assoc())
                                        {
                                         
                                            echo"<tr>
                                            <td >$rowa[eid] </td>
                                            <td >$rowa[ename] </td>
                                            <td >$rowa[e_cont_number]</td>
                                            <td >$rowa[org_id] </td>
                                            <td>&#8377 $rowa[salary]</td>";
                                        }
                                        
                             ?>   
                            </tbody>
                           </table>
                     </div>
                  </div>
            </div>
         </div>
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
                                    
                                    <!-- <td>Price</td> -->
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                       $sqla=$obj->select('medtech_order','*','','booking_date DESC LIMIT 5');
                                       while($rowa=mysqli_fetch_array($sqla))
                                         {
                                          
                                                echo"<tr>
                                                <td >$rowa[name] </td>
                                                <td>$rowa[eid]</td>
                                                <td>$rowa[user_book_address]</td>
                                                <td>$rowa[booking_date]</td>
                                                <td>$rowa[booking_time]</td>";
                                         }
                                         
                                        
                             ?>   
                            </tbody>
                           </table>
                     </div>
                  </div>
            </div>
    
</body>
</html>