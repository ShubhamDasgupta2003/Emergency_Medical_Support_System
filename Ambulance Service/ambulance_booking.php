<?php
    //Path for main config file 
    include_once("db_config/main_config.php");
    setcookie("loc_modify","false");

    $lat_in_use = 0.0;
    $lon_in_use = 0.0;
    $full_address = "";
    $loc_query = "SELECT lat_in_use,long_in_use,formatted_adrrs FROM user_info WHERE user_id='USR3597175768'";

    $loc_result = mysqli_query($con,$loc_query);
    $loc_rows = $loc_result->fetch_assoc();

    if($loc_result)
    {
        $lat_in_use = $loc_rows['lat_in_use'];
        $lon_in_use = $loc_rows['long_in_use'];
        $full_address = $loc_rows['formatted_adrrs'];
    }
    else
    {
        echo "error";
    }
    // $query = "SELECT * FROM ambulance_info";

    if($_COOKIE['loc_modify'] == 'true')
    {
        $mod_lat = $_COOKIE['lat_in_use'];
        $mod_lon = $_COOKIE['lon_in_use'];
        $mod_addrs = $_COOKIE['address_in_use'];

        // echo "$mod_lat<br>$mod_lon<br>$mod_addrs<br>";
        $loc_mod_query = "UPDATE user_info SET lat_in_use=$mod_lat,long_in_use=$mod_lon,formatted_adrrs='$mod_addrs' WHERE user_id='USR3597175768'";

        $mod_loc_result = mysqli_query($con,$loc_mod_query);

        if($mod_loc_result)
        {
            header("Refresh: 1");
        }
    }

    $query = "SELECT `amb_no`, `amb_name`, `amb_type`, `amb_status`, `amb_loc_lat`, `amb_loc_long`, `amb_rate`, `amb_contact`, `amb_driver_name`, `amb_state`, `amb_district`, `amb_town`, `amb_loc_pincode`,round((
        6371 *
        acos(cos(radians($lat_in_use)) * 
        cos(radians(amb_loc_lat)) * 
        cos(radians($lon_in_use) - 
        radians(amb_loc_long)) + 
        sin(radians($lat_in_use)) * 
        sin(radians(amb_loc_lat)))
     )) AS distance FROM `ambulance_info`";


    //   HAVING distance<=100

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambulance Service | 24x7 |Feature branch</title>
    <!-- cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    <!-- css -->
    <link rel="stylesheet" href="Css/navbar.css">
    <link rel="stylesheet" href="Css/navLink.css">
    <link rel="stylesheet" href="Css/media.css">
    <link rel="stylesheet" href="Css/footer_style.css">
    <link rel="stylesheet" href="Css/body_cont.css">
    <link rel="stylesheet" href="Css/location_win.css">
    <link rel="stylesheet" href="Css/cont-card.css">



</head>
<body>
    <!-- header section start -->
    <header class="header">
        <a href="#" class="logo"><i class="fa-solid fa-heart-pulse"></i>medcare</a>
        <div class="search-bar" id="srchbar-above">
            <button class="get-location btn" id="get-location-btn"><i class="fas fa-map-marker-alt"></i></button>
            <input type="text" placeholder="Search ambulance location name...">
            <button class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        <nav class="navbar">
            <a class="navlink" href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/">Home</a>
            <a class="navlink" href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/#services">Services</a>
            <a class="navlink" href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/#review">Review</a>
            <a class="navlink" href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/#footer">Contact Us</a>
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
                <?php
                    $result = mysqli_query($con,$query);
                    while($rows = $result->fetch_assoc())
                    {
                        echo "<div class='card'>
                        <img src='https://images.jdmagicbox.com/comp/varanasi/e9/0542px542.x542.200517114047.g7e9/catalogue/narayan-ambulance-service-varanasi-cantt-varanasi-0jqwifqqzh.jpg?clr=' >
                        <div class='card-details'>
                            <p class='card-name'>$rows[amb_name]</p>
                            <p class='card-address'><i class='fa-solid fa-location-dot'></i> $rows[amb_state] $rows[amb_district] $rows[amb_town]
                            </p>
                            <div class='card-row'>
                                <p class='card-type'>$rows[amb_type]</p>
                                <p id='card-status'>$rows[amb_status]</p>
                            </div>
                            <div class='card-row'>
                                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/Ambulance Service/amb_booking_form.php?ambno=$rows[amb_no]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book ride</button></a>
                                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> $rows[distance]Km</p>
                                <p class='card-fare'>&#8377 $rows[amb_rate]/-</p>
                            </div>
                            
                        </div>
                    </div>";
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
                            <label for="" id="location-txt">
                                <?php
                                    echo "$full_address";
                                ?>
                            </label>
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