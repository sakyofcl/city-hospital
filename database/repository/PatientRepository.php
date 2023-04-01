<?php
include_once "AbstractRepository.php";
include_once "./database/entities/patientbooking.php";
include_once "./util/queryBuilder.php";

class PatientRepository extends AbstractRepository{
    public function __construct($context)
    {
        parent::__construct($context);
    }

    public function getPatientDetails($id){
        $q= "SELECT * FROM patientdetail WHERE uid=$id";
        return $this->_context->Read($q);
    }

    public function updatePatientDetails($details){
        $entity = $this->ToPatientDetailEntity($details);
        $q = updateQuery($entity);
        echo $q;
        return $this->_context->rawSql($q);
    }

    private function ToPatientDetailEntity($source){
        $entity = new PatientDetail();
        $entity->id = !isset($source['id']) ? NULL : (int)$source['id'];
        $entity->uid = (int)$source['uid'];
        $entity->phone = empty($source['phone']) ? NULL : (int)$source['phone'];
        $entity->name = empty($source['name']) ? NULL : $source['name'];
        return $entity;
    }

    
}

?>