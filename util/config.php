<?php

function getConfig(){
    $jsonFile = file_get_contents('config.json');
    $config = json_decode($jsonFile,true);
    return $config;
}

?>