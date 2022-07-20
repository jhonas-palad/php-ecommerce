<?php

require_once '../config.php';
#ini_set('display_errors',1); # uncomment if you need debugging

use \models\ProductVariant;


$products = ProductVariant::all($mysqli, 12);



$context = [
    'title' => 'ByteMe',
    'slideshow_content_paths' => [
        'apple_mac_m1' => 'static/main/img/m1-chip-macbook-air-pro.jpg',
        'byteme_labeled' => 'static/main/img/BYTEME-LABELED-COLORED.svg',
    ],
    'peso' => PESO_SIGN,
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
    'colors' =>[
        [
            'color_name' => 'white',
            'color_hex' => '#F2F3F4'
        ],
        [
            'color_name' => 'black',
            'color_hex' => '#333333'
        ],
        
    ],
    'products' => $products,
    'products_pre' => print_r($products, true),
    
        
    
];




echo $twig->render('index-template.html', $context);


?>
