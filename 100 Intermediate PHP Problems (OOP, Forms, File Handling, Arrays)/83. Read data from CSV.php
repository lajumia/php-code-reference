<?php
// Path to your CSV file
$file = 'data.csv';

// Check if file exists
if (($handle = fopen($file, 'r')) !== FALSE) {
    // Read the header (first line) if needed
    $header = fgetcsv($handle);

    // Read each row and output data
    while (($data = fgetcsv($handle)) !== FALSE) {
        // $data is an array containing the current row
        echo "Name: " . $data[0] . "<br>";
        echo "Email: " . $data[1] . "<br>";
        echo "Age: " . $data[2] . "<br><br>";
    }
    fclose($handle);
} else {
    echo "File not found.";
}
?>
