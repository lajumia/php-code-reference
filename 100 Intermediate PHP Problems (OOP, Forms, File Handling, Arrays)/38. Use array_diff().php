<?php
// Array 1
$array1 = [1, 2, 3, 4, 5];

// Array 2
$array2 = [4, 5, 6, 7, 8];

// Using array_diff to get the values in $array1 that are not in $array2
$result = array_diff($array1, $array2);

// Output the result
print_r($result);
?>
