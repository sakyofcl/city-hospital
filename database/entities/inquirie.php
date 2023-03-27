<?php

class Inquirie{
    public $id;
    public $name;
    public $email;
    public $message;
    public $create_at;

    public function __construct($source = [])
    {
        foreach($source as $key => $value){
            $this->{$key} = $value;
        }
    }
}

?>