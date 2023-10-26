<?php
include_once ('connection.php');
$i=0;
date_default_timezone_set("Asia/calcutta");
session_start();
$uid =  $_SESSION['user_id'];
$e= $_SESSION['user_email'];
$ufname =  $_SESSION['user_fname'];
$ulname = $_SESSION['user_lname'];
$current_date=date('Y-m-d');
$current_time=date('h:i:sa');
$display=mysqli_query($conn,"SELECT * FROM cart WHERE user_id='$uid' ");
if(mysqli_num_rows($display)>0)
          {
            while($row=mysqli_fetch_assoc($display))
            {
               $u=$row['user_id'];
               $n=$row['name'];
               $p=$row['price'];
               $q= $row['quantity'];
               echo $e;
               echo $ufname;
               echo $ulname;
               echo  $current_date;
               echo $current_time;
                echo"----------------------------------------------";
               $sql="INSERT INTO `medical_supplies_order_table`( `user_id`, `product_name`, `quantity`, `date`, `time`, `user_fname`, `user_lname`, `user_email`, `price`) VALUES ('$u','$n','$q','$current_date','$current_time','$ufname','$ulname','$e',$p)";
               $result=mysqli_query($conn,$sql);
            }
          }
?>