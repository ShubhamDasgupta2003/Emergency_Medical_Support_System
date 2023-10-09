<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aya</title>
    <!-- cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    <!-- css -->
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/navLink.css">
    <link rel="stylesheet" href="css/media.css">
    <link rel="stylesheet" href="css/body_cont.css">
    <link rel="stylesheet" href="css/footer_style.css">
    <link rel="stylesheet" href="css/location_win.css">
    <link rel="stylesheet" href="css/cont-card.css">
    <link rel="stylesheet" href="css/mininav.css">



</head>
<body>
    <!-- header section start -->
    <header class="header">
        <a href="#" class="logo"><i class="fa-solid fa-heart-pulse"></i>medcare</a>
        <div class="search-bar" id="srchbar-above">
            <button class="get-location btn" id="get-location-btn" style="width:50px;"><i class="fas fa-map-marker-alt"></i></button>
            <input type="text" placeholder="Search...">
            <button class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        <nav class="navbar">
            <a class="navlink" href="/HomePage/index.php">Home</a>
            <a class="navlink" href="/HomePage/index.php#services">Services</a>
            <a class="navlink" href="/HomePage/index.php#review">Review</a>
            <a class="navlink" href="/HomePage/index.php#footer">contact Us</a>
        </nav>

        <a href="#" id="user-avatar"><i class="fa-solid fa-user fa-lg account-avatar"></i></a>
        
        <div id="menu-btn" class="fa fa-bars"> </div>
    </header>

    <!-- header section end -->
    <div class="search-navbar" id="srchbar-below">
        <div class="search-bar">
            <button class="get-location btn" id="get-location-btn" style="width:50px;"><i class="fas fa-map-marker-alt"></i></button>
            <input type="text" placeholder="Search...">
            <button class="srch-btn btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </div>

    <section class="body-container">
        <div>
            <nav class="segmented-navigation">
                <a href="aya.php" class="segmented-item active">Aya</a>
                <a href="nurse.php" class="segmented-item">Nurse</a>
                <a href="technician.php" class="segmented-item">Technician</a>
              </nav>
            </div>
        <div class="contents">

            <!-- Your content goes here | check body_cont.css file for css property-->
           
                    <?php
                    include "connect.php";
                    session_start();
                    if($_SESSION['is_logged_in'] == 0){
                        header("refresh:0 ; url=/Minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/login.php");
                        echo "<script>alert('Please login before proceeding to the next page.')</script>";
                    }
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
                    $query = "SELECT * FROM emp_medtech em INNER JOIN org_medtech om
                    ON em.org_id = om.org_id;";
                    $query_run=mysqli_query($conn,$query);
                    $check_data= mysqli_num_rows($query_run)>0;
                    if($check_data){
                        while($row= mysqli_fetch_assoc($query_run)){
                            if( $row['org_type']=='a'){
                            ?>
                            <div class="cards">
                            <div class="card">
                            <div class="card-part1"> <img
                            src="images/employee.png"
                          /></div>
                          <div class="card-part2">
                            <strong><?php echo $row['ename'];?></strong>
                            <p><strong>Organization:</strong> XYZ Service</p>
                           <p> A Medical Technician is a medical professional who plays a vital part in the health care industry by providing support for physicians and hospitals.</p>
                           <strong><span style="color: red;">INR <?php echo $row['salary'];?> per day</span></strong>
                            <br>
                            <br>
                            <a href="bookingForm.html"><button class="btn btn-secondary-orange">Book</button></a></div>
                            </div> 
                            </div>
                            <?php
                            }

                        }
                    }?>
    
            
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
    <script src="js/location.js"></script>
    <script src="js/hambargericon.js"></script>
</body>
</html>