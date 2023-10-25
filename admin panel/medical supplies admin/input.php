<?php
include_once ('oop_connection.php');
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
        
        <header>Input Table Form</header>
      </div>
      <form class="form" method="post" action="input_back.php"  enctype="multipart/form-data">
        <div class="column">
          <div class="input-box">
            <label>Product Name <sub>(max 50 characters)</sub></label>
            <input name="product_name" type="text" placeholder="Enter Product Name" maxlength="50" required/>
          </div>
        </div>
        <div class="column">
          <div class="input-box">
            <label>Product Rate</label>
            <input name="product_rate" type="number" placeholder="Enter Product Rate" maxlength="50" required/>
          </div>
        </div>
        <div class="column">
          <div class="input-box">
            <label>E-mail</label>
            <input name="email" type="text" placeholder="Enter email id" maxlength="50" required/>
          </div>
        </div>
        <div class="column">
            <div class="input-box">
                <label>Product Image </label>
                <input name="photo" id="photo" type="file" placeholder="Enter Product Image" required />
            </div>

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
            <input name="product_id" type="number" placeholder="Enter Product Id" required/>
          </div>
          <div class="input-box">
            <label>Phone Number<sub>(without including +91)</sub</label>
            <input name="drvcont" type="number" placeholder="Enter phone number" required maxlength="10"/>
          </div>
        </div>
        <div class="column">
            <div class="input-box">
                <label>Source ID</label>
                <input name="source_id" type="number" placeholder="Enter Source Id" required maxlength="10"/>
            </div>
        </div>
       
        <div class="column">
          <div class="input-box">
            <label>Product Info</label>
            <input name="product_info" type="text" placeholder="Enter Product Info " maxlength="50" required/>
          </div>
        </div>
        <div class="column">
          <div class="input-box">
            <label>Product Description</label>
            <input name="product_desc" type="text" placeholder="Enter Product Description" maxlength="50" required/>
          </div>
        </div>
        <div class="column">
          <div class="input-box">
            <label>Product Makers</label>
            <input name="product_makers" type="text" placeholder="Enter Product Makers" maxlength="50" required/>
          </div>
        </div>
        <div class="column">
            <div class="input-box">
                <label>Password</label>
                <input id="pswd" type="password" placeholder="Enter your password" required />
            </div>
            <div class="input-box">
                <label>Confirm Password</label>
                <input id="cnf-pswd"type="text" placeholder="Confirm your password" name ="pswd" required />
            </div>
        </div>
        <button id="sbmt-form" name="submit">Register</button>
      </form>
    </section>
    <script src="amb_admin_loc.js"></script>
    <!-- <script src="amb_adminReg_form.js"></script> -->
</body>
</html>