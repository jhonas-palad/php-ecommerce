<?php

namespace models;


use \models\ModelBase;

class Image extends ModelBase{
    public static function all($conn, $table_name = "image"){
        
        return parent::all($conn, strtolower($table_name));
    }
    public static function get($conn, $key, $value, $table_name="image"){
        return parent::get($conn,$table_name, $key, $value);
    }
    public static function add($conn, $args, $table_name="image"){
        $r_args = [
            'image_id' => $args[0],
            'image_name' => $args[1],
            'image_type' => $args[2],
            'image_size' => $args[3],
            'image_path' => $args[4],
            'image_product_id' => $args[5],
        ];
        
        return parent::add($conn, $table_name, $r_args);

        
    }
    public static function filter($conn, $columns, $condition, $table_name="image"){
        $columns = implode(', ', $columns);

        return parent::filter($conn, $table_name, $columns, $condition);
    }
}