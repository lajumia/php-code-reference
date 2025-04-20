<?php
// Associative array
$users = [
    'user3' => 'Tom Brown',
    'user1' => 'John Doe',
    'user2' => 'Jane Smith'
];

// Sort the array by value in descending order
arsort($users);

// Print the sorted array
print_r($users);
?>
