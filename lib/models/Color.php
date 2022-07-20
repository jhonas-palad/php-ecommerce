<?php

namespace models;

use \models\ModelBase;

class Colorway extends ModelBase{
    public static function all($conn, $table_name = "color"){
        
        return parent::all($conn, strtolower($table_name));
    }
    public static function get($conn, $key, $value, $table_name="color"){
        return parent::get($conn,$table_name, $key, $value);
    }
    
}
