<?php

$n1 = 4;
$n2 = 5;




function find_lcm($n1,$n2){
    $max = ($n1>$n2) ? $n1 : $n2;

    for($i=$max; ; $i++){
        if($i%$n1==0 && $i%$n2==0){
            echo $i;
            break;
        }
    }


}


find_lcm($n1, $n2);