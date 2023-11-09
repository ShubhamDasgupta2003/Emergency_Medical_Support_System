<?php
    session_start();
    $islogin =  $_SESSION['is_logged_in'];
    if($islogin!=1)
    {
        echo "<script>alert('It seems like you have not logged in\\nPlease login to buy blood');
        window.location.href = '/minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/login.php'</script>";
    }
    //Path for main config file 
    include_once("Backend/config.php");

    //Backend for location modification starts here
    setcookie("loc_modify","false");

    $uid =  $_SESSION['user_id'];
    $ufname =  $_SESSION['user_fname'];
    $ulname = $_SESSION['user_lname'];

    $lat_in_use = 0.0;
    $lon_in_use = 0.0;
    $full_address = "";
    $loc_query = "SELECT lat_in_use,long_in_use,formatted_adrrs FROM user_info WHERE user_id='$uid'";

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

    if($_COOKIE['loc_modify'] == 'true')
    {
        $mod_lat = $_COOKIE['lat_in_use'];
        $mod_lon = $_COOKIE['lon_in_use'];
        $mod_addrs = $_COOKIE['address_in_use'];

        $loc_mod_query = "UPDATE user_info SET lat_in_use=$mod_lat,long_in_use=$mod_lon,formatted_adrrs='$mod_addrs' WHERE user_id='$uid'";

        $mod_loc_result = mysqli_query($con,$loc_mod_query);

        if($mod_loc_result)
        {
            header("Refresh: 1");
        }
    }
    // include("Backend/Display.php");
    
    $b_gr = "O+";
    
    if(@$_GET['q'])
    {
        $b_gr = $_GET['q'];
    }else{
        $b_gr = "O+";

    }
    
    // echo $b_gr;

// $b_gr=strtoupper($_POST["search"]);
// if($b_gr==null){

//     $b_gr="O+";
// }
// $query1="";
//Backend for location modification ends here


$query = "SELECT
         blood_bank.blood_bank_id,
         blood_bank.name,
         blood_bank.latitude,
         blood_bank.longitude,
         blood_bank.state,
         blood_bank.city,
         blood_bank.dist,
         blood_bank.pincode,
         ROUND((
             6371 *
             acos(cos(radians($lat_in_use)) * 
             cos(radians(blood_bank.latitude)) * 
             cos(radians($lon_in_use) - radians(blood_bank.longitude)) + 
             sin(radians($lat_in_use)) * sin(radians(blood_bank.latitude)))
             ), 1) AS distance,
            blood_group.*
            FROM blood_bank_blood_group
            JOIN blood_group ON blood_bank_blood_group.blood_group_id = blood_group.blood_group_id
            JOIN blood_bank ON blood_bank_blood_group.blood_bank_id = blood_bank.blood_bank_id
            WHERE blood_bank_blood_group.blood_group_id = (
            SELECT blood_group_id 
            FROM blood_group 
            WHERE group_name = '$b_gr'
            )
            ORDER BY distance;
         ";
        

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- css for this page -->
    <link rel="stylesheet" href="Css/Bb.css">
    <link rel="stylesheet" href="Css/useravatar.css">
    <!-- css -->
    <link rel="stylesheet" href="Css/navbar.css">
    <link rel="stylesheet" href="Css/navLink.css">
    <link rel="stylesheet" href="Css/media.css">
    <link rel="stylesheet" href="Css/body_cont.css">
    <link rel="stylesheet" href="Css/footer_style.css">
    <link rel="stylesheet" href="Css/location_win.css">
    <link rel="stylesheet" href="Css/cont-card.css">



</head>

<body>
    <!-- header section start -->
    <header class="header">
        <a href="#" class="logo"><i class="fa-solid fa-heart-pulse"></i>medcare</a>
        <div class="search-bar" id="srchbar-above">
            <button class="get-location btn" id="get-location-btn" style="width:50px;"><i
            class="fas fa-map-marker-alt"></i></button>
            
            <input type="text" id="searchInput" name="search"  placeholder="Search blood group">
            <button class="btn" onclick="search()"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>

        <nav class="navbar">
            <a class="navlink" href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/index.php">Home</a>
            <a class="navlink" href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/index.php#services">Services</a>
            <a class="navlink" href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/index.php#review">Review</a>
            <a class="navlink" href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/index.php#footer">contact Us</a>
        </nav>


        <!-- <a href="#" id="user-avatar"><i class="fa-solid fa-user fa-lg account-avatar"></i></a> -->
        <div class="user-avatar-container">
        <a href="http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/HomePage/profile.php" id="user-avatar"><i class="fa-solid fa-user fa-lg account-avatar"></i></a>
            <?php
                
                echo"<h3>$_SESSION[user_fname]</h3>";
            ?>

        </div>
        <div id="menu-btn" class="fa fa-bars"> </div>
    </header>

    <!-- header section end -->
    <div class="search-navbar" id="srchbar-below">
        <div class="search-bar">
            <button class="get-location btn" id="get-location-btn" style="width:50px;"><i
                    class="fas fa-map-marker-alt"></i></button>
            <!-- <input type="text" name="s_value" placeholder="Search...">
            <button class="srch-btn btn" type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i></button> -->

            <input type="text" id="searchInput1" name="search"  placeholder="Search blood group">
            <button class="srch-btn btn" onclick="search1()"><i class="fa-solid fa-magnifying-glass"></i></button>
            <!-- <button ></button> -->

        </div>
    </div>

    <section class="body-container">
        <div class="contents">


            <!-- Your content goes here | check body_cont.css file for css property-->
            <div class="cards">
                <?php
                $data = mysqli_query($con,$query);
                while ($arr = mysqli_fetch_assoc($data)) {
                    echo "<div class='card'>
                    <img src='images/Blood_Bank.png'>
                    <div class='card-details'>
                        <h1 class='card-name'>$arr[name]</h1>
                        <h2 class='card-address'> <i class='fa-solid fa-location-dot'></i>  $arr[state] $arr[dist] $arr[city] - $arr[pincode]</h2>
                       
                        <div class='distance-gr'>
                            <p class='card-type'>Blood Group: <span class='blood-gr'>$arr[group_name]</span></p>
                            <h2 class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> $arr[distance] Km</h2>

                        </div>
                        <div class='buy-price'>
                        <a href='bookingForm.php?price=$arr[price]&B_b_id=$arr[blood_bank_id]&dist=$arr[distance]&bG=$arr[group_name]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn buy'>Buy</button></a>
                            <p class='card-fare'>&#8377 $arr[price]/-</p>
                        </div>
                    </div>
                </div>";
                $_SESSION['bg'] = $arr['group_name'];
                // $_SESSION['Bank_id'] = $arr['blood_bank_id'];
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
            <footer id="footer">
                <div class="footer-top">
                    <a href="#" class="logo"><i class="fa-solid fa-heart-pulse"></i>medcare</a>
                    <div class="footer-txt">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta facilis maxime eius ad id qui
                        quos quod corporis non minus! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Porro,
                        voluptates
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

    <script src="index.js"></script>
    <script src="location.js"></script>
    <script src="search.js"></script>
    <script src="search1.js"></script>
</body>

</html>
<?php
include ("Backend/config.php");

// $b_gr=strtoupper($_POST["search"]);
$b_gr="O+";
// $query1="";
//Backend for location modification ends here


$query = "SELECT
         blood_bank.blood_bank_id,
         blood_bank.name,
         blood_bank.latitude,
         blood_bank.longitude,
         blood_bank.state,
         blood_bank.city,
         blood_bank.dist,
         blood_bank.pincode,
         ROUND((
             6371 *
             acos(cos(radians($lat_in_use)) * 
             cos(radians(blood_bank.latitude)) * 
             cos(radians($lon_in_use) - radians(blood_bank.longitude)) + 
             sin(radians($lat_in_use)) * sin(radians(blood_bank.latitude)))
             ), 1) AS distance,
            blood_group.*
            FROM blood_bank_blood_group
            JOIN blood_group ON blood_bank_blood_group.blood_group_id = blood_group.blood_group_id
            JOIN blood_bank ON blood_bank_blood_group.blood_bank_id = blood_bank.blood_bank_id
            WHERE blood_bank_blood_group.blood_group_id = (
            SELECT blood_group_id 
            FROM blood_group 
            WHERE group_name = '$b_gr'
            )
            ORDER BY distance;
         ";
        

?>