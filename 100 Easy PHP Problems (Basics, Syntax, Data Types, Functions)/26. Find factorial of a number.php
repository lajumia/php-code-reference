<?php

$number = 5;

function factorial($n){

    $factorial = 1;

    for($i=1; $i<=$n; $i++){
        $factorial *=$i;
        echo $factorial . PHP_EOL;
    
    }


}

factorial($number);