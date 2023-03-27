<?php

class User{
    public $id;
    public $userName;
    public $password;
    public $type;
    public $create_at;

    public function __construct($source = [])
    {
        foreach($source as $key => $value){
            $this->{$key} = $value;
        }
    }
}

?>