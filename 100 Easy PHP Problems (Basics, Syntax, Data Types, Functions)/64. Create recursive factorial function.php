<?php

$number = 5;

function factorial($number){
    if($number == 0 || $number == 1 ){
        return 1;
    }
    $factorial = $number * factorial($number-1);
    return $factorial;

}
echo "The factorial number of {$number} is ". factorial($number);