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
            'product_name' => $args[0],
            'product_series_id' => $args[1],
            'product_price' => $args[2],
            'product_stock' => $args[3],
            'colorway_name' => $args[4],
        ];
        return parent::add($conn, $table_name, $r_args);
    }
}
