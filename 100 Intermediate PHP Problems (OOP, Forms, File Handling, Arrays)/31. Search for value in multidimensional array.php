<?php
// Multidimensional array
$array = [
    ['id' => 1, 'name' => 'John'],
    ['id' => 2, 'name' => 'Jane'],
    ['id' => 3, 'name' => 'Tom'],
];

// Value to search for
$searchValue = 'Jane';
$found = false;

// Search using foreach loop
foreach ($array as $key => $subArray) {
    if (in_array($searchValue, $subArray)) {
        echo "Value '$searchValue' found at key: $key";
        $found = true;
        break;
    }
}

if (!$found) {
    echo "Value '$searchValue' not found.";
}
?>
<?php
// Multidimensional array
$array = [
    ['id' => 1, 'name' => 'John'],
    ['id' => 2, 'name' => 'Jane'],
    ['id' => 3, 'name' => 'Tom'],
];

// Value to search for
$searchValue = 'Jane';

// Search in 'name' column
$column = array_column($array, 'name');

if (in_array($searchValue, $column)) {
    echo "Value '$searchValue' found.";
} else {
    echo "Value '$searchValue' not found.";
}
?>
