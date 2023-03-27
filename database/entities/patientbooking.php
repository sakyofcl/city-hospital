<?php

class PatientBooking{
    public $id;
    public $patientId;
    public $doctorId;
    public $isApproved;
    public $treatmentType;
    public $create_at;

    public function __construct($source = [])
    {
        foreach($source as $key => $value){
            $this->{$key} = $value;
        }
    }
}

?>