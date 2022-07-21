<?php 
    require_once '../config.php';

    use \models\User;

    $check_unique = json_decode(file_get_contents('php://input'), true);
    if(isset($check_unique['check'])){
        $result = User::get($mysqli, $check_unique['input_name'], $check_unique['input_value']);
        $response = [];
        $response['unique'] = true;
        
        
        if(!empty($result)){
            $response['unique'] = false;
        }
        echo json_encode($response);
        exit();
    }
    

    print_r($check_unique);
    
    $context =[
        'url' => $_SERVER['PHP_SELF'],
        'url_sign_in' => '/php-ecommerce/user/signin-view.php',
        'user_pre' => print_r(User::all($mysqli), true)
        
    ];
    
    echo $twig->render('signup-view-template.html', $context);

