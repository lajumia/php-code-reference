<?php

// JSON string
$json = '{"name":"John Doe","email":"john@example.com","age":30}';

// Decode JSON to associative array
$data = json_decode($json, true);

// Output the array
print_r($data);

?>
