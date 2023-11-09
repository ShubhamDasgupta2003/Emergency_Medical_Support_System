<?php
    session_start();
    $userid = $_SESSION['user_id'];
    include "config.php";

    $query = "SELECT `user_first_name`,`user_last_name`,`user_email`, `user_contactno`,`formatted_adrrs` FROM `user_info` WHERE user_id='$userid'";
    

    $result = mysqli_query($conn,$query);
    if($result)
    {
        $rows = mysqli_fetch_assoc($result);
    }
    $amount = $_GET['amount'];
    $blood_bank_id=$_GET['blood_bank_id'];
    $_SESSION['bank_id'] = $blood_bank_id;

    $pnt_name=$_GET['pname'];
    // $order_id=$_GET['order_id'];
    // $_SESSION['blood_order_id']='$order_id';
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/payment.css">
    <link rel="stylesheet" href="css/navbar.css">
    <!-- <link rel="stylesheet" href="css/amb_form_booking.css"> -->
    <title>Payment</title>
</head>
<body>
    <?php
        echo "<div class='container'>
        <form>
            <h1 id='title'>Payment Details</h1>
            <div class='row'>
                <h2 id='label'>User name</h2>
                <h2 id='value'>$rows[user_first_name] $rows[user_last_name]</h2>
            </div>
            
            <div class='row'>
                <h2 id='label'>Patient Name</h2>
                <h2 id='value'>$pnt_name</h2>
            </div>
            <div class='row'>
                <h2 id='label'>Email id</h2>
                <h2 id='value'>$rows[user_email]</h2>
            </div>
            
            <div class='row' id='order_total'>
                <h2 id='label'>Payment amount</h2>
                <h1 id='value'>&#8377 $amount/-</h1>
            </div>
            <input type='button' class='btn' name='btn' id='btn' value='Confirm & Pay' onclick='pay_now()'/>
        </form>
    </div>";
    ?>


  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
        const urlParams = new URLSearchParams(window.location.search);
        var order_id = urlParams.get('order_id');   //Get orderid from url
        var amount = urlParams.get('amount');   //Get amount from url

  function pay_now(){

                var options = {
                "key": "rzp_test_vgrShf9dHH7C80", // Enter the Key ID generated from the Dashboard
                "amount": amount*100,
                "currency": "INR",
                "description": "Bed booking Service",
                "image": "https://s3.amazonaws.com/rzp-mobile/images/rzp.jpg",
                "prefill":
                {
                "email": "gaurav.kumar@example.com",
                "contact": +919900000000,
                },
                config: {
                display: {
                    blocks: {
                    utib: { //name for Axis block
                        name: "Pay using Axis Bank",
                        instruments: [
                        {
                            method: "card",
                            issuers: ["UTIB"]
                        },
                        {
                            method: "netbanking",
                            banks: ["UTIB"]
                        },
                        ]
                    },
                    other: { //  name for other block
                        name: "Other Payment modes",
                        instruments: [
                        {
                            method: "card",
                            issuers: ["ICIC"]
                        },
                        {
                            method: 'netbanking',
                        },
                        {
                            method: "upi"
                        }
                        ]
                    }
                    },
                    sequence: ["block.utib", "block.other"],
                    preferences: {
                    show_default_blocks: false // Should Checkout show its default blocks?
                    }
                }
                },
                "handler": function (response) {
                var pid = response.razorpay_payment_id;
                console.log(pid);
                jQuery.ajax({
                    type:'post',
                    url:'payment_process.php',
                    data:"&amount="+amount+"&payment_id="+pid+"&order_id="+order_id,
                    success:function(result){

                        window.location.href = "/Minor Project 5th_Sem/Emergency_Medical_Support_System/Blood_Booking/confirm.php?&order_id="+order_id;
                    }
                })
                },
                "modal": {
                "ondismiss": function () {
                    if (confirm("Are you sure, you want to close the form?")) {
                    txt = "You pressed OK!";
                    console.log("Checkout form closed by the user");
                    } else {
                    txt = "You pressed Cancel!";
                    console.log("Complete the Payment")
                    }
                }
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
}
</script>  
</body>
</html>