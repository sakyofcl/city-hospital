
<?php

function insertQuery($entity){
    $tableName = get_class($entity);
    $column = buildColumn($entity);
    $value = buildValues($entity);
    return "INSERT INTO $tableName ($column) VALUES ($value);";
}

function buildColumn($entity){
    $column = get_object_vars($entity);
    $q = "";
    foreach($column as $key => $value){
        $q .= "$key, ";
    }
    if(isset($q)){
        $q = substr_replace(trim($q), "", -1);
    }
    return $q;
}

function buildValues($entity){
    $column = get_object_vars($entity);
    $q = "";
    foreach($column as $key => $value){
        $type = gettype($value);
        
        if($type == "string"){
            $value = "'$value'";
        }

        if(is_null($value)){
            $value = "NULL";
        }

        $q .= "$value, ";
    }

    if(isset($q)){
        $q = substr_replace(trim($q), "", -1);
    }
    return $q;
}

?>