<?php

class DoctorDetail{
    public $id;
    public $branch;
    public $treatmentType;
    public $uid;
    public $title;
    public $bio;
    public $profile;
    public $email;
    public $phone;
    public $create_at;

    public function __construct($source = [])
    {
        foreach($source as $key => $value){
            $this->{$key} = $value;
        }
    }
}

?>