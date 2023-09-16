<?php
// error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname="emgmedicalsystem";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn) {
  echo "conection succesfull";
}else{

    echo "Not connected";
}
?>