<?php
include_once ('oop_connection.php');
session_start();
$obj=new Database;
$product_id=$_REQUEST['product_id'];
$table_name=$_REQUEST['tabletype'];


$delete=$obj->deleteadminmedical($table_name,$product_id) ;
?>
<script>
    window.location.href = 'medical_supplies_admin.php'</script>