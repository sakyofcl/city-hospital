<?php
include_once "./database/uow/UnitOfWork.php";

class PatientController{
    private $_uow;
    
    public function __construct()
    {
        $this->_uow = new Uow();
    }
    
    public function getPatientDetails($id){
        return $this->_uow->Patient->getPatientDetails($id);
    }

    public function updatePatientDetails($details){
        return $this->_uow->Patient->updatePatientDetails($details);
    }


}

?>
