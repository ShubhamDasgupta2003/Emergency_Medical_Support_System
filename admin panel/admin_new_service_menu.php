<?php

// header("Cache-Control: no cache");
// session_cache_limiter("private_no_expire");

include_once('procedural_connect.php');
// session_start();

if(isset($_POST['submit'])){

$service=$_POST['service'];

if($service == 'Ambulance Service'){
    // echo "Ambulance Service";
    header("location:/minor Project 5th_Sem/Emergency_Medical_Support_System/Ambulance Service/amb_admin_reg.php");
}
else if($service == 'Blood Bank Service'){
    // echo "Blood Bank Service";
    header("location:/minor Project 5th_Sem/Emergency_Medical_Support_System/db_insertions/db_config/blood_bank_register.php");
}
else if($service == 'Hospital Bed Booking Service'){
    // echo "Hospital Bed Booking Service";
    header("location:/minor Project 5th_Sem/Emergency_Medical_Support_System/bed_booking_service/hospital_register.php");
}
else if($service == 'Medical Supplies Service'){
    // echo "Medical Supplies Service";
    header("location:\Minor Project 5th_Sem\Emergency_Medical_Support_System\admin panel\medical supplies admin\input.php");
  }
else if($service == 'Aya/Nurse/Technician Service'){
    // echo "NurseTechnician Service";
    header("location:/minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/org_registration.php");
  }
}


  ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="adminlogin.css">
</head>
<body>
    <section class="container">
    <div class="title-bar">
        <header>Choose the type of service you want to add</header>
      </div>
        <form method="post" class="form">
            <div class="column">
                <div class="input-box menu" >
                    <label>Service</label>
                    <select id="service" name="service">
                        <option hidden>Select Service</option>
                        <option value = "Ambulance Service">Ambulance Service</option>
                        <option value = "Blood Bank Service">Blood Bank Service</option>
                        <option value = "Hospital Bed Booking Service">Hospital Bed Booking Service</option>
                        <option value = "Medical Supplies Service">Medical Supplies Service</option>
                        <option value = "Aya/Nurse/Technician Service">Aya/Nurse/Technician Service</option>
                    </select>
                </div>
                <button name="submit" id="sbmt-form">Submit</button>
            </div>
        </form>
    </section>
</body>
</html>