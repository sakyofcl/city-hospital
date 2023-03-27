<?php
include_once "AbstractRepository.php";
include_once "./database/entities/inquirie.php";
include_once "./util/queryBuilder.php";


class InquirieRepository extends AbstractRepository{
    public function __construct($context)
    {
        parent::__construct($context);
    }

    public function AddInquirie($inquirie){
        $entity = $this->ToEntity($inquirie);
        $q = insertQuery($entity);
        return $this->_context->rawSql($q);
    }

    private function ToEntity($source){
        $entity = new Inquirie();
        $entity->id = !isset($source['id']) ? NULL : (int)$source['id'];
        $entity->name = $source['name'];
        $entity->email = $source['email'];
        $entity->message = $source['message'];
        $entity->create_at = !isset($source['create_at']) ? NULL : $source['create_at'];

        return $entity;
    }

}

?>