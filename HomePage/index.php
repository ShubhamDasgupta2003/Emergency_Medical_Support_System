<?php
    include_once("db_config_p/main_config.php");

    session_start();

    //Backend for location modification starts here
    setcookie("loc_modify","false");

    $uid =  @$_SESSION['user_id'];
    $ufname =  @$_SESSION['user_fname'];
    $ulname = @$_SESSION['user_lname'];

    $lat_in_use = 0.0;
    $lon_in_use = 0.0;
    $full_address = "";
    $loc_query = "SELECT lat_in_use,long_in_use,formatted_adrrs FROM user_info WHERE user_id='$uid'";

    $loc_result = mysqli_query($con,$loc_query);
    $loc_rows = $loc_result->fetch_assoc();

    if(@$loc_result)
    {
        $lat_in_use = @$loc_rows['lat_in_use'];
        $lon_in_use = @$loc_rows['long_in_use'];
        $full_address = @$loc_rows['formatted_adrrs'];
    }
    else
    {
        echo "error";
    }

    if(@$_COOKIE['loc_modify'] == 'true')
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
    // Backend for location modification ends here
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <!-- cdn link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


   
    <!-- css -->
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/sourav.css">
    <link rel="stylesheet" href="Css/navbar.css">
    <link rel="stylesheet" href="Css/navLink.css">
    <link rel="stylesheet" href="Css/media.css">
    <link rel="stylesheet" href="Css/body_cont.css">
    <link rel="stylesheet" href="Css/footer_style.css">
    <link rel="stylesheet" href="Css/location_win.css">
    <link rel="stylesheet" href="Css/cont-card.css">

   
    <!-- for slider  -->
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/swiper-bundle.min.css">
    <link rel="stylesheet" href="css/slider.css">

</head>
<body>
    <!-- header section start -->
    <header class="header">
        <a href="#" class="logo"><i class="fa-solid fa-heart-pulse"></i>medcare</a>
        <div class="search-bar" id="srchbar-above">
            <button class="get-location btn" id="get-location-btn" style="width:50px;"><i class="fas fa-map-marker-alt"></i></button>

            <input type="text" id="searchInput" name="search"  placeholder="Search ...">
            <button class="btn" onclick="search()"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        
        <nav class="navbar">
            <a class="navlink" href="#home">Home</a>
            <a class="navlink" href="#services">Services</a>
            <a class="navlink" href="#review">Review</a>
            <a class="navlink" href="#footer">contact Us</a>
        </nav>
        
        
        <div class="user-avatar-container">
            <a href="profile.php" id="user-avatar"><i class="fa-solid fa-user fa-lg account-avatar"></i></a>
            <?php
                if(@$_SESSION['is_logged_in'] == 1)
                {
                    echo"<h3>$_SESSION[user_fname]</h3>";
                    echo "<input type='hidden' id='session_val' value=1>";
                }
                else
                {
                    echo"<h3>Guest</h3>";
                    echo "<input type='hidden' id='session_val' value=0>";
                }
            ?>


        </div>
        <div id="menu-btn" class="fa fa-bars"> </div>
    </header>

    <!-- header section end -->
    <div class="search-navbar" id="srchbar-below">
        <div class="search-bar">
            <button class="get-location btn" id="get-location-btn" style="width:50px;"><i class="fas fa-map-marker-alt"></i></button>
            <input type="text" id="searchInput1" name="search"  placeholder="Search ...">
            <button class="btn" onclick="search1()"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </div>

    <!-- sourav-section-start -->
    <main >
        <section class="sourav" id="home">
            <div class="firstsection">
                <div class="leftsection">
                    Hi, We are here
                    <div class="">to <span>connect</span></div> you to
                    <span id="element"></span>
                </div>
                <div class="rightsection">
                    <img src="images/medIimage.png"  alt="">
                </div>
            </div>
        </section>
    </main>
    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>

    <!-- sourv-section-end  -->
    
    <!-- slider-section start  -->
    <section class="sliderS">
        <div class="slide-container swiper">
            <div class="slide-content">
                <div class="card-wrapper swiper-wrapper">
                   
                    
                    <div class="Scard swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>
    
                            <div class="Scard-image">
                                <img src="images/Hospital wheelchair-bro.svg" alt="" class="card-img">
                            </div>
                        </div>
    
                        <div class="card-content">
                            <h2 class="name">Your Health Our Priority
                            </h2>
                            <p class="description">We are Here For You</p>
    
                            <!-- <button class="button">View More</button> -->
                        </div>
                    </div>
                    <div class="Scard swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>
    
                            <div class="Scard-image">
                                <img src="images/Blood_Bank.avif" alt="" class="card-img">
                            </div>
                        </div>
    
                        <div class="card-content">
                            <h2 class="name">Searching For Blood 
                            </h2>
                            <p class="description">Search which bloodbank is suitable for you</p>
    
                            <!-- <button class="button">View More</button> -->
                        </div>
                    </div>
                    <div class="Scard swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>
    
                            <div class="Scard-image">
                                <img src="images/pharmaci.avif" alt="" class="card-img">
                            </div>
                        </div>
    
                        <div class="card-content">
                            <h2 class="name">Get Supplies
                            </h2>
                            <p class="description">Medical Supplies At Your Doorstep</p>
    
                            <!-- <button class="button">View More</button> -->
                        </div>
                    </div>
                    <div class="Scard swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>
    
                            <div class="Scard-image">
                                <img src="images/ambulance_book.png" alt="" class="card-img">
                            </div>
                        </div>
    
                        <div class="card-content">
                            <h2 class="name">Ambulance Few Clicks Away
                            </h2>
                            <p class="description">At Your Service</p>
    
                            <!-- <button class="button">View More</button> -->
                        </div>
                    </div>
                    <div class="Scard swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>
    
                            <div class="Scard-image">
                                <img src="images/few_click.jpg" alt="" class="card-img">
                            </div>
                        </div>
    
                        <div class="card-content">
                            <h2 class="name">Time Is Precious
                            </h2>
                            <p class="description">Book a Bed In Hospital Almost Instantly</p>
    
                            <!-- <button class="button">View More</button> -->
                        </div>
                    </div>
                    <div class="Scard swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>
    
                            <div class="Scard-image">
                                <img src="images/trust.jpg" alt="" class="card-img">
                            </div>
                        </div>
    
                        <div class="card-content">
                            <h2 class="name">Wary Of Strangers
                            </h2>
                            <p class="description">Our Review System will Take Care Of It</p>
    
                            <!-- <button class="button">View More</button> -->
                        </div>
                    </div>
                  
                </div>
            </div>
    
            <div class="swiper-button-next swiper-navBtn"></div>
            <div class="swiper-button-prev swiper-navBtn"></div>
            <div class="swiper-pagination"></div>
        </div>
</section>
    <!-- slider-section end  -->

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
    
     <!-- service section start -->
     <section class="services" id="services" >
        <h1 class="heading">Our <span>services</span></h1>
        <div class="box-container">
        <?php
            include("db_config/main_config.php");
            $obj=new Database();
            $obj->sql_select('services','*',null,null,null,null);

            $result=$obj->getResult();
            foreach($result as list("heading"=>$name,"des"=>$description,"link"=>$link,"img_src"=>$img)){
            ?>
                <div class='box'>
                <img src='<?=$img?>'>
                <h3><?=$name?></h3>
                <p><?=$description?></p>
                <a href="<?=$link?>" class='btn'>learn more <span class='fa fa-chevron-right'></span></a>
                </div>
            <?php
            }
            ?>     
        </div>

    </section>

                
    <!-- 
           <div class="box">
                <img src="images/blood-bag.png" alt="">
                <h3>Book Blood </h3>
                <p> soluta a, pariatur dolore odit vadipisci fugiat.</p>
                <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/Blood_Booking/BloodB.php" class="btn">learn more <span class="fa fa-chevron-right"></span></a>
            </div>

            <div class="box">
                <img src="images/hospital.png" alt="">
                <h3>Book Hospital Bed </h3>
                <p>Efficiently book hospital beds online for immediate medical care access.</p>
                <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/bed_booking_service/bed_booking.php" class="btn">learn more <span class="fa fa-chevron-right"></span></a>
            </div>

            <div class="box">
                <img src="images/babysitter.png" alt="">
                <h3>Aya</h3>
                <p> soluta a, pariatur vadipisci i hi jkl  ljl;a fugiat vadipisci.</p>
                <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/nursetechniciansupport/aya.php" class="btn">learn more <span class="fa fa-chevron-right"></span></a>
            </div>
            <div class="box">
                <img src="images/nurse.png" alt="">
                <h3>Nurse</h3>
                <p> soluta a, pariatur dolore fsf fsaf afsaf fsaf fsaf fsaf fasf .</p>
                <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/nursetechniciansupport/nurse.php" class="btn">learn more <span class="fa fa-chevron-right"></span></a>
            </div>
            <div class="box">
                <img src="images/radiologist.png" alt="">
                <h3>Medical Technician</h3>
                <p> soluta a, pariatur dolore odit vadipisci fugiat.</p>
                <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/nursetechniciansupport/technician.php" class="btn">learn more <span class="fa fa-chevron-right"></span></a>
            </div>
            <div class="box">
                <img src="images/medicine.png" alt="">
                <h3>Buy Medicine 24x7</h3>
                <p> soluta a, pariatur dolore odit vadipisci fugiat.</p>
                <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/Medical Supplies/Medical Supplies.php" class="btn">learn more <span class="fa fa-chevron-right"></span></a>
            </div>
            <div class="box">
                <img src="images/oxygen.png" alt="">
                <h3>Oxygen</h3>
                <p> soluta a, pariatur dolore odit vadipisci fugiat.</p>
                <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/Medical Supplies/Technical Supplies.php" class="btn">learn more <span class="fa fa-chevron-right"></span></a>
            </div>
    -->

    <!-- service section end -->
     <!-- review section start  -->
     <section class="review" id="review">
        <h1 class="heading">client's <span>review</span></h1>
        <div class="box-container">

            
            <div class="box">
                <img src="images/profile.avif" alt="">
                <h3>Jagannath Sarkar</h3>
                <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <!-- <i class="fa fa-star-half-alt"></i> -->
                    <p class="text">Lorem ipsum dolodipisicing elit. Voluptatum est facere corrupti ipsa, enim culpa omnis reprehenderit unde. Eum laboriosam esse tenetur veritatis, a dolorem voluptate quam veniam !</p>
                </div>
            </div>
            <div class="box">
                <img src="images/profile.avif" alt="">
                <h3>Jagannath Sarkar</h3>
                <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <!-- <i class="fa fa-star-half-alt"></i> -->
                    <p class="text">Lorem ipsum dolodipisicing elit. Voluptatum est facere corrupti ipsa, enim culpa omnis reprehenderit unde. Eum laboriosam esse tenetur veritatis, a dolorem voluptate quam veniam !</p>
                </div>
            </div>
            <div class="box">
                <img src="images/profile.avif" alt="">
                <h3>Jagannath Sarkar</h3>
                <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <!-- <i class="fa fa-star-half-alt"></i> -->
                    <p class="text">Lorem ipsum dolodipisicing elit. Voluptatum est facere corrupti ipsa, enim culpa omnis reprehenderit unde. Eum laboriosam esse tenetur veritatis, a dolorem voluptate quam veniam !</p>
                </div>
            </div>
            <div class="box">
                <img src="images/profile.avif" alt="">
                <h3>Jagannath Sarkar</h3>
                <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <!-- <i class="fa fa-star-half-alt"></i> -->
                    <p class="text">Lorem ipsum dolodipisicing elit. Voluptatum est facere corrupti ipsa, enim culpa omnis reprehenderit unde. Eum laboriosam esse tenetur veritatis, a dolorem voluptate quam veniam !</p>
                </div>
            </div>    
        </div>
    </section>

    
    <!-- about section start  -->
    <section class="" id="footer"style="
    padding-left: 0px;
    padding-right: 0px;
">
        <div class="footer-top">
            <a href="#" class="logo"><i class="fa-solid fa-heart-pulse"></i>medcare</a>
            <div class="footer-txt">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta facilis maxime eius ad id qui quos quod corporis non minus! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Porro, voluptates 
            </div>
        </div>
        <div class="footer-bottom" id="footer">
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
    </section>
    <!-- about section end-->
    <script src="js/Home.js"></script>
    <script src="js/sorav.js"></script>
    <script src="js/location.js"></script>
    <script src="js/slider.js"></script>
    <script src="search.js"></script>
    <script src="//cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/swiper-bundle.min.js"></script>

<!-- JavaScript -->
<!--Uncomment this line-->
<script src="//cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/script.js"></script>
<script src="js/slider.js"></script>
</body>
</html>