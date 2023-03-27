<?php
include_once "AbstractRepository.php";
include_once "./database/entities/users.php";
include_once "./database/entities/doctordetail.php";
include_once "./util/queryBuilder.php";
include_once "./database/enum/userType.php";
include_once "./database/entities/patientdetail.php";
class UserRepository extends AbstractRepository{
    public function __construct($context)
    {
        parent::__construct($context);
    }

    public function GetAllUser(){
        return $this->_context->rawSql("SELECT * FROM users");
    }

    public function GetUser($id=null){
        $q = "SELECT * FROM user ";
        if(isset($id)){
            $q.="WHERE id=$id ;";
        }
        else{
            $q.= "ORDER BY id DESC LIMIT 1 ;";
        }
        return $this->_context->Read($q);
    }

    public function GetFilteredDoctors($options){
        $userType= UserType::$Doctor;
        $q = "SELECT * FROM user INNER JOIN doctordetail ON user.id=doctordetail.uid WHERE user.type=$userType";

        $filterQuery = "";
        if(!empty($options['search'])){
            $filterQuery.= " doctordetail.title LIKE "."'%".$options["search"]."%' AND"; 
        }
        if(!empty($options['branch'])){
            $filterQuery.= " doctordetail.branch='{$options['branch']}' AND";
        }
        if(!empty($options['treatmentType'])){
            $filterQuery.= " doctordetail.treatmentType='{$options['treatmentType']}' AND";
        }
        $filterQuery = trim(rtrim($filterQuery,"AND"));
        $q.= $filterQuery != "" ? " AND $filterQuery ;" : " ;";

        return $this->_context->Read($q); 
    }
    

    public function AddUser($user){
        $entity = $this->ToEntity($user);
        $q = insertQuery($entity);
        return $this->_context->rawSql($q);
    }


    public function AddDoctorDetail($detail){
        $entity = $this->ToDoctorDetailsEntity($detail);
        $q = insertQuery($entity);
        return $this->_context->rawSql($q);
    }

    public function AddPatientDetail($detail){
        $entity = $this->ToPatientDetailEntity($detail);
        $q = insertQuery($entity);
        return $this->_context->rawSql($q);
    }


    public function LoginUser($user){
        $userName= $user['userName'];
        $password= $user['password'];
        $q = "SELECT * FROM user WHERE userName='$userName' AND password='$password'; ";
        return $this->_context->Read($q);
    }

    private function ToEntity($source){
        $entity = new User();
        $entity->id = !isset($source['id']) ? NULL : (int)$source['id'];
        $entity->userName = $source['userName'];
        $entity->password = $source['password'];
        $entity->type = (int)$source['type'];
        $entity->create_at = !isset($source['create_at']) ? NULL : $source['create_at'];

        return $entity;
    }

    private function ToDoctorDetailsEntity($source){
        $entity = new DoctorDetail();
        $entity->id = !isset($source['id']) ? NULL : (int)$source['id'];
        $entity->uid = $source['uid'];
        $entity->branch = !isset($source['branch']) ? NULL : $source['branch'];
        $entity->treatmentType = !isset($source['treatmentType']) ? NULL : $source['treatmentType'];
        $entity->title = !isset($source['title']) ? NULL : $source['title'];
        $entity->bio = !isset($source['bio']) ? NULL : $source['bio'];
        $entity->profile = !isset($source['profile']) ? NULL : $source['profile'];
        $entity->email = !isset($source['email']) ? NULL : $source['email'];
        $entity->phone = !isset($source['phone']) ? NULL : $source['phone'];
        $entity->create_at = !isset($source['create_at']) ? NULL : $source['create_at'];
        return $entity;
    }

    private function ToPatientDetailEntity($source){
        $entity = new PatientDetail();
        $entity->id = !isset($source['id']) ? NULL : (int)$source['id'];
        $entity->uid = $source['uid'];
        $entity->phone = !isset($source['phone']) ? NULL : $source['phone'];
        $entity->name = !isset($source['name']) ? NULL : $source['name'];
        return $entity;
    }
}

?>