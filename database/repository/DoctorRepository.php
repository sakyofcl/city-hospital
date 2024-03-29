<?php
include_once "AbstractRepository.php";
include_once "./database/entities/patientbooking.php";
include_once "./util/queryBuilder.php";

class DoctorRepository extends AbstractRepository{
    public function __construct($context)
    {
        parent::__construct($context);
    }

    public function GetBookedPatient($options){
        $doctorSpecific = !empty($options['doctorId']) ? "WHERE patientbooking.doctorId={$options['doctorId']}" : "";
        $q = "
            SELECT 
            patientbooking.treatmentType, patientdetail.name as patientName,
            patientdetail.phone as phoneNumber, patientbooking.id as bookingNumber,
            patientbooking.isApproved
            FROM patientbooking JOIN patientdetail ON patientbooking.patientId=patientdetail.uid
            $doctorSpecific
            ORDER BY patientbooking.id DESC;
        ";
        return $this->_context->Read($q); 
    }

    public function BookPatient($patientBook){
        $entity = $this->ToPatientbookEntity($patientBook);
        $q = insertQuery($entity);
        return $this->_context->rawSql($q);
    }

    public function approveBooking($id){
        $q= "UPDATE patientbooking SET isApproved=1 WHERE id=$id";
        $this->_context->rawSql($q);
    }

    public function getDoctorDetails($id){
        $q= "SELECT * FROM doctordetail WHERE uid=$id";
        return $this->_context->Read($q);
    }
    
    private function ToPatientbookEntity($source){
        $entity = new PatientBooking();
        $entity->id = !isset($source['id']) ? NULL : (int)$source['id'];
        $entity->doctorId = $source['doctorId'];
        $entity->patientId = $source['patientId'];
        $entity->treatmentType = $source['treatmentType'];
        $entity->isApproved = !isset($source['isApproved']) ? NULL : $source['isApproved'];
        $entity->create_at = !isset($source['create_at']) ? NULL : $source['create_at'];
        return $entity;
    }
}

?>