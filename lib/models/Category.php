<?php

namespace models;

use \models\ModelBase;

class Category extends ModelBase{
    
    public static function all($conn, $table_name = "category"){
        
        return parent::all($conn, strtolower($table_name));
    }
    public static function get($conn, $key, $value, $table_name="category"){
        return parent::get($conn,$table_name, $key, $value);
    }
    
}
