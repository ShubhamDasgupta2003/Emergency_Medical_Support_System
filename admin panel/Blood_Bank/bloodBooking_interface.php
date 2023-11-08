<?php
// header("Refresh: 20 ;url=/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/bed booking admin/hospital_interface.php");
include_once ('oop_connection.php');
date_default_timezone_set("Asia/calcutta");
$obj=new Database;
session_start();

if($_SESSION['is_blood_login']!=1)
    {
        echo "<script>alert('Please Login to continue!');
        window.location.href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/adminlogin.php';</script>";

    }


$s=0;
$p=0;

$blood_bank_id=$_SESSION['blood_bank_id']; 
$sql2=$obj->select('blood_bank','*',"blood_bank_id='$blood_bank_id'")->fetch_assoc();
?>

<?php
// $sql3=$obj->select("blood_order","*","bloodbank_id='$id' ");
// while($rowa=$sql3->fetch_assoc()){
//     $curr_timestamp = time();
//     // echo $curr_timestamp."<br>";
//     $stored_timestamp = $rowa['booking_timestamp'];

//     $diff = ($curr_timestamp - $stored_timestamp);
//     // echo $diff."<br>";
//     // echo $diff."<br>";
//     if($diff >= 120){
//         $booking_status = "expired";
//         $exp_ptn =  $rowa['Patient_id'];
//         $sql4=$obj->update("patient_booking_info",array("booking_status"=>$booking_status),"Patient_id ='$exp_ptn'");
        
//     }
//     // $result=$obj->update("hospital_info",array("Male_bed_available"=>$m_bedcount,"Female_bed_available"=>$f_bedcount),"Id='$hos_id'");
//     // echo "$rowa[Patient_name]";
// }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="bed_booking_admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Blood Bank | Dashboard</title>
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
                    <a href=""  class="active"><span class="las la-landmark"></span>
                    <span>Your Blood Bank </span></a>
                </li>
               <!-- <li>
                    <a href="http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/db_insertions/db_config/BloodBanks.php"><span class="las la-clipboard-list"></span>
                    <span>Blood Banks</span></a>
                </li>
                <li>
                    <a href="http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/db_insertions/db_config/BloodDetails.php"><span class="las la-shopping-bag"></span>
                    <span>Blood</span></a>
                </li> -->
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
            
            <div>
                
                <h5><i class="fa-solid fa-user fa-lg account-avatar"></i><?php echo "  ".$sql2['name']; ?></h5>
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
                        $sqlr=$obj->select('blood_order','COUNT(order_id) AS comp_orders',"bloodbank_id='$blood_bank_id'")->fetch_assoc();    
                     ?>
                    <h1 style="color: #fff;"><?php echo $sqlr['comp_orders'] ?></h1>
                    <span>Successfull Orders</span>
                </div>
                <div>
                    <span class="las la-check-circle" style="color: #fff;"></span>
                </div>
            </div>
            <div class="card-single">
                <div>
                     <?php
                        $ord_count=0;
                        $sqlr=$obj->select('blood_order','COUNT(order_id) AS latest_booking',"Order_date >= DATE_SUB(NOW(), INTERVAL 1 DAY) AND bloodbank_id='$blood_bank_id'")->fetch_assoc();    
                     ?>
                    <h1 style="color: #fff;"> <?php  echo $sqlr['latest_booking'] ?> </h1>
                    <span>Orders in Last 24 Hour</span>
                </div>
                <div>
                    <span class="las la-clock" style="color: #fff;"></span>
                </div>
            </div>

            <div class="card-single">
                <div><?php
                          $t=0;
                          $j=0;
                          $sql=$obj->select('blood_order','SUM(price) AS earnings',"bloodbank_id='$blood_bank_id'")->fetch_assoc();
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
        
                     </div>
                  </div>
                  <div class="card">
                     <div class="card-header">
                          <h2>Blood Details</h2>
                          
                     </div>
                     <div class="card-body table table-bordered">
                           <table width="100%">
                            <thead>
                                <tr>
                                <td>Blood Group</td>
                                <td>Quantity</td>
                                <td>Operations</td>
                                </tr>
                            </thead>
                            <?php
                                    //   $sqla=$obj->vieworder("patient_booking_info");
                                    $sqla=$obj->select('blood_bank_blood_group','*',"blood_bank_id='$blood_bank_id'");
                                    while($rowa=mysqli_fetch_assoc($sqla))
                                    {
                                        ?>
                                        <tbody>
                                            <?php
                                                $bg_id=$rowa['blood_group_id'];
                                                $sqlb=$obj->select('blood_group','*',"blood_group_id='$bg_id'");
                                                while($rowb=mysqli_fetch_assoc($sqlb))
                                                {
                                            ?>  
                                               <td ><?php echo $rowb['group_name'] ?> </td>
                                            <?Php
                                                }
                                            ?>
                                               <form action="update_bloodDetails.php" method="get">
                                               <td><input type="number" name="ucount" class="form-control" value="<?php echo $rowa['count'] ;
                                                ?>"></td>
                                                <!-- <td><a href='Update_BloodDetails.php?bg_id=?>'> </a></td> -->
                                                <td><input type="submit" value='Update' name='submit' class="btn btn-sm btn-success"></td>
                                                <td><input type="hidden" name="bg_id" value="<?php echo $bg_id?>"> </td>
                                                </form>
                                               <!-- <td><a href='' class='btn btn-sm btn-success check'><i class="fa-solid fa-check"></i></a></td> -->
                                               
                                               
                                            </tbody>
                                            <?php
                                        }   
                             ?>   
                           </table>
                     </div>
                  </div>

                  <div class="projects">
                  <div class="card">
                     <div class="card-header">
                          <h2> Blood Orders</h2>
                          
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
                                      $sqlc=$obj->select('blood_order','*','bloodbank_id='.$blood_bank_id,'Order_date DESC');
                                      while($rowc=$sqlc->fetch_assoc())
                                        {
                                         
                                            echo"<tr>
                                            <td >$rowc[Order_date] </td>
                                            <td >$rowc[Order_time] </td>
                                            <td >$rowc[Order_id]</td>
                                            <td >$rowc[Blood_gr] </td>
                                            <td>&#8377 $rowc[price]</td>";
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