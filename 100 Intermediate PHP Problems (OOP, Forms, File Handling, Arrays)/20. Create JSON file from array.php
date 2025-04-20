<?php

// Define an array
$array = [
    "name" => "John Doe",
    "email" => "john@example.com",
    "age" => 30,
    "address" => [
        "street" => "123 Main St",
        "city" => "Somewhere",
        "zipcode" => "12345"
    ]
];

// Convert the array to JSON format
$jsonData = json_encode($array, JSON_PRETTY_PRINT);

// Define the file path where you want to save the JSON file
$filePath = 'data.json';

// Save the JSON data to the file
if (file_put_contents($filePath, $jsonData)) {
    echo "JSON file created successfully!";
} else {
    echo "Error creating JSON file.";
}

?>
