<?php
include_once "AbstractRepository.php";
include_once "./util/queryBuilder.php";
include_once "./database/entities/testresult.php";

class TestResultRepository extends AbstractRepository{
    public function __construct($context)
    {
        parent::__construct($context);
    }

    public function GetTestResult($id){
        return $this->_context->Read("SELECT * FROM testresult WHERE id=$id;");
    }

    public function GetPatientTestResult($id){
        return $this->_context->Read("SELECT * FROM testresult WHERE patientId=$id;");
    }

    public function GetAllTestResult(){

        return $this->_context->Read("SELECT * FROM testresult ORDER BY id DESC;");
    }

    public function AddTestResult($testResult){
        $entity = $this->ToEntity($testResult);
        $q = insertQuery($entity);
        return $this->_context->rawSql($q);
    }

    public function UpdateTestResult($testResult){
        $entity = $this->ToEntity($testResult);
        $q = updateQuery($entity);
        return $this->_context->rawSql($q);
    }

    public function DeleteTestResult($id){
        $this->_context->rawSql("DELETE FROM testresult WHERE id=$id;");
    }

    private function ToEntity($source){
        $entity = new TestResult();
        $entity->id = !isset($source['id']) ? NULL : (int)$source['id'];
        $entity->testName = $source['testName'];
        $entity->testResult = $source['testResult'];
        $entity->patientId = (int)$source['patientId'];
        $entity->testDate = !isset($source['testDate']) ? NULL : $source['testDate'];

        return $entity;
    }

}

?>