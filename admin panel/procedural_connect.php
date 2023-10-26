<?php
    $username = "root";
    $server = "localhost";
    $pswd = "";
    $db_name = "emgmedicalsystem";

    $conn = mysqli_connect($server,$username,$pswd,$db_name);

    if(!$conn)
    {
        echo "Connection error!";
    }
?>