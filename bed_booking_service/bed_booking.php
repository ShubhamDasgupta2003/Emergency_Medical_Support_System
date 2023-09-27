<?php

    include_once("config.php");
    session_start();
    if($_SESSION['is_logged_in'] == 0){
        header("refresh:0 ; url=/Minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/login.php");
        echo "<script>alert('Please login before proceeding to the next page.')</script>";
    }
    // $query = "SELECT * FROM hospital_info";
    // $result = mysqli_query($conn,$query);

    //Backend for location modification starts here
    setcookie("loc_modify","false");

    $uid =  $_SESSION['user_id'];
    $ufname =  $_SESSION['user_fname'];
    $ulname = $_SESSION['user_lname'];

    $lat_in_use = 0.0;
    $lon_in_use = 0.0;
    $full_address = "";
    $loc_query = "SELECT lat_in_use,long_in_use,formatted_adrrs FROM user_info WHERE user_id='$uid'";

    $loc_result = mysqli_query($conn,$loc_query);
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

    if($_COOKIE['loc_modify'] == 'true')
    {
        $mod_lat = $_COOKIE['lat_in_use'];
        $mod_lon = $_COOKIE['lon_in_use'];
        $mod_addrs = $_COOKIE['address_in_use'];

        $loc_mod_query = "UPDATE user_info SET lat_in_use=$mod_lat,long_in_use=$mod_lon,formatted_adrrs='$mod_addrs' WHERE user_id='$uid'";

        $mod_loc_result = mysqli_query($conn,$loc_mod_query);

        if($mod_loc_result)
        {
            header("Refresh: 1");
        }
    }
        //Backend for location modification ends here

    $query= "SELECT `Id`, `Name`, `ContactNo`, `email`, `Address`, `State`, `District`, `City`, `Pincode`, `Latitude`, `Longitude`, `Male_bed_available`, `Female_bed_available`, `Bed_charge`, ROUND((
    6371 *
    acos(cos(radians($lat_in_use)) * 
    cos(radians(Latitude)) * 
    cos(radians($lon_in_use) - 
    radians(Longitude)) + 
    sin(radians($lat_in_use)) * 
    sin(radians(Latitude)))
    ),1) AS distance FROM `hospital_info` ORDER BY distance";
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
            <button class="get-location btn" id="get-location-btn"><i id="locationlogo" class="fas fa-map-marker-alt"></i> </i></button>
            <input type="text" placeholder="Search...">
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
            <button class="get-location btn" id="get-location-btn"><i id="locationlogo" class="fas fa-map-marker-alt"></i></button>
            <input type="text" placeholder="Search...">
            <button class="srch-btn btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </div>

    <section class="body-container">
        <div class="contents">

            <!-- Your content goes here | check body_cont.css file for css property-->
            
            <div class="cards">
                <?php
                
                $result = mysqli_query($conn,$query);
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
                        <div class='card-row' >
                            <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i>$row[distance] Km</p>
                            <a href='BookingForm.php?hospitalid=$row[Id]' target='_blank'>
                                <button id='c1' class='btn btn-secondary-orange'>Book Bed</button>
                            </a>
                        </div>
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

    <script src="js/bbs.js"></script>
    <script src="js/location.js"></script>
</body>
</html>