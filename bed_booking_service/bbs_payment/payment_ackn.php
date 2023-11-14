<?php

    session_start();

    $user_id = $_SESSION['user_id'];


    // echo "Thank you for payment";
    header("refresh:3; url=/Minor Project 5th_Sem/Emergency_Medical_Support_System/bed_booking_service/bed_booking_cnfm.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Thank You</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            color: black;
        }

        .thank-you-container {
            position: relative;
        }

        .thank-you-message {
            text-align: center;
            opacity: 0;
            transform: translateY(-50px);
            transition: opacity 1s ease, transform 1s ease;
        }

        .thank-you-container.show-animation .thank-you-message {
            opacity: 1;
            transform: translateY(0);
        }

        .animation-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .thank-you-container {
            text-align: center;
        }

        #countdown {
            font-size: 15px;
            opacity: 0;
            animation: countdownAnimation 1s ease-in-out forwards;
        }

        @keyframes countdownAnimation {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <div class="thank-you-container">
        <div class="thank-you-message">
            <h1>Thank You For Payment!</h1>
            <p>Your bed booking has been successfully confirmed.</p>
            <p>Redirecting in <span id="countdown"></span> seconds</p>
        </div>
        <div class="animation-container">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const thankYouContainer = document.querySelector('.thank-you-container');
            thankYouContainer.classList.add('show-animation');
        });
        document.addEventListener("DOMContentLoaded", function () {
            const countdownElement = document.getElementById('countdown');

            let count = 3;

            const countdown = setInterval(function () {
                countdownElement.textContent = count;
                count--;

                if (count < 0) {
                    clearInterval(countdown);
                    countdownElement.style.opacity = '0';
                }
            }, 1000);
        });

    </script>
</body>

</html>