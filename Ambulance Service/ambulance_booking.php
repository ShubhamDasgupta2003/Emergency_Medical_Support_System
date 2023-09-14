<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambulance Service | 24x7 | Feature branch</title>
    <!-- cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    <!-- css -->
    <link rel="stylesheet" href="Css/navbar.css">
    <link rel="stylesheet" href="Css/navLink.css">
    <link rel="stylesheet" href="Css/media.css">
    <link rel="stylesheet" href="Css/footer_style.css">
    <link rel="stylesheet" href="Css/body_cont.css">
    <link rel="stylesheet" href="/Common Template/Css/footer_style.css">
    <link rel="stylesheet" href="Css/location_win.css">
    <link rel="stylesheet" href="Css/cont-card.css">



</head>
<body>
    <!-- header section start -->
    <header class="header">
        <a href="#" class="logo"><i class="fa-solid fa-heart-pulse"></i>medcare</a>
        <div class="search-bar" id="srchbar-above">
            <button class="get-location btn" id="get-location-btn"><i class="fas fa-map-marker-alt"></i>&nbsp;My location</button>
            <input type="text" placeholder="Search ambulance location name...">
            <button class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        <nav class="navbar">
            <a class="navlink" href="/HomePage/index.html">Home</a>
            <a class="navlink" href="/HomePage/index.html#services">Services</a>
            <a class="navlink" href="/HomePage/index.html#review">Review</a>
            <a class="navlink" href="/HomePage/index.html">Contact Us</a>
        </nav>

        <a href="#" id="user-avatar"><i class="fa-solid fa-user fa-lg account-avatar"></i></a>
        
        <div id="menu-btn" class="fa fa-bars"> </div>
    </header>

    <!-- header section end -->
    <div class="search-navbar" id="srchbar-below">
        <div class="search-bar">
            <button class="get-location btn" id="get-location-btn"><i class="fas fa-map-marker-alt"></i></button>
            <input type="text" placeholder="Search ambulance location name...">
            <button class="srch-btn btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </div>

    <section class="body-container">
        <div class="contents">

            <!-- Your content goes here | check body_cont.css file for css property-->
            <div class="cards">
                <div class="card">
                    <img src="https://images.jdmagicbox.com/comp/varanasi/e9/0542px542.x542.200517114047.g7e9/catalogue/narayan-ambulance-service-varanasi-cantt-varanasi-0jqwifqqzh.jpg?clr=" >
                    <div class="card-details">
                        <p class="card-name">Netaji Shubhas Ambulance Service</p>
                        <p class="card-address"><i class="fa-solid fa-location-dot"></i> WestBengal North - 24pgs Halisahar - 743135
                        </p>
                        <div class="card-row">
                            <p class="card-type">Normal/Life-support</p>
                            <p id="card-status">active</p>
                        </div>
                        <div class="card-row">
                            <form action="/Ambulance Service/amb_booking_form.php">
                                <button class="btn btn-secondary-orange">Book ride</button>
                            </form>
                            <p class="card-distance"><i class="fa-solid fa-route fa-lg" style="color: #00b37d;"></i> 50Km</p>
                            <p class="card-fare">&#8377 250/-</p>
                        </div>
                        
                    </div>
                </div>
                
                <div class="card">
                    <img src="https://maishacare.com/wp-content/uploads/2022/06/ambulance-service-van-emergency-medical-vehicle-vector-illustration-white-background-ambulance-service-van-emergency-medical-127018462.jpg">
                    <div class="card-details">
                        <p class="card-name">Netaji Shubhas Ambulance Service</p>
                        <p class="card-address"><i class="fa-solid fa-location-dot"></i> WestBengal North - 24pgs Halisahar - 743135</p>
                        <div class="card-row">
                            <p class="card-type">Normal/Life-support</p>
                            <p id="card-status">busy</p>
                        </div>
                        <div class="card-row">
                            <button class="btn btn-secondary-orange">Book ride</button>
                            <p class="card-distance"><i class="fa-solid fa-route fa-lg" style="color: #00b37d;"></i> 50Km</p>
                            <p class="card-fare">&#8377 250/-</p>
                        </div>
                        
                    </div>
                </div>
                <div class="card">
                    <img src="https://images.jdmagicbox.com/comp/varanasi/e9/0542px542.x542.200517114047.g7e9/catalogue/narayan-ambulance-service-varanasi-cantt-varanasi-0jqwifqqzh.jpg?clr=">
                    <div class="card-details">
                        <p class="card-name">Netaji Shubhas Ambulance Service</p>
                        <p class="card-address"><i class="fa-solid fa-location-dot"></i> WestBengal North - 24pgs Halisahar - 743135</p>
                        <div class="card-row">
                            <p class="card-type">Normal/Life-support</p>
                            <p id="card-status">active</p>
                        </div>
                        <div class="card-row">
                            <button class="btn btn-secondary-orange">Book ride</button>
                            <p class="card-distance"><i class="fa-solid fa-route fa-lg" style="color: #00b37d;"></i> 50Km</p>
                            <p class="card-fare">&#8377 250/-</p>
                        </div>
                        
                    </div>
                </div>
                <div class="card">
                    <img src="https://maishacare.com/wp-content/uploads/2022/06/ambulance-service-van-emergency-medical-vehicle-vector-illustration-white-background-ambulance-service-van-emergency-medical-127018462.jpg">
                    <div class="card-details">
                        <p class="card-name">Netaji Shubhas Ambulance Service</p>
                        <p class="card-address"><i class="fa-solid fa-location-dot"></i> WestBengal North - 24pgs Halisahar - 743135</p>
                        <div class="card-row">
                            <p class="card-type">Normal/Life-support</p>
                            <p id="card-status">active</p>
                        </div>
                        <div class="card-row">
                            <button class="btn btn-secondary-orange">Book ride</button>
                            <p class="card-distance"><i class="fa-solid fa-route fa-lg" style="color: #00b37d;"></i> 50Km</p>
                            <p class="card-fare">&#8377 250/-</p>
                        </div>
                        
                    </div>
                </div>
                <div class="card">
                    <img src="https://maishacare.com/wp-content/uploads/2022/06/ambulance-service-van-emergency-medical-vehicle-vector-illustration-white-background-ambulance-service-van-emergency-medical-127018462.jpg">
                    <div class="card-details">
                        <p class="card-name">Netaji Shubhas Ambulance Service</p>
                        <p class="card-address"><i class="fa-solid fa-location-dot"></i> WestBengal North - 24pgs Halisahar - 743135</p>
                        <div class="card-row">
                            <p class="card-type">Normal/Life-support</p>
                            <p id="card-status">busy</p>
                        </div>
                        <div class="card-row">
                            <button class="btn btn-secondary-orange">Book ride</button>
                            <p class="card-distance"><i class="fa-solid fa-route fa-lg" style="color: #00b37d;"></i> 50Km</p>
                            <p class="card-fare">&#8377 250/-</p>
                        </div>
                        
                    </div>
                </div>
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

    <script src="amb_booking.js"></script>
    <script src="location.js"></script>
    <script src="amb_status.js"></script>
</body>
</html>