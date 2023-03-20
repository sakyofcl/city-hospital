<?php
include_once "AbstractRepository.php";

class UserRepository extends AbstractRepository{
    public function __construct($context)
    {
        parent::__construct($context);
    }

    public function GetAllUser(){
        return $this->_context->rawSql("SELECT * FROM users");
    }

}

?>