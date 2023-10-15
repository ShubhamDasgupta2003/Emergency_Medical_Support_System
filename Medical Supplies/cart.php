<?php
include_once ('oop_connection.php');
session_start();
$obj=new Database;

$uid =  $_SESSION['user_id'];


if(isset($_POST['update_product_quantity']))
{
    $update_value=$_POST['update_quantity'];
    $update_id=$_POST['update_quantity_id'];
    $s=$obj->updatecart($update_value,$update_id);
    if($s)
    {
        header('location:cart.php');
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/cart.css">

</head>
<body>
 <div class="main">
    <?php
       $records=$obj->viewrecord("cart","$uid");
       $s=1;
       $grand_total=0;
       if($records)
          { echo"<table class='styled-table'>
                <thead>
        <tr>
            <th>Serial No</th>
            <th>Product Image</th>
            <th>product Name</th>
            <th>Product price</th>
            <th>Product Quanity</th>
            <th>Total Price</th>
            <th>Delete Item</th>
        </tr>
    </thead>
    <tbody>";
            foreach($records as $row)    
            {
        ?>
        <tr>
            <td><?php echo $s;?></td>
            <td ><img src="<?php echo $row['image']; ?>" ></td>
            <td><?php echo $row['name']; ?></td>
            <td>&#8377 <?php echo $row['price']; ?></td>
            <td>
            <form action="" method="post">
                <input type="hidden" value="<?php echo $row['id']; ?>" name="update_quantity_id">
            <div class="quantity_box">
             <input type="number" min="1" value="<?php echo $row['quantity']; ?>" name="update_quantity">
             <input type="submit" class="update_quantity" value="update" name="update_product_quantity">
            </div>
            </form>
            </td>
            <td>&#8377 <?php echo $subtotal=($row['price']*$row['quantity']); ?></td>
            <td>
                <a href="delete.php?delete=<?php echo $row['id']?>" onclick="return confirm('Are you sure you want to delete this product');"><i class="fa-solid fa-trash" id="delete">  Remove</i></a>
            </td>
        </tr>
        <?php
          $s++;
          $a=1;
          $grand_total+=($row['price']*$row['quantity']);
            }
         } 
         else{
            ?>
            <script>alert("no products present in cart");
             window.location.href = '/Minor Project 5th_Sem/Emergency_Medical_Support_System/Medical Supplies/Medical Supplies.php'
             </script>
          
            <?php
         }
            if($grand_total>0)
            {
               echo "<td></td><td></td><td></td><td>
               <div class='table_bottom'>
               <h3 class='bottom_btn'>Grand Total :&#8377  $grand_total<h3>
               <a href='order confirmation.php?pgt=$grand_total' class='bottom_btn'>Proceed To Checkout</a>
               </div></td>  <td></td><td></td><td></td></tbody>
               </table>";
            }
         ?>            
  
</div>

<div class="sub">
<?php
      
       $s=1;
       $grand_total=0;
       if($records)
          { echo"<table class='styled-table' style='width:60%'>
                <thead>
        <tr>
            <th style='width:20%'>product Name</th>
            <th style='width:20%'>Product Quanity</th>
            <th style='width:5%'>Total Price</th>
            <th style='width:5%'>Delete Item</th>
        </tr>
    </thead>
    <tbody>";
            foreach($records as $row)    
            {
        ?>
        <tr>
            <td ><?php echo $row['name']; ?></td>
            <td>
            <form action="" method="post">
                <input type="hidden" value="<?php echo $row['id']; ?>" name="update_quantity_id">
            <div class="quantity_box">
             <input type="number" min="1" value="<?php echo $row['quantity']; ?>" name="update_quantity"  style="width: 28px;">
             <input type="submit" class="update_quantity" value="update" name="update_product_quantity">
            </div>
            </form>
            </td>
            <td>&#8377 <?php echo $subtotal=($row['price']*$row['quantity']); ?></td>
            <td>
                <a href="delete.php?delete=<?php echo $row['id']?>" onclick="return confirm('Are you sure you want to delete this product');"><i class="fa-solid fa-trash" id="delete"></i></a>
            </td>
        </tr>
        <?php
          $s++;
          $a=1;
          $grand_total+=($row['price']*$row['quantity']);
            }
         } 
         else{
            ?>
            <script>alert("no products present in cart");
             window.location.href = '/Minor Project 5th_Sem/Emergency_Medical_Support_System/Medical Supplies/Medical Supplies.php'
             </script>
          
            <?php
         }
            if($grand_total>0)
            {
               echo "<td></td><td>
               <div class='table_bottom'>
               <h3 class='bottom_btn'>Grand Total :&#8377  $grand_total<h3>
               <a href='order confirmation.php?pgt=$grand_total' class='bottom_btn'>Proceed To Checkout</a>
               </div></td> <td></td><td></td> </tbody>
               </table>";
            }
         ?>            
  
</div>
</body>
</html>