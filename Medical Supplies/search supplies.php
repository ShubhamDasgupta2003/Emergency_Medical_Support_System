<?php
include_once ('oop_connectionp.php');
include_once ('location.php');

$obj=new Database;

$s=0;

$uid =  $_SESSION['user_id'];
$islogin =  $_SESSION['is_logged_in'];
if($islogin!=1)
{
    echo "<script>alert('It seems like you have not logged in\\nPlease login to browse this site');
    window.location.href = '/minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/login.php'</script>";
}

//Backend for location modification starts here
setcookie("loc_modify","false");

$uid =  $_SESSION['user_id'];
$ufname =  $_SESSION['user_fname'];
$ulname = $_SESSION['user_lname'];





    $search_data_value=$_GET['search_data'];
    $search_data_value= trim($search_data_value);
    $search_query="SELECT * FROM medical_supplies_medical WHERE product_keywords like '%$search_data_value%'";




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    <!-- css-start -->
    <link rel="stylesheet" href="Css/navbar.css">
    <link rel="stylesheet" href="Css/navLink.css">
    <link rel="stylesheet" href="Css/media.css">
    <link rel="stylesheet" href="Css/body_cont.css">
    <link rel="stylesheet" href="Css/footer_style.css">
    <link rel="stylesheet" href="Css/backimg.css">
    <link rel="stylesheet" href="Css/cont-card.css">
    <link rel="stylesheet" href="Css/Home.css">
    <link rel="stylesheet" href="Css/location_win.css">
    <link rel="stylesheet" href="Css/seondnav.css">
    <link rel="stylesheet" href="Css/see_cart.css">
    <!--css-end -->



</head>
<body>
 <!-- header section start -->
 <header class="header">
    <a href="#" class="logo"><i class="fa-solid fa-heart-pulse"></i>medcare</a>
  
    <div class="search-bar" id="srchbar-above">
        <button class="get-location btn" id="get-location-btn" style="width:50px;"><i class="fas fa-map-marker-alt"></i></button>       
        <input type="text" placeholder="Search" name=search_data id="search_data">
       <button class="btn" value="submit" name="search_data_product" onclick="myfunction()"><i class="fa-solid fa-magnifying-glass"></i></button> 
       
    </div>
  
    <nav class="navbar">
        <a class="navlink" href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/index.php">Home</a>
            <a class="navlink" href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/index.php#services">Services</a>
            <a class="navlink" href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/index.php#review">Review</a>
            <a class="navlink" href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/index.php#footer">contact Us</a>
    </nav>
    
    
    <div class="user-avatar-container">
        <a href="http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/HomePage/profile.php" id="user-avatar"><i class="fa-solid fa-user fa-lg account-avatar"></i></a>
            <?php
                
                echo"<h3>$_SESSION[user_fname]</h3>";
            ?>

        </div>
        <div id="menu-btn" class="fa fa-bars"> </div>



   <div id="cart">
    <?php
     $n=$obj->numrecord($uid);
    
     ?> 
     <a href="cart.php" id="user-cart"><i class="fa badge fa-cart-shopping fa-2xl" value="<?php echo $n ?>" style="color:black"></i></a> 
   </div>
</header>

<!-- header section end -->
<div class="search-navbar" id="srchbar-below">
    <div class="search-bar">
        <button class="get-location btn" id="get-location-btn" style="width:50px;"><i class="fas fa-map-marker-alt"></i></button>
        <input type="text" placeholder="Search...">
        <button class="srch-btn btn"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>
</div>
    
<div class="hero-section">
    <div class="content">  
        <p class="sub-heading">Medical Supplies at your Doorstep</p>
    </div>
</div>

<div class="secondnav">
    <nav class="segmented-navigation">
        <a href="Medical Supplies.php" class="segmented-item active">Medical Supplies</a>
        <a href="Technical Supplies.php" class="segmented-item ">Technical Supplies</a>
      </nav>
    </div>

<section class="body-container">
    <div class="contents">

            <!-- Your content goes here | check body_cont.css file for css property-->

     <div class="cards">
          <?php
            $records=$obj->viewsearch( $search_query);
         
            foreach($records as $row)
            {
         
            
           echo" <div class='card'>
                <img src='$row[product_image]' >
                <div class='card-details'>
                    <p class='card-name'>$row[product_name]</p>
                    <p class='card-address'>..... </p>
                    <p class='card-type'> $row[product_para]</p>
                    <p class='card-fare'>&#8377 $row[product_rate]</p>
                    <a href='Detailed Supply.php?pid=$row[product_id]&name=medical'><button class='btn btn-secondary-orange'>Details</button></a>
                </div>
            </div>";
            
            $s=$s+1;
            }
           if($s==0)
           {
             ?><script>alert("no results found")</script><?php
           }

        ?>
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

</div>
</section>

        <!-- Footer bar -->
    <script src="location.js"></script>   
    <script src="common.js"></script>
    <script src="search.js"></script>
    <script>
        
        function myfunction()
        {
            var x=document.getElementById("search_data").value;
            window.location.href = "search supplies.php?search_data="+x;
           
        }
    </script>
</body>
</html>