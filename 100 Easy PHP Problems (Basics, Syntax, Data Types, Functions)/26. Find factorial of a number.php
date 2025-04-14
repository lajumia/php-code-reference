<?php

$number = 5;

function factorial($n){

    if($n < 0){
        return -1;
    }else{

        $result = $n * factorial($n-1);
        echo $result;
        
    }

}

factorial($number);