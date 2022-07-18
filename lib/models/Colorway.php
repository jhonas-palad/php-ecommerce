<?php

namespace models;

use \models\ModelBase;

class Colorway extends ModelBase{
    public static function all($conn, $table_name = "colorway"){
        
        return parent::all($conn, strtolower($table_name));
    }
    
}
