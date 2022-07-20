<?php

namespace models;
use \models\ModelBase;

class Series extends ModelBase{
    public static function all($conn, $table_name = "category"){
        
        return parent::all($conn, strtolower($table_name));
    }
    public static function get($conn, $key, $value, $table_name="category"){
        return parent::get($conn,$table_name, $key, $value);
    }

    public static function add($conn, $args, $table_name="category"){
        return parent::add($conn, $table_name, $args);
    }
    
}