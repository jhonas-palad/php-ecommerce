<?php

namespace models;

class ProductVariant{
    // public $id;
    // public $name;
    // public $color_name;
    // public $color_hex;
    // public $stock;
    // public $price;
    // public $description; 
    // public $gallery;

    // public function __construct($id, $name, $color_name, $color_hex, $stock, $price, $description, $gallery){
    //     $this->table_name ='product_variant';
    //     $this->id = $id;
    //     $this->name = $name;
    //     $this->color_name = $color_name;
    //     $this->color_hex = $color_hex;
    //     $this->stock =$stock;
    //     $this->price = $price;
    //     $this->description = $description;
    //     $this->gallery = $gallery;
    // }

    public static function all($conn, $limit){
        $query = <<<EOD
        SELECT 
            product.id as product_id,
            product_variant.id as variant_id, 
            product.name as product_name, 
            product.price, 
            color.name as color_name, 
            hex as color_hex, 
            stock, 
            description as product_description, 
            first_img, 
            second_img, 
            third_img, 
            fourth_img
        FROM 
            product_variant
        INNER JOIN
            product ON product_variant.product_id = product.id
        INNER JOIN
            color ON product_variant.color_id = color.id
        INNER JOIN
            gallery ON product_variant.id = gallery.product_variant_id
        ORDER BY
            product_variant.id
        EOD;
        if($limit > 0){
            
            $query = $query . ' LIMIT ' . strval($limit);
        }

        

        if(!$results = $conn->query($query)){
            die("Fetching rows failed");
        }
        $queryset = [];
        $colors = [];
        foreach($results->fetch_all(MYSQLI_ASSOC) as $result){
            $colors[$result['color_name']] = [
                'name' => $result['color_name'],
                'variant_id' => $result['variant_id'],
                'hex' => $result['color_hex'],
                'stock' => $result['stock'],
                'gallery' => [
                    $result['first_img'],
                    $result['second_img'],
                    $result['third_img'],
                    $result['fourth_img'],
                ]
            ];
            $queryset[$result['product_name']] = [
                'name' => $result['product_name'],
                'product_id' => $result['product_id'],
                'price' => $result['price'],
                'description' => $result['product_description'],
                'colors' => $colors
            ];

            

            
        }
        return $queryset ;

    }
}