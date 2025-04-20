<?php
// Original array with "falsy" values
$values = [1, 0, 3, "", false, 4, null, 5];

// Using array_filter to remove "falsy" values
$filteredValues = array_filter($values);

// Output the result
print_r($filteredValues);
?>
