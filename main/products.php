<?php

    $type = [
        [
            'type_id' => 1,
            'type_name' => 'PC'
        ],
        [
            'type_id' => 2,
            'type_name' => 'Keyboard'
        ],
        [
            'type_id' => 3,
            'type_name' => 'Cases'
        ],
    ];
    
    
    $series = [
        [
            'series_id' => 1,
            'series_name' => 'Starter PC',
            'series_description' => 'The Starter PC Series is built by experts to give gamers a competitive advantage.',
            'series_type_id' => 1
        ],
        [
            'series_id' => 2,
            'series_name' => "Streaming PC",
            'series_description' => "The Streaming PC Series is designed to run the most popular games beautifully while smoothly operating a stream.",
            'series_type_id' => 1
        ],
        [
            'series_id' => 3,
            'series_name' => 'Foundation PC',
            'series_description' => "The NZXT Foundation PC can handle most of today's popular titles so there's no fear of missing out.",
            'series_type_id' => 1
        ],
        [
            'series_id' => 4,
            'series_name' => 'Creator PC',
            'series_description' => 'The Creator PC Series equips you with everything you need to power projects and save time.',
            'series_type_id' => 1
        ],
        [
            'series_id' => 5,
            'series_name' => 'Function', 
            'series_description' => 'The NZXT Function Keyboard is aesthetically sleek, hot-swappable, and available in three versatile sizes to suit any space and use-case.', 
            'series_type_id' => 2
        ],
	    [
            'series_id' => 6,
            'series_name' => 'H7', 
            'series_description' => 'H7 cases are flexible, easy to build in, and spacious with plenty of room for a wide range of components.', 
            'series_type_id' => 3
        ],
	    [
            'series_id' => 7,
            'series_name' => 'H210 Series', 
            'series_description' => 'The H210 is a small chassis with a spacious interior supporting radiators up to 240mm.', 
            'series_type_id' => 3
        ]
    ];

    $product = [
        [
            'product_id' => 1,
            'product_name' => 'Starter PC',
            'product_series' => 1
        ],
        [
            'product_id' => 2,
            'product_name' => 'Starter PC Plus',
            'product_series' => 1
        ],
        [
            'product_id' => 3,
            'product_name' => 'Starter PC Pro',
            'product_series' => 1
        ],
        [
            'product_id' => 4,
            'product_name' => 'Streaming PC',
            'product_series' => 2
        ],
        [
            'product_id' => 5,
            'product_name' => 'Streaming PC Plus',
            'product_series' => 2
        ],
        [
            'product_id' => 6,
            'product_name' => 'Streaming PC Pro',
            'product_series' => 2
        ],
        [
            'product_id' => 7,
            'product_name' => 'Foundation PC',
            'product_series' => 3
        ],
        [
            'product_id' => 8,
            'product_name' => 'Creator PC',
            'product_series' => 4
        ],
        [
            'product_id' => 9,
            'product_name' => 'Creator PC Plus',
            'product_series' => 4
        ],
        [
            'product_id' => 10,
            'product_name' => 'Creator PC Pro',
            'product_series' => 4
        ],
        
    ];

    $product_attribute = [
        [
            'product_id' => 1, 
            'colorway_name' => 'white',
            'product_price' => 56173.77,
            'product_stock' => 10
        ],
        [   
            'product_id' => 1, 
            'colorway_name' => 'black',
            'product_price' => 56173.77,
            'product_stock' => 13
        ],
        [
            'product_id' => 2, 
            'colorway_name' => 'white',
            'product_price' => 61853.00,
            'product_stock' => 14
        ],
        [
            'product_id' => 2, 
            'colorway_name' => 'black',
            'product_price' => 61853.00,
            'product_stock' => 9
        ],
        [
            'product_id' => 3, 
            'colorway_name' => 'white',
            'product_price' => 73042.77,
            'product_stock' => 11
        ],
        [
            'product_id' => 3, 
            'colorway_name' => 'black',
            'product_price' => 73042.77,
            'product_stock' => 5
        ],
        [
            'product_id' => 4, 
            'colorway_name' => 'white',
            'product_price' => 78665.77,
            'product_stock' => 10
        ],
        [
            'product_id' => 4, 
            'colorway_name' => 'black',
            'product_price' => 78665.77,
            'product_stock' => 4
        ],
        [
            'product_id' => 5, 
            'colorway_name' => 'white',
            'product_price' => 84288.77,
            'product_stock' => 5
        ],
        [
            'product_id' => 5, 
            'colorway_name' => 'black',
            'product_price' => 84288.77,
            'product_stock' => 7
        ],
        [
            'product_id' => 6, 
            'colorway_name' => 'white',
            'product_price' => 89911.77,
            'product_stock' => 8
        ],
        [
            'product_id' => 6, 
            'colorway_name' => 'black',
            'product_price' => 89911.77,
            'product_stock' => 3
        ],
        [
            'product_id' => 7, 
            'colorway_name' => 'white',
            'product_price' => 50550.77,
            'product_stock' => 9
        ],
        [
            'product_id' => 7, 
            'colorway_name' => 'black',
            'product_price' => 50550.77,
                'product_stock' => 7
        ],
        [
            'product_id' => 8, 
            'colorway_name' => 'white',
            'product_price' => 101157.77,
            'product_stock' => 8
        ],
        [
            'product_id' => 8, 
            'colorway_name' => 'black',
            'product_price' => 101157.77,
            'product_stock' => 9
        ],
        [
            'product_id' => 9, 
            'colorway_name' => 'white',
            'product_price' => 146141.77,
            'product_stock' => 5
        ],
        [
            'product_id' => 9, 
            'colorway_name' => 'black',
            'product_price' => 146141.77,
            'product_stock' => 5
        ],
        [
            'product_id' => 10,
            'colorway_name' => 'white',
            'product_price' => 224863.77,
            'product_stock' => 6
        ],
        [
            'product_id' => 10,
            'colorway_name' => 'black',
            'product_price' => 224863.77,
            'product_stock' => 4
        ]

    ];

    $colorway = [
        [
            'colorway_name' => 'purple',
            'coloryway_hex' => '#7322c1'
        ],
        [
            'colorway_name' => 'white',
            'coloryway_hex' => '#F2F3F4'
        ],
        [
            'colorway_name' => 'black',
            'coloryway_hex' => '#333333'
        ],
    ]
   
?>