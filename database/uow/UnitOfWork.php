<?php
include_once "./database/context/DbContext.php";
include_once "./util/config.php";
include_once "./database/repository/DoctorRepository.php";
include_once "./database/repository/UserRepository.php";
include_once "./database/repository/AdminRepository.php";
include_once "./database/repository/InquirieRepository.php";

class Uow{
    private $_context;
    public $User;
    public $Admin;
    public $Doctor;
    public $Inquirie;

    public function __construct()
    {
        $this->_context = new CityHospitalDbContext(getConfig()['connectionString']);
        $this->User = new UserRepository($this->_context);
        $this->Admin = new AdminRepository($this->_context);
        $this->Doctor = new DoctorRepository($this->_context);
        $this->Inquirie = new InquirieRepository($this->_context);
    }

}

?>