<?php
    session_start();
    $userid = $_SESSION['user_id'];
    include_once("db_config/main_config.php");

    $db = new Database();
    $con = $db->connect();

    $query = "SELECT `user_first_name`,`user_last_name`,`user_email`, `user_contactno`,`formatted_adrrs` FROM `user_info` WHERE user_id='$userid'";

    $result = mysqli_query($con,$query);
    if($result)
    {
        $rows = mysqli_fetch_assoc($result);
    }
    $amount = $_GET['salary'];
    $ord_id = $_GET['billno'];
    $name = $_GET['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/amb_form_booking.css">
    <link rel="stylesheet" href="css/navlink.css">
    <link rel="stylesheet" href="css/payment.css">
    <title>Payment</title>
</head>
<body>

    <?php

        echo "<div class='container'>
        <div class='card'>
            <div class='column'>
                <h1 id='cnfm-msg' class='title'>Payment Details</h1>
                    <div class='amb_info_cont'>
                    <h1 class='descp' id='title'>$name</h1>
                    <h3>Delivery address</h3>
                    <p class='descp' id='card-address'>$rows[formatted_adrrs]</p>
                    <h3>Email</h3>
                    <p class='descp' id='card-type'>$rows[user_email]</p>
                    <h3>Contact no.</h3>
                    <p class='descp' id='card-distance'>$rows[user_contactno]</p>
                    <h3>Order Id</h3>
                    <p class='descp' id='card-type'>$ord_id</p>
                    <h3>Total</h3>
                    <h2 class='descp' id='card-fare'>&#8377 $amount/-</h2>
            </div>
            <input type='button' class='btn' name='btn' id='btn' value='Confirm & Pay' onclick='pay_now()'/>
        </div>
    </div>";
    
    ?>

  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
        const urlParams = new URLSearchParams(window.location.search);
        var order_id = urlParams.get('billno');  //Get orderid from url
        var amount = urlParams.get('salary');   //Get amount from url
        var name = urlParams.get('name');
        var ename = urlParams.get('ename');
        var eid = urlParams.get('eid');

  function pay_now(){

                var options = {
                "key": "rzp_test_vgrShf9dHH7C80", // Enter the Key ID generated from the Dashboard
                "amount": amount*100,
                "currency": "INR",
                "description": "MedTech Support",
                "image": "https://s3.amazonaws.com/rzp-mobile/images/rzp.jpg",
                "prefill":
                {
                "email": "<?php echo "$rows[user_email]"; ?>",
                "contact": "<?php echo "+91$rows[user_contactno]"; ?>",
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
                        window.location.href = "/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/invoice_mail.php?&payment_id="+pid+"&order_id="+order_id;
                        //window.location.href = "payment_ackn.php?&payment_id="+pid+"&order_id="+order_id+"&name="+name+"&ename="+ename+"&eid="+eid +"&salary="+salary;
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