<?php
include_once ('connection.php');
if(isset($_GET['delete']))
{
    $delete_id=$_GET['delete'];
    $delete_query=mysqli_query($conn,"DELETE FROM cart WHERE ID=$delete_id")  or die("error");
    if($delete_query)
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
