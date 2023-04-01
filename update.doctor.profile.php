<?php
include_once "./controller/userController.php";
$user = new UserController();

if(isset($_POST['update'])){
    unset($_POST['update']);
    $user->updateDoctorDetails($_POST);
    header("Location: profile.php");
    exit;
}

?>
