<?php
// Multiple rows of CSV
$csv_rows = "John,Doe,30,New York\nJane,Smith,25,Los Angeles";

// Split into lines
$lines = explode("\n", $csv_rows);

foreach ($lines as $line) {
    $fields = explode(",", $line);
    print_r($fields);
}
?>
