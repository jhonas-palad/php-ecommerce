<?php

require_once '../config.php';
use \models\{Colorway, Series, Category, Product};


//Fetch all rows of these tables. For modal select box.
$colorway_queryset = Colorway::all($mysqli);
$series_queryset = Series::all($mysqli);
$category_queryset = Category::all($mysqli);
$product_queryset = Product::all($mysqli);


if(isset($_GET['category_id'])){
    $category_id = $_GET['category_id'];
    $series_queryset = Series::get($mysqli, "series_category_id", intval($category_id));
    echo json_encode($series_queryset);
    exit();
    
}


$context = [
    'title' => 'admin',
    'url' => $_SERVER['PHP_SELF'],
    'files' => print_r($_FILES,true),
    'media' => UPLOAD_DIR,
    'uploaded_files' => [
        'hello'
    ],
    'series_list' => [
        'Hello world',
        'World Hellodd'
    ],
    'color_list' => [
        'Hello world',
        'World Hellodd'
    ],
    'colorway_queryset' => $colorway_queryset,
    'series_queryset' => $series_queryset,
    'category_queryset' => $category_queryset,
    'add_product' => $add_product,
    'product_queryset' => $product_queryset
    
];


echo $twig->render('admin-template.html', $context);
