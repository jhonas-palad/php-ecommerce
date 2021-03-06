<?php

    require_once 'lib/utils/autoload.php';
    define('BASE_DIR',str_replace('\\','/',dirname(__FILE__)));
    define('STATIC_DIR', '/static/');
    define('PESO_SIGN', '₱');
    define('UPLOAD_DIR', 'media/');

    $request_method = $_SERVER['REQUEST_METHOD']; 

    $upload_url = "/php-ecommerce/uploads";
    $target_upload_path = BASE_DIR . '/uploads';
    
    $debug = TRUE;
  
    $MYSQL_CREDENTIALS = array(
        'HOST' => '127.0.0.1',
        'PORT' => '3306',
        'DB' => 'nzxt_db',
        'USERNAME' => 'root',
        'PASSWORD' => '',
        'SOCKET' => '',
        'DEBUG' => $debug,
        'CHARSET' => 'utf8mb4'
    );

    $mysqli = new \utils\MySQLi($MYSQL_CREDENTIALS);

    if($mysqli->connect_error){
        die('Connection failed (MySQL)' . $mysqli->connect_error);
    }
   
    $loader = new \Twig\Loader\FilesystemLoader(['templates', BASE_DIR . '/templates_main', BASE_DIR . '/static/main/icons' ]);
    $twig = new \Twig\Environment($loader);

    