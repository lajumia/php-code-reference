<?php
// Creating a nested associative array
$users = [
    // First user
    'user1' => [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'address' => [
            'street' => '123 Main St',
            'city' => 'New York',
            'zip' => '10001'
        ]
    ],
    // Second user
    'user2' => [
        'name' => 'Jane Smith',
        'email' => 'jane@example.com',
        'address' => [
            'street' => '456 Oak St',
            'city' => 'Los Angeles',
            'zip' => '90001'
        ]
    ],
    // Third user
    'user3' => [
        'name' => 'Tom Brown',
        'email' => 'tom@example.com',
        'address' => [
            'street' => '789 Pine St',
            'city' => 'Chicago',
            'zip' => '60601'
        ]
    ]
];

// Accessing nested array values
echo "User 1 Name: " . $users['user1']['name'] . "<br>";
echo "User 2 City: " . $users['user2']['address']['city'] . "<br>";
echo "User 3 Zip Code: " . $users['user3']['address']['zip'] . "<br>";
?>
