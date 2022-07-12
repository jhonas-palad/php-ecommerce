<?php 
    require_once '../config.php';
    
    $loader = new \Twig\Loader\FilesystemLoader(['templates', BASE_DIR . '/templates_main' ]);
    $twig = new \Twig\Environment($loader);

    $context = [
        'url' => $_SERVER['PHP_SELF'],
        'url_sign_up' => '/php-ecommerce/user-auth/signup-view.php',

    ];

    echo $twig->render('signin-view-template.html', $context);

?>