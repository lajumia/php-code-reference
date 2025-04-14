<?php

$number = 10;

$first = 0;
$second = 1;


for($i = 1; $i <= $number; $i++){
    echo $first . " ";

    $next = $first + $second;
    $first = $second;
    $second = $next;
}