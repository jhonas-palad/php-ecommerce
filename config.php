<?php

    require_once 'lib/utils/autoload.php';
    define('BASE_DIR',str_replace('\\','/',dirname(__FILE__)));
    define('STATIC_DIR', '/static/');
    define('PESO_LOGO', '₱');

    $debug = TRUE;
  
    $MYSQL_CREDENTIALS = array(
        'HOST' => '127.0.0.1',
        'PORT' => '3306',
        'DB' => 'nzxt_ecommerce_db',
        'USERNAME' => 'root',
        'PASSWORD' => '',
        'SOCKET' => '',
        'DEBUG' => $debug,
        'CHARSET' => 'utf8mb4'
    );

    $mysql_con = new \utils\MySQLi($MYSQL_CREDENTIALS);

    if($mysql_con->connect_error){
        die('Connection failed (MySQL)' . $mysql_con->connect_error);
    }
   
    
    
?>