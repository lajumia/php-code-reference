<?php
// Associative array
$users = [
    'user3' => 'Tom Brown',
    'user1' => 'John Doe',
    'user2' => 'Jane Smith'
];

// Sort the array by key in ascending order
ksort($users);

// Print the sorted array
print_r($users);
?>
