<?php
include_once "./database/uow/UnitOfWork.php";

class TestResultController{
    private $_uow;
    
    public function __construct()
    {
        $this->_uow = new Uow();
    }
    
    public function GetTestResult($id){
        return $this->_uow->TestResult->GetTestResult($id);
    }

    public function GetAllTestResult(){
        return $this->_uow->TestResult->GetAllTestResult();
    }

    public function AddTestResult($testResult){
        return $this->_uow->TestResult->AddTestResult($testResult);
    }

    public function UpdateTestResult($testResult){
        return $this->_uow->TestResult->UpdateTestResult($testResult);
    }

    public function DeleteTestResult($id){
        return $this->_uow->TestResult->DeleteTestResult($id);
    }

    public function GetPatientTestResult($id){
        return $this->_uow->TestResult->GetPatientTestResult($id);
    }

}

?>
