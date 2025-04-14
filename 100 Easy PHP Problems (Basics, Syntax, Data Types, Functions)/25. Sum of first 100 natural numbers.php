<?php

$number = 100;

function sum_first_100_numbers($number) {
    $sum = 0;
    for ($i = 1; $i <= $number; $i++) {
        $sum += $i;
    }
    return $sum;
}

echo sum_first_100_numbers($number);