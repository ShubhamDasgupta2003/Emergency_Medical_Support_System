<?php
$blood_gr='B';
    
switch($blood_gr) {
    case 'O':
            $blood_gr='O+';
      break;
    case 'A':
        $blood_gr='A+';
      break;
    case 'B':
        $blood_gr='B+';
        break;
    case 'AB':
        $blood_gr='AB+';
      break;
  }
  echo $blood_gr;

?>