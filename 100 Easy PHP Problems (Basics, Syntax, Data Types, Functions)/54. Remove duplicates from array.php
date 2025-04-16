<?php

$numbers = [1, 2, 3, 2, 4, 5, 3, 6, 1];

$counts = array_count_values($numbers);

$unique = [];

foreach($counts as $number => $count){
    if($count == 1){
        $unique[] = $number;
    }
}

print_r($unique);