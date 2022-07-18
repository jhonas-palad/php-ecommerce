<?php 
    require_once '../config.php';
    

    $context = [
        'url' => $_SERVER['PHP_SELF'],
        'url_sign_up' => '/php-ecommerce/user-auth/signup-view.php',

    ];

    echo $twig->render('signin-view-template.html', $context);

