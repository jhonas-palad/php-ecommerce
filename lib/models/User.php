<?php

namespace models;
use \models\ModelBase;

class User extends ModelBase{
    public static function all($conn, $table_name = "user"){
        
        return parent::all($conn, strtolower($table_name));
    }
    public static function get($conn, $key, $value, $table_name="user"){
        return parent::get($conn,$table_name, $key, $value);
    }

    public static function add($conn, $args, $table_name="user"){
        return parent::add($conn, $table_name, $args);
    }
}