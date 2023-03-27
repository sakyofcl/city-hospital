<?php

class PatientDetail{
    public $id;
    public $uid;
    public $phone;
    public $name;

    public function __construct($source = [])
    {
        foreach($source as $key => $value){
            $this->{$key} = $value;
        }
    }
}

?>