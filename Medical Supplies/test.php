<?php
include_once ('oop_connectionp.php');
$obj=new Database;
session_start();
$uid='USR8882889123';
$n=$obj->numrecord($uid);
echo $n;
$records=$obj->viewrecordt();
foreach($records as $row)
{


echo" <div class='card'>
    <img src='$row[product_image]' >
    <div class='card-details'>
        <p class='card-name'>$row[product_name]</p>
        <p class='card-address'>..... </p>
        <p class='card-type'> $row[product_para]</p>
        <p class='card-fare'>&#8377 $row[product_rate]</p>
        <a href='Detailed Supply.php?pid=$row[product_id]&name=medical'><button class='btn btn-secondary-orange'>Details</button></a>
    </div>
</div>";

}

?>