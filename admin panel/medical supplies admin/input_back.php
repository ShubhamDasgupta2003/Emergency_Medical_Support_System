<?php
include_once ('oop_connectionp.php');
session_start();
$obj=new Database;
$product_id=$_REQUEST['product_id'];
$source_id=$_REQUEST['source_id'];
$product_name=$_REQUEST['product_name'];
$product_rate=$_REQUEST['product_rate'];

$file_name=$_FILES['photo']['name'];
$file_name_temp_name=$_FILES['photo']['tmp_name'];
$product_image_folder='../../Medical Supplies/'.$file_name;
$product_image_foldera='../../Medical Supplies/image/pain relief/'.$file_name;
move_uploaded_file($file_name_temp_name, $product_image_folder);
move_uploaded_file($file_name_temp_name, $product_image_foldera);
$table_name=$_REQUEST['tabletype'];
$product_info=$_REQUEST['product_info'];
$product_desc=$_REQUEST['product_desc'];
$product_makers=$_REQUEST['product_makers'];
$product_email=$_REQUEST['email'];
$product_phone=$_REQUEST['drvcont'];
$product_password=$_REQUEST['pswd'];
$n=$obj->numrecorda($table_name);
$insert=$obj->insertadminmedical($table_name,$product_id,$source_id,$product_name,$product_rate,$file_name,$product_info,$product_desc,$product_makers,$product_password,$product_email,$product_phone) ;
$e=$obj->numrecorda($table_name);
if($n!=$e)
{
    ?><script>alert("specified item is inserted");</script><?php
}
else if($n==$e){
    ?><script>alert("specified item is not inserted");</script><?php
}
?>
<script>
    window.location.href = 'medical_supplies_admin.php'</script>