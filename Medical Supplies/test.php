<?php
include_once ('oop_connectionp.php');
$obj=new Database;
session_start();
$uid='USR8882889123';
$n=$obj->numrecord($uid);
/*
echo $n;
$current_date=date('Y-m-d');
$current_time=date('h:i:sa');

$records=$obj->viewrecordm();
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
/*
$product_name="test";
$product_price=5;
$product_image="testimg";
$product_quantity=7;
$s=$obj->insertcart($product_name,$product_price,$product_image, $product_quantity,$uid);
$ufname="test";
$l=$obj->insertallorder($uid,$ufname,$current_date,$current_time);
*/
if(isset($_GET['search_data_product']))
{
    $search_data_value=$_GET['search_data'];
    $search_data_value= trim($search_data_value);
    $search_query="SELECT * FROM medical_supplies_medical WHERE product_keywords like '%$search_data_value%'";
    echo $search_query;
}
$records=$obj->viewsearch($search_query);
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