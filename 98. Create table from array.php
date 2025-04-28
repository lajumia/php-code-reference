<?php
// Sample array (could be any array, including associative arrays)
$data = [
    ['name' => 'John', 'age' => 25, 'email' => 'john@example.com'],
    ['name' => 'Jane', 'age' => 30, 'email' => 'jane@example.com'],
    ['name' => 'Tom', 'age' => 35, 'email' => 'tom@example.com']
];

// Function to create table from an array
function createTableFromArray($array) {
    // Check if the array is not empty
    if (empty($array)) {
        echo "No data available.";
        return;
    }

    // Start table
    echo "<table border='1' cellspacing='0' cellpadding='5'>";
    
    // Table headers (from array keys)
    echo "<tr>";
    foreach (array_keys($array[0]) as $key) {
        echo "<th>" . ucfirst($key) . "</th>";
    }
    echo "</tr>";
    
    // Table rows
    foreach ($array as $row) {
        echo "<tr>";
        foreach ($row as $column) {
            echo "<td>" . htmlspecialchars($column) . "</td>";
        }
        echo "</tr>";
    }

    // End table
    echo "</table>";
}

// Call the function to create the table
createTableFromArray($data);
?>
