
// var searchTerm = document.getElementById('searchInput').value;
function search() {
    var searchTerm = document.getElementById('searchInput').value;
    // if(searchTerm=="Blood"){
    // window.location.href = 'http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/Blood_Booking/BloodB.php?';
    // }else{
    //     window.location.href = 'http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/Ambulance%20Service/ambulance_booking.php';
    // }

    switch(searchTerm) {
        case "blood":
            window.location.href = 'http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/Blood_Booking/BloodB.php';
          break;
        case "ambulance":
            window.location.href = 'http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/Ambulance%20Service/ambulance_booking.php';
          break;
        case "hospital":
            window.location.href = 'http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/bed_booking_service/bed_booking.php';
          break;
        case "aya":
            window.location.href='http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/nursetechniciansupport/aya.php';
            break;
        case "nurse":
            window.location.href='http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/nursetechniciansupport/nurse.php';
            break;
        case "technician":
            window.location.href='http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/nursetechniciansupport/technician.php';

      case "medical suplies":
            window.location.href = 'http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/Medical%20Supplies/Medical%20Supplies.php';
        default:
      }
}

//search for small screen
// var searchTerm = document.getElementById('searchInput1').value;
function search1() {
    var searchTerm = document.getElementById('searchInput1').value;
    switch(searchTerm) {
        case "Blood":
            window.location.href = 'http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/Blood_Booking/BloodB.php';
          break;
        case "Ambulance":
            window.location.href = 'http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/Ambulance%20Service/ambulance_booking.php';
          break;
        case "Hospital":
            window.location.href = 'http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/bed_booking_service/bed_booking.php';
          break;
        case "Aya":
            window.location.href='http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/nursetechniciansupport/aya.php';
            break;
        case "Nurse":
            window.location.href='http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/nursetechniciansupport/nurse.php';
            break;
        case "Technician":
            window.location.href='http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/nursetechniciansupport/technician.php';

        default:
            window.location.href = 'http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/Medical%20Supplies/Medical%20Supplies.php';
      }
}
