<?php
include_once ('oop_connectionp.php');
$obj=new Database;



$i=0;
date_default_timezone_set("Asia/calcutta");
session_start();
$uid =  $_SESSION['user_id'];
$e= $_SESSION['user_email'];
$ufname =  $_SESSION['user_fname'];
$ulname = $_SESSION['user_lname'];
$current_date=date('Y-m-d');
$current_time=date('h:i:sa');

$s="";
$t=0;
$j=0;
$p=0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/amb_form_booking.css">
    <link rel="stylesheet" href="css/navlink.css">

</head>
<body>
    <div class="container">
        <div class="card">
            <?php
    
            
             $records=$obj->viewrecordc($uid);
                     foreach($records as $row)
                    {
                        {
                           $u=$row['user_id'];
                           $n=$row['name'];
                           $p=$row['price'];
                           $q= $row['quantity'];
                           
                            $s=$s." ".$n;
                           $t=$t+($p*$q);
                            $j=$j+$q;
                            $p=$u;
                           
                          
                       }
                      }

             
                   
                      ?>
            <div class="column">
                <h1 id="cnfm-msg"><i class="fa-solid fa-circle-check fa-bounce fa-2xl" style="color: #27b300;"></i> &nbsp;Booking Confirmed!</h1>
                <div class="amb_info_cont">
                    <h3>Your Order  is confirmed . Regarding any question about the order contact us with your registered <?php echo $e ?></h3>
                    <p class="descp" id="card-type"></p>
                    <p class="descp" id="card-address"><i class="fa-solid fa-calendar-days"></i>></i> Estimated Arrival</p>
                    <p class="descp" id="card-type"><?php echo date('Y-m-d', strtotime("+10 days")); ?></p>
                    <h2 class="descp" id="card-fare">Total Price: &#8377  <?php echo $t; ?></h2>
                    <div class="bton">
                    <?php 
                 
                   
             
                     // $obj->insertrecord("medical_supplies_order_table",['user_id'=>$p,'product_name'=>$s,'quantity'=>$j,'date'=>$current_date,'time'=>$current_time,'user_fname'=>$ufname,'user_lname'=>$ulname,'user_email'=>$e,'price'=>$t]);
                        $obj->insertrecordorder($p,$s,$j,$current_date,$current_time,$ufname,$ulname,$e,$t);
                        $obj->insertallorder($uid,$ufname,$current_date,$current_time);
                      echo "<a href='Receipt Generator.php?p= $t ' class='btn'>Receipt</a>"; 
                    ?>
                
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>