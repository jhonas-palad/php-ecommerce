<?php 
    require_once '../config.php';

    $loader = new \Twig\Loader\FilesystemLoader(['templates', BASE_DIR . '/templates_main' ]);
    $twig = new \Twig\Environment($loader);

    $context =[
        'url' => $_SERVER['PHP_SELF'],
    ];
    
    echo $twig->render('signup-view-template.html', $context);

?>