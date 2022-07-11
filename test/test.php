<?php

    $arr = [1,2,3];

    function echo_something($v1, $v2, $v3){
        echo $v1 ,$v2, $v3;
    }

    echo_something(...$arr);

?>
