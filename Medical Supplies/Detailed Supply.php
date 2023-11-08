<?php
include_once ('oop_connectionp.php');
$obj=new Database;
session_start();

$uid =  $_SESSION['user_id'];

if(isset($_POST['add_to_cart']))
{
  $product_name=$_POST['p_name'];
  $product_price=$_POST['p_price'];
  $product_image=$_POST['p_image'];
  $product_quantity=1;

  
    try {
          $s=$obj->insertcart($product_name,$product_price,$product_image, $product_quantity,$uid);
        
        }catch (Exception $e){
   
         ?> <script>alert("Product already present in the cart");
         window.location.href = '/Minor Project 5th_Sem/Emergency_Medical_Support_System/Medical Supplies/Medical Supplies.php'
         </script><?php
       }
}

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
       $n=$_GET['name'];
       //echo $u;
       if($n=='medical')
       {$row=array();
        $row=$obj->viewrecorddm($s);
       ?>
        <img src="image/pain relief/<?php echo $row['product_image'] ?>" alt="">
        <div class="column">
            <div class="amb_info_cont">
                <h1 class="descp" id="title"><?php echo $row['product_name'] ?></h1>
                <p class="descp" id="card-type"><?php echo $row['product_makers'] ?></p>
                

            </div>
            <div class="patient_info_cont">

                <form action="" method="post">
                  <p class="descp" id="card-type"><?php echo $row['product_para'] ?>
                    <h2 class="descp" id="card-fare">&#8377 <?php echo $row['product_rate'] ?></h2>
                    <input type="hidden" name="p_name" value="<?php echo $row['product_name'] ?>">
                    <input type="hidden" name="p_price" value="<?php echo $row['product_rate'] ?>">
                    <input type="hidden" name="p_image"  value="<?php echo $row['product_image'] ?>">
                    <input type="submit" class="btn" value="Add To Cart" name="add_to_cart"></input>
                </form>
             <!--   <a href="order confirmation.html">   </a>  -->
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
      <?php }  

    else
    {
        $row=array();
        $row=$obj->viewrecorddt($s);
       ?>
        <img src="image/pain relief/<?php echo $row['product_image'] ?>" alt="">
        <div class="column">
            <div class="amb_info_cont">
                <h1 class="descp" id="title"><?php echo $row['product_name'] ?></h1>
                <p class="descp" id="card-type"><?php echo $row['product_makers'] ?></p>
                

            </div>
            <div class="patient_info_cont">

                <form action="" method="post">
                  <p class="descp" id="card-type"><?php echo $row['product_para'] ?>
                    <h2 class="descp" id="card-fare">&#8377 <?php echo $row['product_rate'] ?></h2>
                    <input type="hidden" name="p_name" value="<?php echo $row['product_name'] ?>">
                    <input type="hidden" name="p_price" value="<?php echo $row['product_rate'] ?>">
                    <input type="hidden" name="p_image"  value="<?php echo $row['product_image'] ?>">
                    <input type="submit" class="btn" value="Add To Cart" name="add_to_cart"></input>
                </form>
             <!--   <a href="order confirmation.html">   </a>  -->
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
         <?php } ?>
  </div>
</div>
</body>
</html>
