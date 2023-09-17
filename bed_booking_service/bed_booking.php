<?php

    include_once("config.php");
    $query = "SELECT * FROM hospital_info";
    $result = mysqli_query($conn,$query);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bed Booking Service | 24x7</title>
    <!-- cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,200" />

    <!-- css -->
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/navlink.css">
    <link rel="stylesheet" href="css/media.css">
    <link rel="stylesheet" href="css/body_cont.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/location.css">
    <link rel="stylesheet" href="css/cont_card.css">



</head>
<body>
    <!-- header section start -->
    <header class="header">
        <a href="#" class="logo"><i class="fa-solid fa-heart-pulse"></i>medcare</a>
        <div class="search-bar" id="srchbar-above">
            <button class="get-location btn" id="get-location-btn"><i id="locationlogo" class="fas fa-map-marker-alt"></i> </i>Get location</button>
            <input type="text" placeholder="Search...">
            <button class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        <nav class="navbar">
            <a class="navlink" href="/bed_booking_system/Emergency_Medical_Support_System/HomePage/">Home</a>
            <a class="navlink" href="/bed_booking_system/Emergency_Medical_Support_System/HomePage/#services">Services</a>
            <a class="navlink" href="/bed_booking_system/Emergency_Medical_Support_System/HomePage/#review">Review</a>
            <a class="navlink" href="/bed_booking_system/Emergency_Medical_Support_System/HomePage/#footer">Contact Us</a>
        </nav>
        
        <a href="#" id="user-avatar"><i class="fa-solid fa-user fa-lg account-avatar"></i></a>

        <div id="menu-btn" class="fa fa-bars"> </div>
    </header>

    <!-- header section end -->
    <div class="search-navbar" id="srchbar-below">
        <div class="search-bar">
            <button class="get-location btn" id="get-location-btn">Get Location</button>
            <input type="text" placeholder="Search...">
            <button class="srch-btn btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </div>

    <section class="body-container">
        <div class="contents">

            <!-- Your content goes here | check body_cont.css file for css property-->
            
            <div class="cards">
                <?php
                
                if($result){
                    while($row=mysqli_fetch_assoc($result)){

                        echo " <div class='card'>
                        <img src='image/hospital.jpg' >
                        <div class='card-details'>
                            <p class='card-name'>$row[Name]</p>
                            <p class='card-address'>$row[Address]</p>
                            <p class='card-type-male'>
                                <span class='material-symbols-outlined'>
                                    man
                                    </span>
                                <strong>$row[Male_bed_available]</strong>
                            </p>
                            <p class='card-type-female'>
                                <span class='material-symbols-outlined'>
                                    woman
                                    </span>
                                <strong>$row[Female_bed_available]</strong>
                            </p>
                            <a href='BookingForm.php' target='_blank'>
                                <button id='c1' class='btn btn-secondary-orange'>Book Bed</button>
                            </a>
                        </div>
                    </div> ";

                    }
                }

                    ?>

            </div>
            <!-- Location window popup starts here -->

            <div class="location-window" id="loc-win">
                <div class="card popup">
                    <button class="dismiss-btn" id="dismiss">&times</button>
                    <div class="loc-head">
                        <span>Enter an Indian pincode here</span>
                        <div class="loc-option-tab">
                            <input type="number" name="pincode" placeholder="Pincode here" id="zipcode">
                            <button class="btn" id="pin-apply">Apply</button>
                        </div>
                    </div>
                    <div class="loc-head">
                        <span>Allow to access your location</span>
                        <div class="loc-option-tab">
                            <button class="get-location btn" id="det-location"><i class="fa-solid fa-location-crosshairs"></i>Detect my location</button>
                        </div>
                    </div>
                    <div class="loc-head">
                        <div class="loc-option-tab">
                            <label for="" id="location-txt"></label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Location window popup ends here -->
            
            <!-- Footer bar -->
            <footer>
                <div class="footer-top">
                    <a href="#" class="logo"><i class="fa-solid fa-heart-pulse"></i>medcare</a>
                    <div class="footer-txt">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta facilis maxime eius ad id qui quos quod corporis non minus! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Porro, voluptates 
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="company-col footer-link-col">
                        <h2>Company</h2>
                        <ul>
                            <li>About Company</li>
                            <li>Customer's Speak</li>
                            <li>In the News</li>
                            <li>Terms and Conditions</li>
                            <li>Privacy Policy</li>
                            <li>Contact</li>
                        </ul>
                    </div>
                    <div class="shopping-col footer-link-col">
                        <h2>Shopping</h2>
                        <ul>
                            <li>Browse by Manufacturers</li>
                            <li>Health Articles</li>
                            <li>Offers / Coupons</li>
                            <li>FAQs</li>
                        </ul>
                    </div>
                    <div class="link-col footer-link-col">
                        <h2>Useful Links</h2>
                        <ul>
                            <li>Home</li>
                            <li>About us</li>
                            <li>Services</li>
                            <li>Contact us</li>
                        </ul>
                    </div>
                </div>
            </footer>
        <!-- contents class ends here -->
        </div>
    </section>

    <script src="js/bbs.js"></script>
    <script src="js/location.js"></script>
</body>
</html>