<?php

namespace models;

use \models\ModelBase;

class Product extends ModelBase{
    public static function all($conn, $table_name = "product"){
        
        return parent::all($conn, strtolower($table_name));
    }
    public static function get($conn, $key, $value, $table_name="product"){
        return parent::get($conn,$table_name, $key, $value);
    }
    public static function add($conn, $args, $table_name="product"){
        $r_args = [
            'name' => $args[0],
            'price' => $args[1],
            'description' => $args[2],
            'category_id' => $args[3],
        ];
        return parent::add($conn, $table_name, $r_args);
    }
    public static function filter($conn, $columns, $condition, $table_name="product"){
        $columns = implode(', ', $columns);

        return parent::filter($conn, $table_name, $columns, $condition);
    }
}
