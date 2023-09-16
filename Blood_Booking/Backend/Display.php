<?php
include ("config.php");
$query="SELECT blood_bank.*, blood_group.*
FROM blood_bank_blood_group
JOIN blood_group ON blood_bank_blood_group.blood_group_id = blood_group.blood_group_id
JOIN blood_bank ON blood_bank_blood_group.blood_bank_id = blood_bank.blood_bank_id
WHERE blood_bank_blood_group.blood_group_id = 3";

$data=mysqli_query($conn,$query);

// $total=mysqli_num_rows($data);
// $arr=mysqli_fetch_assoc($data);
// while($arr=mysqli_fetch_assoc($data)){

//     echo $arr["name"]." ".$arr["state"]." ".$arr["city"]." ".$arr["dist"]." ".$arr["group_name"]." ".$arr["price"]."<br>";
// }


// echo $total;

?>