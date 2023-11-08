<?php

    session_start();

    date_default_timezone_set("Asia/calcutta");
    $order_id = $GET['order_id'];
    $cur_date = date("Y-m-d");
    $cur_time = date("H:i:s");

    include_once("db_config/main_config.php");

    $db = new Database();
    $con = $db->connect();

    if(isset($_POST['amount']) && isset($_POST['payment_id']))
    {
        $pid = $_POST['payment_id'];
        $amount = $_POST['amount'];
        $user_id = $_POST['user_id'];

        $query = "INSERT INTO `payment`(`payment_id`, `order_id`, `user_id`, `payment_type`, `time`, `date`, `amount`, `payment_status`) VALUES ('$pid','$order_id','$user_id','Ambulance Service','$cur_time','$cur_date','$amount','Complete')";

        $result = mysqli_query($con,$query);
    }
?>