<?php
// Sample array
$data = [
    ['Name', 'Email', 'Age'],
    ['Alice', 'alice@example.com', 28],
    ['Bob', 'bob@example.com', 32],
    ['Charlie', 'charlie@example.com', 25],
];

// Set headers to prompt download
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename="export.csv"');

// Open output stream
$output = fopen('php://output', 'w');

// Write each row to CSV
foreach ($data as $row) {
    fputcsv($output, $row);
}

fclose($output);
exit;
?>
