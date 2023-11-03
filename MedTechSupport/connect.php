<?php
$hostname="localhost";
$username="root";
$password="";
$dbname="emgmedicalsystem";
$conn=mysqli_connect($hostname,$username,$password,$dbname);
if($conn){
    // echo "Connection was successful";
}
else{
    echo "Sorry we failed to connect";
}
?>