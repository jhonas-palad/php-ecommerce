<?php

require_once '../config.php';
#ini_set('display_errors',1); # uncomment if you need debugging

use \models\{Product, Image};

$prod_query = <<<EOD
SELECT DISTINCT
    product_name
FROM 
    product

EOD;

if(!$product_distinct = $mysqli->query($prod_query)){
    die("Error occured!");
}

$product_d_set = $product_distinct->fetch_all();


$product_names = [];
foreach($product_d_set as $p){
    array_push($product_names, $p[0]);
}


$products = [];
foreach($product_names as $name){
    $products[$name] = [];
    foreach(Product::get($mysqli, 'product_name', $name) as $product_row){
        $product_id = $product_row['product_id'];
        $images = Image::get($mysqli, 'image_product_id', $product_id);
        $product_row['images'] = $images;
        array_push($products[$name],$product_row);
    }
}







$context = [
    'title' => 'ByteMe',
    'slideshow_content_paths' => [
        'apple_mac_m1' => 'static/main/img/m1-chip-macbook-air-pro.jpg',
        'byteme_labeled' => 'static/main/img/BYTEME-LABELED-COLORED.svg',
    ],
    'card_content' =>[

        [
        'card_title' => 'Starter PC Series',
        'desc_title' => 'From ₱50,000 PHP',
        'desc_end' => 'Starter PC',
        ],
        [
        'card_title' => 'Streaming PC Series',
        'desc_title' => 'From ₱70,000 PHP',
        'desc_end' => 'Starter PC',
        ],
        [
        'card_title' => 'Foundation PC Series',
        'desc_title' => 'From ₱40,000 PHP',
        'desc_end' => 'Starter PC',
        ],
        [
        'card_title' => 'Creator PC Series',
        'desc_title' => 'From ₱150,000 PHP',
        'desc_end' => 'Starter PC',
        ],
    ],
    'img_banners'=> [
        ['static/main/img/nzxt-banner-1.svg',0],
        ['static/main/img/nzxt-banner-2.svg',1],
        ['static/main/img/nzxt-banner-3.svg',2],
    ],
    'products' => $products,
    'products_pre' => print_r($products,true),
        
    
];


echo $twig->render('index-template.html', $context);


?>
