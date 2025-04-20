<?php

// Define an associative array
$data = [
    "name" => "John Doe",
    "email" => "john@example.com",
    "age" => 30
];

// Convert array to JSON
$jsonData = json_encode($data);

// Output the JSON
echo $jsonData;

?>
