<?php


$numbers = [10, 20, 30, 40, 50];

// Calculate sum of elements
$sum = array_sum($numbers);

// Count how many elements are in the array
$count = count($numbers);

// Calculate average
$average = $sum / $count;

echo "The average is: " . $average;
