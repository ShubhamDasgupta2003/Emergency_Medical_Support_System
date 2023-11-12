<?php
include_once ('oop_connectionp.php');
session_start();
$obj=new Database;
$product_id=$_REQUEST['product_id'];
$table_name=$_REQUEST['tabletype'];
$n=$obj->numrecorda($table_name);

$delete=$obj->deleteadminmedical($table_name,$product_id) ;
$e=$obj->numrecorda($table_name);
if($n!=$e)
{
    ?><script>alert("specified item is  deleted");</script><?php
}
else if($n==$e){
    ?><script>alert("specified item is not deleted");</script><?php
}
?>
<script>
    window.location.href = 'medical_supplies_admin.php'</script>