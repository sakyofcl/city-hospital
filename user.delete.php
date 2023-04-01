<?php
include_once "./controller/userController.php";
$userController = new UserController();

if(isset($_GET['uid'])){
    $userController->DeleteUser($_GET['uid']);
    header("Location: admin.php");
    exit; 
}

?>