<?php

namespace URLHandlers;


class URLResolver {
    private static $patterns = [];
    private static $base_path = '/';

    public static function path($regex, $cb){

        $pattern = new URLPattern(self::$base_path . $regex, $cb);

        array_push(self::$patterns, $pattern);

    }

    public static function resolve(){
        $parsed_url = parse_url($_SERVER['REQUEST_URI']);


        $current_path = isset($parsed_url['path']) ? $parsed_url['path'] : '/';
        
        foreach(self::$patterns as $pattern){
            $regex = '^' . $pattern->reg_exp . '$';
            echo $regex, '->', $current_path;
            $call_back = $pattern->cb_view;
            if(preg_match($regex,'^' . $current_path . '$', $matches)){
                echo 'asdasd';
            }
            
        }
        


    }

    public static function set_base($base_path){
       self::$base_path = $base_path; 
    }

}

# Pattern consist of:
#   reg_exp -> that will test against the browser's uri
#   cb_view -> a call back to render a view if the request uri matches the reg_exp
#   
class URLPattern {
    public $reg_exp;
    public $cb_view;


    public function __construct($reg_exp, $cb_view){
        $this->reg_exp = $reg_exp;
        $this->cb_view = $cb_view;  
    }
    public function match_expression($uri){

    }

}



?>
