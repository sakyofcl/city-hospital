<?php

class TestResult{
    public $id;
    public $testName;
    public $testResult;
    public $testDate;
    public $patientId;
 
    public function __construct($source = [])
    {
        foreach($source as $key => $value){
            $this->{$key} = $value;
        }
    }
}

?>