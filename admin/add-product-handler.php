<?php

require_once '../config.php';

use \models\Product;


if(strcasecmp($request_method, 'POST') == 0){
    
    $ajax_content = json_decode(file_get_contents("php://input"),true);
    
    $adding_product = isset($ajax_content['add_product']);
    $modifying_product = isset($ajax_content['modify_product']);
    $removing_product = isset($ajax_content['modify_product']);
    
    
    if($adding_product){
        
    }
    
    
    

}
