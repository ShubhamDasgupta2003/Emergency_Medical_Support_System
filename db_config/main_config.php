<?php
    $username = "root";
    $server = "localhost";
    $pswd = "";
    $db_name = "emgmedicalsystem";

    $con = mysqli_connect($server,$username,$pswd,$db_name);

    if($con)
    {
        echo "Connection established!";
    }else{
        echo "Connection not established!";
    }
?>

