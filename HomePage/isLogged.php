<?php
 include'db_config/main_config.php';
 session_start();
 if($_SESSION['is_logged_in']==0){
    echo "<script>alert('Please loggin at first');  </script>";
 }
 header("location:index.php");
?>