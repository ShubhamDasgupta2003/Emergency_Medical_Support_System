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
                    <a href="medical_supplies_admin.php"  class="active"><span class="las la-shopping-bag"></span>
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
                    <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/bed booking admin/bed_booking_admin.php" ><span class="las la-hospital"></span></span>
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
                        $select_pro=$obj->viewrecord("user_info","null") ;
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
                        $sql=$obj->vieworder("medical_supplies_order_table");
                        while($rowl=mysqli_fetch_array($sql))
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
                          $sql=$obj->vieworder("medical_supplies_order_table");
                          while($rowl=mysqli_fetch_array($sql))
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
            <a href="input.php" style="color:#fff"><div class="card-single">
                <div>
                    <h1 style="color: #fff;">Input</h1>
                    <span>Table</span>
                </div>
                <div>
                </div>
            </div></a> 
            <a href="update_admin_medical_supplies.php" style="color:#fff"><div class="card-single">
                <div>
                    <h1 style="color: #fff;">Update</h1>
                    <span>Table</span>
                </div>
                <div>
                </div>
            </div></a>
            <a href="delete_admin_medical_supplies.php" style="color:#fff"><div class="card-single">
                <div>
                    <h1 style="color: #fff;">Delete</h1>
                    <span>Table</span>
                </div>
                <div>
                </div>
            </div></a> 
        </div>


        <div class="recent-grid">
            <div class="projects">
                  <div class="card">
                     <div class="card-header">
                          <h2> Mddical Supplies</h2>
                          
                     </div>
                     <div class="card-body">
                           <table width="100%">
                            <thead>
                                <tr>
                                    <td>Product ID</td>
                                    <td>Product Name</td>
                                    <td>Product Rate</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                      $sqla=$obj->vieworder("medical_supplies_medical");
                                      while($rowa=mysqli_fetch_array($sqla))
                                        {
                                         
                                               echo"<tr>
                                               <td >$rowa[product_id] </td>
                                               <td>$rowa[product_name]</td>
                                               <td>&#8377 $rowa[product_rate]</td>";
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
                          <h2> Orders</h2>
                          
                     </div>
                     <div class="card-body">
                           <table width="100%">
                            <thead>
                                <tr>
                                    <td>Order ID</td>
                                    <td>Username</td>
                                    <td>Price</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                      $sqla=$obj->vieworder("medical_supplies_order_table");
                                      while($rowa=mysqli_fetch_array($sqla))
                                        {
                                          $s=$rowa['price']*$rowa['quantity'];
                                                 echo" <tr>
                                                      <td>$rowa[order_id]</td>
                                                      <td>$rowa[user_fname] $rowa[user_lname]</td>
                                                      <td> &#8377 $s</td>
                                                  </tr>";
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
                          <h2> Technical Supplies</h2>
                          
                     </div>
                     <div class="card-body">
                           <table width="100%">
                            <thead>
                                <tr>
                                    <td>Product ID</td>
                                    <td>Product Name</td>
                                    <td>Product Rate</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                      $sqla=$obj->vieworder("medical_supplies_technical");
                                      while($rowa=mysqli_fetch_array($sqla))
                                        {
                                         
                                            echo"<tr>
                                            <td >$rowa[product_id] </td>
                                            <td>$rowa[product_name]</td>
                                            <td>&#8377 $rowa[product_rate]</td>";
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