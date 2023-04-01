<?php
include_once "./controller/doctorController.php";

$doctor = new DoctorController();
$doctor->approveBooking($_GET['id']);
header("Location: patient.booking.php");
exit;

?>