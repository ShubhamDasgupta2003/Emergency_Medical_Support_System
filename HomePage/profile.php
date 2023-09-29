<?php

include 'db_config/main_config.php';
if($_SESSION['is_logged_in']==0){
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="Css/navbar.css">
    <link rel="stylesheet" href="Css/navLink.css">
    <link rel="stylesheet" href="Css/media.css">
    <link rel="stylesheet" href="Css/footer_style.css">

 
</head>
<body>
     <!-- header section start -->
     <header class="header">
        <a href="#" class="logo"><i class="fa-solid fa-heart-pulse"></i>medcare</a>
        <div class="search-bar" id="srchbar-above">
            <button class="get-location btn" id="get-location-btn" style="width:50px;"><i class="fas fa-map-marker-alt"></i></button>
            <input type="text" placeholder="Search">
            <button class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        <nav class="navbar">
            <a class="navlink" href="index.php">Home</a>
            <a class="navlink" href="#services">Services</a>
            <a class="navlink" href="#review">Review</a>
            <a class="navlink" href="#footer">contact Us</a>
        </nav>
        
         <!-- header section end -->
    <div class="search-navbar" id="srchbar-below">
        <div class="search-bar">
            <button class="get-location btn" id="get-location-btn" style="width:50px;"><i class="fas fa-map-marker-alt"></i></button>
            <input type="text" placeholder="Search...">
            <button class="srch-btn btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </div>

        
        <div class="user-avatar-container">
            <a href="profile.php" id="user-avatar"><i class="fa-solid fa-user fa-lg account-avatar"></i></a>

            <?php
                include("db_config/main_config.php");
                $sql="SELECT  `user_first_name` FROM user_info WHERE user_id='USR3020861122'";
                $res=mysqli_query($con,$sql) or die("error in sql query");
                $row=mysqli_fetch_assoc($res);
                echo"
                 <h3>$row[user_first_name]</h3> ";
            ?>


        </div>
        <div id="menu-btn" class="fa fa-bars"> </div>
    </header>

    <!-- header section end -->

    <!-- user profile section start  -->
    <div class="profile_container">
        
        <div class="profile">
            <?php
         $select = mysqli_query($con, "SELECT * FROM `user_info` WHERE user_id = 'USR3020861122'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
      ?>
      <img src="images/Ai_01.png" alt="">
      <h3><?php echo "Welcome $fetch[user_first_name] $fetch[user_last_name]"; ?></h3>
      <a href="update_profile.php" class="p_btn">update profile</a>
      <a href="home.php?logout=<?php echo $user_id; ?>" class="delete-btn">logout</a>
      <p>new <a href="login.php">login</a> or <a href="register.php">register</a></p>
    </div>
    
    <!-- user profile section end -->
</div>

<!-- about section start  -->
<section class="" id="footer">
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
        
    <script src="js/profile.js"></script>
</body>
</html>