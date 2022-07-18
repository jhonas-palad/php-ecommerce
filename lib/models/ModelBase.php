<?php

namespace models;

class ModelBase{

    public function __construct($attrs){
        print_r($attrs);
        foreach($attrs as $key => $val){
            $this->$key = $val;
        }
    }
    public static function all($conn, $table_name){
        
        $query = "SELECT * FROM " . $table_name;
        if(!$result = $conn->query($query)){
            die('Error occured!');
        }
        
        return $result->fetch_all($mode = MYSQLI_ASSOC);
    }
    public static function get($conn,$table_name, $key, $value){

        $query = "SELECT * FROM " . $table_name . " WHERE " . $key . " = '". $value . "'";
       
        if(!$result = $conn->query($query)){
            die('Error occured!');
        }
        
        return $result->fetch_all($mode = MYSQLI_ASSOC);
    }
    public static function add($conn, $table_name, $args){
        $keys =implode(", ",array_keys($args));
        $values = "'". implode("', '",array_values($args)) . "'";
        $query = <<<EOD
        INSERT INTO 
            $table_name ($keys)
        VALUES
            ($values)
        
        EOD;
        if(!$conn->query($query)){
            die("Insert Failed");
        }
        echo 'Inserted!' . $keys .PHP_EOL . $values;
        return $conn->insert_id;
    }
}