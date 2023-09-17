<?php
    // session_start();
    // $uid_key = $_SESSION['userid'];
    echo 'Directed here for location update';
    $latd = $_GET['lat'];
    $lng = $_GET['lon'];
    $address = $_GET['adrss'];

    echo "<br>$latd<br>$lng<br>$address";
?>