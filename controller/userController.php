<?php
include_once "./database/uow/UnitOfWork.php";
include_once "./util/core.php";
include_once "./database/enum/userType.php";
class UserController{
    private $_uow;
    
    public function __construct()
    {
        $this->_uow = new Uow();
    }
    
    public function addUser($user){
        $isSave = $this->_uow->User->AddUser($user);
        if($isSave){
            $uid= $this->_uow->User->GetUser()[0]['id'];
            if(UserType::$Doctor == (int)$user['type']){
                $this->_uow->User->AddDoctorDetail(['uid'=>$uid]);
            }
            else if(UserType::$Patient == (int)$user['type']){
                $this->_uow->User->AddPatientDetail(['uid'=>$uid]);
            }
        }

        return $isSave;
    }

    public function loginUser($user){
        $result = $this->_uow->User->LoginUser($user);
        $isLogin = !empty($result);
        if($isLogin){
            $_SESSION["user"] = $result;
            $_SESSION["userType"] = $result['type'];
            $_SESSION["isLogin"] = true;
            header("Location: index.php");
            exit;
        }
        else{
            $_SESSION["isLogin"] = false;
            error("User name or password wrong");
        }
    }

    public function GetFilteredDoctors($options){
        return $this->_uow->User->GetFilteredDoctors($options);
    }
}

?>
