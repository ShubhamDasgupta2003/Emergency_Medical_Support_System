<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/amb_form_booking.css">
    <link rel="stylesheet" href="css/navlink.css">

</head>
<body>
    <div class="container">
        <div class="card">
            <img src="https://maishacare.com/wp-content/uploads/2022/06/ambulance-service-van-emergency-medical-vehicle-vector-illustration-white-background-ambulance-service-van-emergency-medical-127018462.jpg" alt="">
            <div class="column">
                <div class="amb_info_cont">
                    <h1 class="descp" id="title">Netaji Subhash Ambulance Service</h1>
                    <p class="descp" id="card-address"><i class="fa-solid fa-location-dot"></i> WestBengal North - 24pgs Halisahar - 743135</p>
                    <p class="descp" id="card-type">Normal/Life-support</p>
                    <p class="descp" id="card-distance"><i class="fa-solid fa-route fa-lg" style="color: #00b37d;"></i> 50Km</p>
                    <h2 class="descp" id="card-fare">&#8377 250/-</h2>
    
                </div>
                <div class="patient_info_cont">
    
                    <form action="/Ambulance Service/amb_booking_cnfm.html" method="get">
                        <label for="">Patient's Full Name<sup class="mandatory">*</sup></label>
                        <input type="text" name="" id="" placeholder="Enter Patient's full name"  required>

                        <label for="">Age<sup class="mandatory">*</sup></label>
                        <input type="number" name="" id="" placeholder="Patient's age" required>

                        <label for="">Mobile No.<sup class="mandatory">*</sup></label>
                        <input type="tel" name="" id="" placeholder="Contact number" required>

                        <label for="">Gender<sup class="mandatory">*</sup></label>
                        <div class="row">
                            <input type="radio" name="gender" value="male"> Male
                            <input type="radio" name="gender" value="female"> Female
                        </div>
                        <label for="">Pickup Address</label>
                        <input type="text" name="" id="" value="Halisahar 743135" readonly>
                        <button class="btn">Confirm Ride</button>
                    </form>
                </div>
            </div>     
        </div>
    </div>
</body>
</html>