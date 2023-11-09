<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname="emgmedicalsystem";

$conn =mysqli_connect($servername, $username, $password,$dbname);

if (!$conn) {
  // echo "conection succesfull";
  echo "Not connected";
}
?>