<?php

class CityHospitalDbContext{
    private $_context;
    
    public function __construct($connectionString){
        $connectionString = $this->_extractConnectionString($connectionString);
        $this->_context =  mysqli_connect($connectionString['server'], $connectionString['user'], $connectionString['password'], $connectionString['database']);
        if (!$this->_context){
            echo "database is not connected.";
        }
    }
    
    public function rawSql($query){
        $result = mysqli_query($this->_context, $query);
        return $result;
    }

    public function Read($query){
        $result = $this->rawSql($query);
        $data = [];
        if($result->num_rows != 0){
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    private function _extractConnectionString($connectionString){
        $connection = [];
        foreach (explode(",", $connectionString) as $pair) {
            $item = explode('=',trim($pair));
            $connection[trim($item[0])] = trim($item[1]);
        }
        return $connection;
    }
}

?>

