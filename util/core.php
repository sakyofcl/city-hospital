<?php
include_once "./database/enum/userType.php";
function redirect($path, $callBack){
    $url=(empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]/city-hospital/$path";
    $callBack();
    header("location: http://localhost:8080/city-hospital/login.php",true, 200);
    exit;
}

function success($message){
    $_SESSION['isSuccess'] = true;
    $_SESSION['message'] = $message;
}

function error($message){
    $_SESSION['isError'] = true;
    $_SESSION['message'] = $message;
}

function showSuccess(){
    if(isset($_SESSION['isSuccess'])){
        if($_SESSION['isSuccess']==true){
            $message = $_SESSION['message']; 
            echo "
                <div class='alert alert-success w-100' role='alert' id='success-alert'>
                    $message
                </div>
            ";
            $_SESSION['isError'] = false;
        }
    }
}


function showError(){
    if(isset($_SESSION['isError'])){
        if($_SESSION['isError']==true){
            $message = $_SESSION['message']; 
            echo "
                <div class='alert alert-danger w-100' role='alert' id='alert-box-component'>
                    $message
                </div>
            ";
            $_SESSION['isSuccess'] = false;
        }
    }
}

function startSession(){
    session_start();
}

function stopSession(){
    session_unset();
    session_destroy();
}


function auth(){
    if(!isLogin()){
        header("Location: login.php");
        exit;
    }
}

function isLogin(){
    if(isset($_SESSION['isLogin'])){
        return $_SESSION['isLogin'];
    }
    return false;
}

function isPatient(){
    return isLogin() && (int)$_SESSION['userType'] == UserType::$Patient;
}

function isDoctor(){
    return isLogin() && $_SESSION['userType'] == UserType::$Doctor;
}

function isAdmin(){
    return isLogin() && $_SESSION['userType'] == UserType::$Admin;
}
?>