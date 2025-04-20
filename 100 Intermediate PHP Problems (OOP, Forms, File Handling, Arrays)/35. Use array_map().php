<?php
// Original array
$numbers = [1, 2, 3, 4, 5];

// Using array_map to square each number
$squaredNumbers = array_map(function($num) {
    return $num * $num;
}, $numbers);

// Output the result
print_r($squaredNumbers);
?>
