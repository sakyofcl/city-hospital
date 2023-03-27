<?php
include_once "./database/uow/UnitOfWork.php";

class DoctorController{
    private $_uow;
    
    public function __construct()
    {
        $this->_uow = new Uow();
    }
    
    public function GetBookedPatient($options){
        return $this->_uow->Doctor->GetBookedPatient($options);
    }

    public function BookPatient($patientBook){
        return $this->_uow->Doctor->BookPatient($patientBook);
    }
}

?>
