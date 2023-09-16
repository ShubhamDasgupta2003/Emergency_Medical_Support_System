<?php
session_start();
$database_name="second";
$conn=mysqli_connect("localhost","root","",$database_name);
//$s=$_GET['pid'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  

</html>
<link rel="stylesheet" href="css/detailed product2.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link rel="stylesheet" href="css/navbar.css">
<link rel="stylesheet" href="css/amb_form_booking.css">
<link rel="stylesheet" href="css/navlink.css">
</head>
<body>

  <div class="container">
    <div class="card">
     <?php
       $s=$_GET['pid'];
       echo $s;
       $query="SELECT * FROM medical_supplies_product WHERE product_id=$s";
       $result=mysqli_query($conn,$query);
       $row=mysqli_fetch_array($result);
       ?>
        <img src="image/pain relief/<?php echo $row['product_image'] ?>" alt="">
        <div class="column">
            <div class="amb_info_cont">
                <h1 class="descp" id="title"><?php echo $row['product_name'] ?></h1>
                <p class="descp" id="card-address"><i class="fa-solid fa-location-dot"></i> WestBengal North - 24pgs Halisahar - 743135</p>
                <p class="descp" id="card-type"><?php echo $row['product_makers'] ?></p>
                

            </div>
            <div class="patient_info_cont">

                <form action="" method="post">
                  <p class="descp" id="card-type"><?php echo $row['product_para'] ?>
                    <h2 class="descp" id="card-fare">&#8377 <?php echo $row['product_rate'] ?></h2>
                   
                </form>
                <a href="order confirmation.html"><button class="btn">Confirm Order</button></a>
            </div>
        </div>     
    </div>
</div>







<div class='detail'>
  <div class="content">
         <pre>


              <b>PRODUCT DETAILS</b>
                             <?Php echo $row['product_desc'] ?>


         </pre>
  </div>
</div>
</body>
</html>
