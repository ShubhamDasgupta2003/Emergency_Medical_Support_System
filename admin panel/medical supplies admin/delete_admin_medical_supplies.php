<?php
include_once ('oop_connectionp.php');
$obj=new Database;
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Ambulance Service Registration</title>
    <link rel="stylesheet" href="amb_admin_reg.css">
</head>
<body>
<section class="container">
      <div class="title-bar">
        
        <header>Delete Table Form</header>
      </div>
      <form class="form" method="post" action="delete_back.php"  enctype="multipart/form-data">

            <div class="input-box">
                <label>Table Name</label>
                <div class="select-box">
                    <select name="tabletype" id="">
                        <option value="medical_supplies_medical">medical_supplies_medical</option>
                        <option value="medical_supplies_technical">medical_supplies_technical</option>
                    </select>
                </div>
            </div>
        </div>
       
        <div class="column">
            <div class="input-box">
                <label>Product ID</label>
                <input name="product_id" type="number" placeholder="Enter Product Id" required maxlength="10"/>
            </div>
        </div>
        <button id="sbmt-form" name="submit"  onclick="return confirm('Are you sure you want to delete this product');">Delete</button>
      </form>
    </section>
    <script src="amb_admin_loc.js"></script>
    <!-- <script src="amb_adminReg_form.js"></script> -->
</body>
</html>