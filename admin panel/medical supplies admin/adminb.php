<?php
include_once ('oop_connectionp.php');
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
                    <a href="" class="active"><span class="las la-igloo"></span>
                    <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="medical_supplies_admin.php"><span class="las la-shopping-bag"></span>
                    <span>Medical Supplies</span></a>
                </li>
                <li>
                    <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/ambulance Srvc admin/amb_srvc_admin.php" ><span class="las la-ambulance"></span>
                    <span>Ambulance Service</span></a>
                </li>
                <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/Blood_Bank/adminb.php" ><i class="fa-solid fa-building-columns"></i></span>
                <li>
                    <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/Blood_Bank/adminb.php"> <span class="las la-landmark"></span>
                    <span>Blood Bannk Service</span></a>
                </li>
                <li>
                    <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/bed booking admin/bed_booking_admin.php" ><span class="las la-hospital"></span>
                    <span>Bed Booking Service</span></a>
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
       
    </header>
    <main>
        <div class="cards">
            <div class="card-single">
                <div>
                    <?php
                        $row_count=0;
                        $select_pro=$obj->viewuser() ;
                        foreach($select_pro as $row)
                        {
                            $row_count+=1;
                        }

                     ?>
                    <h1 style="color: #fff;"><?php echo $row_count ?></h1>
                    <span>Customers</span>
                </div>
                <div>
                    <span class="las la-users" style="color: #fff;"></span>
                </div>
            </div>
            <div class="card-single">
                <div>
                    <?php
                        $ord_count=0;
                        $sql=$obj->viewall_order();
                        foreach($sql as $row)    
                        {
                            $ord_count=$ord_count+1; 
                        }
                     ?>
                    <h1 style="color: #fff;"><?php echo $ord_count ?></h1>
                    <span>orders</span>
                </div>
                <div>
                    <span class="las la-shopping-bag" style="color: #fff;"></span>
                </div>
            </div>
            <div class="card-single">
                <div><?php
                          $t=0;
                          $j=0;
                          
                          $sql=$obj->viewmedical_order();
                              foreach($sql as $rowl) 
                                 {
                                    $t=$rowl['price'];
                                    $j=$rowl['quantity'];
                                       $s=$t*$j;
                                       $p=$p+$s;
                                 }
                    
                      ?>
                    <h1 style="color: #fff;"> &#8377 <?php echo $p ?></h1>
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
                          <h2> Orders</h2>
                          
                     </div>
                     <div class="card-body">
                           <table width="100%">
                            <thead>
                                <tr>
                                    <td>User ID</td>
                                    <td>Username</td>
                                    <td>Service</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                      $sqla=$obj->viewall_order();
                                      foreach($sqla as $rowa) 
                                        {
                                          
                                                 echo" <tr>
                                                      <td>$rowa[user_id]</td>
                                                      <td>$rowa[user_fname]</td>
                                                      <td>$rowa[service]</td>
                                                  </tr>";
                                            }
                                        
                             ?>   
                            </tbody>
                           </table>
                     </div>
                  </div>
            </div>
            <div class="customers">
                <div class="card">
                    <div class="card-header">
                         <h2> Customers</h2>
                         <!--<button> See All <span class="las la-arrow-right"></span></button> -->
                    </div>
                    <div class="card-body">
                    <?php
                                     $q=$obj->viewuser();
                                     if($q)
                                        {
                                            foreach($q as $r) 
                                            {
                                                echo" <div class='customer'>
                                                            <div class='info'>
                                                            <div>
                                                                <h4>$r[user_first_name]</h4>
                                                                <h4>$r[user_last_name]</h4>
                                                            </div>
                                                        </div>
                                                        <div class='contact'><span class='las la-user-circle'></span>
                                                            <span class='las la-user-comment'></span>
                                                            <span class='las la-user-phone'></span>
                                                        </div>                      
                                                                                </div>";                                     
                                            }
                                        }
                        ?>
                    
            </div>
        </div>
    </main>
   </div>



</body>
</html>