<?php
include_once "./controller/testResultController.php";
$testResultController = new TestResultController();

if(isset($_GET['id'])){
    $testResultController->DeleteTestResult($_GET['id']);
    header("Location: test.result.php");
    exit; 
}

?>