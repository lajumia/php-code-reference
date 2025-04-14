<?php

$a = 23;
$b = 12;
$c = 45;

function find_minimum_number($a,$b,$c){

    $min = min($a, $b, $c);

    echo "Minimum value is ". $min;


}

find_minimum_number($a, $b, $c);//Minimum value is 12

?>