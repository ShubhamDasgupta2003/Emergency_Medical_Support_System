<?php
include_once ('oop_connectionp.php');
$obj=new Database;
session_start();
$current_date=date('Y-m-d');
$d=0;
$s=0;
$p=0;
echo $current_date;
echo "-------------------------------";
$x= date('m');
$z= date('Y');
echo $x;
echo $z;
$sqla=$obj->admindateq("medical_supplies_order_table","price");
foreach($sqla as $rowl) 
   {
      $a=$rowl['price'];  
      $m=$rowl['month'];
      $y=$rowl['year'];
      echo  nl2br("amount".$a);
      echo  nl2br("month".$m);
      echo  nl2br("year".$y);
      if($x==$m && $z==$y)
      {
        $s=$s+$a;
      }
   }
   echo "-------------------------------";
   echo $s;

?>
