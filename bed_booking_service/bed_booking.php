<?php

    include_once("config.php");

    $dbname = new Database();       //Creating object of Databse class
    $conn = $dbname->connect();      //Calling connect() method

    session_start();
    // if($_SESSION['is_logged_in'] == 0){
    //     header("refresh:0 ; url=/Minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/login.php");
    //     echo "<script>alert('Please login before proceeding to the next page.')</script>";
    // }
    $dbname->isLoggedIn($_SESSION['is_logged_in']);


    //Backend for location modification starts here
    setcookie("loc_modify","false");

    $uid =  $_SESSION['user_id'];
    $ufname =  $_SESSION['user_fname'];
    $ulname = $_SESSION['user_lname'];

    $lat_in_use = 0.0;
    $lon_in_use = 0.0;
    $full_address = "";
    $loc_query = $dbname->select('user_info',"*","user_id='$uid'");

    // $loc_result = mysqli_query($conn,$loc_query);
    // $loc_rows = $loc_result->fetch_assoc();
    $loc_rows = $loc_query->fetch_assoc();
    
    $lat_in_use = $loc_rows['lat_in_use'];
    $lon_in_use = $loc_rows['long_in_use'];
    $full_address = $loc_rows['formatted_adrrs'];

    // if()
    // {

    // }
    // else
    // {
    //     echo "error";
    // }

    if(@$_COOKIE['loc_modify'] == 'true')
    {
        $mod_lat = $_COOKIE['lat_in_use'];
        $mod_lon = $_COOKIE['lon_in_use'];
        $mod_addrs = $_COOKIE['address_in_use'];

        $loc_mod_query = $dbname->update('user_info',array("lat_in_use"=>$mod_lat,"long_in_use"=>$mod_lon,"formatted_adrrs"=>"$mod_addrs"),"user_id='$uid'");
        
        //$loc_mod_query = "UPDATE user_info SET lat_in_use=$mod_lat,long_in_use=$mod_lon,formatted_adrrs='$mod_addrs' WHERE user_id='$uid'";

        //$mod_loc_result = mysqli_query($conn,$loc_mod_query);

        if($loc_mod_query)
        {
            header("Refresh: 1");
        }
    }
        //Backend for location modification ends here

        $sqli_table = 'hospital_info';
        $sqli_rows= "`Id`, `Name`, `ContactNo`, `email`, `Address`, `State`, `District`, `City`, `Pincode`, `Latitude`, `Longitude`, `Male_bed_available`, `Female_bed_available`,`bed_charge`, ROUND((
            6371 *
            acos(cos(radians($lat_in_use)) * 
            cos(radians(Latitude)) * 
            cos(radians($lon_in_use) - 
            radians(Longitude)) + 
            sin(radians($lat_in_use)) * 
            sin(radians(Latitude)))
            ),1) AS distance";
            // needs to fix this 
            // $sqli_condition = "amb_town LIKE '$amb_filter_query%' OR amb_status='$amb_filter_query' OR amb_name='$amb_filter_query' OR amb_type = '$amb_filter_query' OR amb_district='$amb_filter_query'";
            $sqli_order = 'distance';

    // $query= "SELECT `Id`, `Name`, `ContactNo`, `email`, `Address`, `State`, `District`, `City`, `Pincode`, `Latitude`, `Longitude`, `Male_bed_available`, `Female_bed_available`,`bed_charge`, ROUND((
    // 6371 *
    // acos(cos(radians($lat_in_use)) * 
    // cos(radians(Latitude)) * 
    // cos(radians($lon_in_use) - 
    // radians(Longitude)) + 
    // sin(radians($lat_in_use)) * 
    // sin(radians(Latitude)))
    // ),1) AS distance FROM `hospital_info` ORDER BY distance";
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
            <input id="searchbar" onkeyup="search_hos_name()" name="search" type="text" placeholder="Search...">
            <button class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        <nav class="navbar">
            <a class="navlink" href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/">Home</a>
            <a class="navlink" href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/#services">Services</a>
            <a class="navlink" href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/#review">Review</a>
            <a class="navlink" href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/#footer">Contact Us</a>
        </nav>
        
        <!-- <a href="#" id="user-avatar"><i class="fa-solid fa-user fa-lg account-avatar"></i></a> -->
        <div class="user-avatar-container">
        <a href="http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/HomePage/profile.php" id="user-avatar"><i class="fa-solid fa-user fa-lg account-avatar"></i></a>
            <?php
                
                echo"<h3>$_SESSION[user_fname]</h3>";
            ?>

        </div>
        <div id="menu-btn" class="fa fa-bars"> </div>

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
                
                // $result = mysqli_query($conn,$query);
                $result = $dbname->select($sqli_table,$sqli_rows,'',$sqli_order);
                // if($result){
                //     while($row=mysqli_fetch_assoc($result))
                while($rows=$result->fetch_assoc())
                {

                        echo " <div class='card'>
                        <img src='image/hospital.jpg' >
                        <div class='card-details'>
                            <p class='card-name'>$rows[Name]</p>
                            <p class='card-address'>$rows[Address]</p>
                            <p class='card-type-male'>
                                <span class='material-symbols-outlined'>
                                    man
                                    </span>
                                <strong>$rows[Male_bed_available]</strong>
                            </p>
                            <p class='card-type-female'>
                                <span class='material-symbols-outlined'>
                                    woman
                                    </span>
                                <strong>$rows[Female_bed_available]</strong>
                            </p>
                        <div class='card-row' >
                            <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i>$rows[distance] Km</p>
                                 <p class='card-fare'>&#8377 $rows[bed_charge]/-</p>
                            <a href='BookingForm.php?hospitalid=$rows[Id]' target='_blank'>
                                <button id='c1' class='btn btn-secondary-orange'>Book Bed</button>
                            </a>
                        </div>
                        </div>
                    </div> ";

                    }
                // } if bracket

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
                    Our online platform simplifies the process of reserving hospital beds swiftly and efficiently, ensuring timely access to critical medical resources.
                    Experience hassle-free hospital bed reservations through our online service, designed for ease and accessibility during urgent times.
                    We strive to make securing hospital beds a seamless experience by offering a user-friendly online platform, making healthcare accessibility a priority.
                    Our online hospital bed booking service connects patients with the right care swiftly, providing a stress-free solution for medical bed reservations.
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