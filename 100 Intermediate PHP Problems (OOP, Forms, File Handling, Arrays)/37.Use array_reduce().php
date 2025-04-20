<?php
// Array of numbers
$numbers = [1, 2, 3, 4, 5];

// Using array_reduce to sum the values
$sum = array_reduce($numbers, function($carry, $item) {
    return $carry + $item;
}, 0);

// Output the result
echo "Sum: " . $sum;
?>
