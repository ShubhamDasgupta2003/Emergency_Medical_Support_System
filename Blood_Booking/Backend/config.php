<?php
// error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname="emgmedicalsystem";

// Create connection
$con = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($con) {
  // echo "conection succesfull";
}else{

    echo "Not connected";
}
?>