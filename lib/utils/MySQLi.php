<?php

namespace utils;

use mysqli as GlobalMysqli;

class MySQLi extends GlobalMysqli {

    public function __construct($conf_args){

        $args = [
            $conf_args['HOST'], 
            $conf_args['USERNAME'], 
            $conf_args['PASSWORD'], 
            $conf_args['DB'], 
            $conf_args['PORT'], 
            $conf_args['SOCKET']
        ];


        $flags = ($conf_args['DEBUG']) ? MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT : MYSQLI_REPORT_OFF;

        mysqli_report($flags);

        parent::__construct(...$args);

        $this->set_charset($conf_args['CHARSET']);

    }
}


?>