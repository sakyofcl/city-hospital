<?php
include_once "./controller/patientController.php";
$patient = new PatientController();

if(isset($_POST['update'])){
    unset($_POST['update']);
    $patient->updatePatientDetails($_POST);
    header("Location: profile.php");
    exit;
}

?>
