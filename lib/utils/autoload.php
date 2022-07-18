
<?php
spl_autoload_register(function ($classname) {
    $dirs = array (
       BASE_DIR . '/lib/Twig-3.x/',# ABsolute path dir
       BASE_DIR . '/lib/'
    );
   
    foreach ($dirs as $dir) {
        $filename = $dir . str_replace('\\', '/', $classname) .'.php';
        #Check if the file is present
        
        if (file_exists($filename)) {
            
            require_once $filename;
            break;
        }
    }

});

?>
