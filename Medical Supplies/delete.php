<?php
include_once ('oop_connectionp.php');
session_start();
$obj=new Database;
if(isset($_GET['delete']))
{
    $delete_id=$_GET['delete'];
    $d=$obj->deletecart($delete_id);
    if($d)
    {
        echo "product deleted";
        header('location:cart.php');
    }
    else{

        echo "error2 ";
        header('location:cart.php');

    }
}

?>
