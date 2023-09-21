<?php
    //Path for main config file 
    include_once("db_config/main_config.php");
    
    


    $query = "INSERT IGNORE INTO `hospital_info`(`Id`, `Name`, `ContactNo`, `Address`, `State`, `District`, `City`, `Pincode`, `Latitude`, `Longitude`, `Male_bed_available`, `Female_bed_available`, `Bed_charge`) VALUES ('1','Naihati Matri Sadan Municipal Hospital','6384479131','6,Rishi Bankim Chandra Road,Naihati Urban,Naihati,West Bengal 743165','West Bengal','North 24 Parganas','Naihati','743165','22.8885','88.4178','52','48','300');

    INSERT IGNORE INTO `hospital_info`(`Id`, `Name`, `ContactNo`, `Address`, `State`, `District`, `City`, `Pincode`, `Latitude`, `Longitude`, `Male_bed_available`, `Female_bed_available`, `Bed_charge`) VALUES ('2','Naihati State General Hospital','8697921086','Naihati State General Hospital, Naihati, Kolkata, West Bengal 743165','West Bengal','North 24 Parganas','Naihati','743165','22.8950','88.4290','50','55','250');
    
    INSERT IGNORE INTO `hospital_info`(`Id`, `Name`, `ContactNo`, `Address`, `State`, `District`, `City`, `Pincode`, `Latitude`, `Longitude`, `Male_bed_available`, `Female_bed_available`, `Bed_charge`) VALUES ('3','NAIHATI HEALTH CARE','7003074773','252,Rishi Bankim Chandra Rd, Chowmatha,Gouripur,Garifa,Naihati,West Bengal 743166','West Bengal','North 24 Parganas','Naihati','743166','22.89779','88.41892','40','35','500');";
    
    $result = mysqli_multi_query($con,$query);

    if($result)
    {
        echo "<br>Data inserted successfully !!";
    }
    else
    {
        echo "<br>Error occured !";
    }
?>
