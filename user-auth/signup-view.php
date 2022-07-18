<?php 
    require_once '../config.php';


    $context =[
        'url' => $_SERVER['PHP_SELF'],
        'url_sign_in' => '/php-ecommerce/user-auth/signin-view.php',
        
    ];
    
    echo $twig->render('signup-view-template.html', $context);

