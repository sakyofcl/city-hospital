<?php
include_once "./controller/doctorController.php";

$doctor = new DoctorController();
$isSave = $doctor->BookPatient($_GET);

if($isSave){
    header("Location: thanks.php");
    exit;
}
else{
    header("Location: doctor.php");
    exit;
}

?>