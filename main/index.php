<?php

require_once '../config.php';
#ini_set('display_errors',1); # uncomment if you need debugging

$loader = new \Twig\Loader\FilesystemLoader(['templates', BASE_DIR . '/templates_main' ]);
$twig = new \Twig\Environment($loader);

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
    'products' => [
        [
            'name' => 'Starter Pro BLD Kit',
            'src' => 'static/main/img/products/starter_pro_bld_kit.avif',
            'price' => PESO_LOGO . '61,413',
            'colors' => [
                '#333333',
                '#f0f1fa',
            ]
        ],
        [
            'name' => 'Starter Pro BLD Kit',
            'src' => 'static/main/img/products/starter_pro_bld_kit.avif',
            'price' => PESO_LOGO . '61,413',
            'colors' => [
                '#333333',
                '#f0f1fa',
            ]
        ],
        [
            'name' => 'Starter Pro BLD Kit',
            'src' => 'static/main/img/products/starter_pro_bld_kit.avif',
            'price' => PESO_LOGO . '61,413',
            'colors' => [
                '#333333',
                '#f0f1fa',
            ]
        ],
        [
            'name' => 'Starter Pro BLD Kit',
            'src' => 'static/main/img/products/starter_pro_bld_kit.avif',
            'price' => PESO_LOGO . '61,413',
            'colors' => [
                '#333333',
                '#f0f1fa',
            ]
        ],
        [
            'name' => 'Starter Pro BLD Kit',
            'src' => 'static/main/img/products/starter_pro_bld_kit.avif',
            'price' => PESO_LOGO . '61,413',
            'colors' => [
                '#333333',
                '#f0f1fa',
            ]
        ],
    ]
];


echo $twig->render('index.html', $context);


?>
