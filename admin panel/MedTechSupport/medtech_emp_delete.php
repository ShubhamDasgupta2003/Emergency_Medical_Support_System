<?php
$eid=$_GET['eid'];
$conn=mysqli_connect("localhost","root","","emgmedicalsystem");
$query="DELETE FROM medtech_emp WHERE eid='$eid'";
$result= mysqli_query($conn,$query);
if($result){
    echo "<script>alert('Data Delete Sucessfull!');</script>";

    header("Location:/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/MedTechSupport/medtech_org_admin.php");;
    }
?>