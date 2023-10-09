<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <form>
    <input type="button" name="btn" id="btn" value="Pay" onclick="pay_now()"/>
  </form>

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
                "description": "Ambulance Service",
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
                        }
                        ]
                    }
                    },
                    hide: [
                    {
                    method: "upi"
                    }
                    ],
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

                        window.location.href = "payment_ackn.php";
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