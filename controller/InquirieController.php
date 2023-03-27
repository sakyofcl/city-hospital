<?php
include_once "./database/uow/UnitOfWork.php";
include_once "./util/core.php";

class InquirieController{
    private $_uow;
    
    public function __construct()
    {
        $this->_uow = new Uow();
    }
    
    public function addInquirie($inquirie){
        $isSave = $this->_uow->Inquirie->AddInquirie($inquirie);
        if($isSave){
            success("Thank you for contacting us. we'll get back to you as soon as possible.");
        }
    }
}

?>
