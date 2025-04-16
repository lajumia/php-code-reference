<?php

$number = 5;
$sum = 0;

function calculate_sum($number){

    if($number == 0){
        return 0;

    }
    $sum += $number + calculate_sum($number - 1);
    return $sum;

}

echo calculate_sum($number);