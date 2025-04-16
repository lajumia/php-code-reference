<?php

$numbers = [1, 2, 3, 2, 4, 5, 3, 6, 1];

$counts = array_count_values($numbers);

$duplicates = [];

foreach ($counts as $value => $count) {
    if ($count > 1) {
        $duplicates[] = $value;
    }
}

print_r($duplicates);

