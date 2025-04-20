<?php

// Path to the JSON file
$filePath = 'data.json';

// Read the contents of the file
$jsonContent = file_get_contents($filePath);

// Decode JSON data into PHP associative array
$dataArray = json_decode($jsonContent, true);

// Print the array
print_r($dataArray);

?>
