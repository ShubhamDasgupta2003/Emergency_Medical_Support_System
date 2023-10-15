<?php
require_once('config.php');

class BloodBank extends Config {
    public function isUserLoggedIn() {
        session_start();
        $islogin = isset($_SESSION['is_logged_in']) ? $_SESSION['is_logged_in'] : 0;

        if ($islogin != 1) {
            echo "<script>alert('It seems like you have not logged in.\\nPlease login to book your ride');
                  window.location.href = '/minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/login.php'</script>";
        }
    }

    public function getLocationData() {
        $uid = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

        $lat_in_use = 0.0;
        $lon_in_use = 0.0;
        $full_address = "";

        $loc_query = "SELECT lat_in_use, long_in_use, formatted_adrrs FROM user_info WHERE user_id='$uid'";
        $loc_result = $this->con->query($loc_query);

        if ($loc_result) {
            $loc_rows = $loc_result->fetch_assoc();
            $lat_in_use = $loc_rows['lat_in_use'];
            $lon_in_use = $loc_rows['long_in_use'];
            $full_address = $loc_rows['formatted_adrrs'];
        } else {
            echo "error";
        }

        // Return location data as an array
        return array('lat' => $lat_in_use, 'lon' => $lon_in_use, 'address' => $full_address);
    }

    public function getBloodBankData($bGr) {
        $query = "SELECT
                 blood_bank.blood_bank_id,
                 blood_bank.name,
                 blood_bank.latitude,
                 blood_bank.longitude,
                 blood_bank.state,
                 blood_bank.city,
                 blood_bank.dist,
                 blood_bank.pincode,
                 ROUND((
                     6371 *
                     acos(cos(radians(lat_in_use)) * 
                     cos(radians(blood_bank.latitude)) * 
                     cos(radians(lon_in_use) - radians(blood_bank.longitude)) + 
                     sin(radians(lat_in_use)) * sin(radians(blood_bank.latitude)))
                     ), 1) AS distance,
                blood_group.*
                FROM blood_bank_blood_group
                JOIN blood_group ON blood_bank_blood_group.blood_group_id = blood_group.blood_group_id
                JOIN blood_bank ON blood_bank_blood_group.blood_bank_id = blood_bank.blood_bank_id
                WHERE blood_bank_blood_group.blood_group_id = (
                SELECT blood_group_id 
                FROM blood_group 
                WHERE group_name = '$bGr'
                )
                ORDER BY distance";
                
        $result = $this->con->query($query);
        $data = array();

        if ($result) {
            while ($arr = $result->fetch_assoc()) {
                $data[] = $arr;
            }
        }

        // Return blood bank data
        return $data;
    }

    public function renderBloodBankCards($data) {
        foreach ($data as $arr) {
            echo "<div class='card'>
                    <img src='images/Blood_Bank.png'>
                    <div class='card-details'>
                        <h1 class='card-name'>$arr[name]</h1>
                        <h2 class='card-address'> <i class='fa-solid fa-location-dot'></i>  $arr[state] $arr[dist] $arr[city] - $arr[pincode]</h2>
                       
                        <div class='distance-gr'>
                            <p class='card-type'>Blood Group: <span class='blood-gr'>$arr[group_name]</span></p>
                            <h2 class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> $arr[distance] Km</h2>

                        </div>
                        <div class='buy-price'>
                        <a href='bookingForm.php?price=$arr[price]&B_b_id=$arr[blood_bank_id]&dist=$arr[distance]&bG=$arr[group_name]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn buy'>Buy</button></a>
                            <p class='card-fare'>&#8377 $arr[price]/-</p>
                        </div>
                    </div>
                </div>";
        }
    }
}
?>
