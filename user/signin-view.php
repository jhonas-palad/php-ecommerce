<?php 
    require_once '../config.php';
    


    print_r($_POST);
    $context = [
        'url' => $_SERVER['PHP_SELF'],
        'url_sign_up' => '/php-ecommerce/user/signup-view.php',

    ];

    echo $twig->render('signin-view-template.html', $context);

