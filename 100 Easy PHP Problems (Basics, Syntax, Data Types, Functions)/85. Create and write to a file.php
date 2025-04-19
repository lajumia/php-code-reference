<?php
$filename = "user_data.txt"; // File to write to
$data = "Username: admin\nPassword: 12345\n";

// Write to the file (this will overwrite the file if it exists)
file_put_contents($filename, $data);

echo "Data has been written to $filename";
?>
<?php
$filename = "user_data.txt"; // File to write to
$data = "Username: admin\nPassword: 12345\n";

// Open the file for writing (create if doesn't exist)
$file = fopen($filename, "w"); // "w" mode overwrites the file

if ($file) {
    fwrite($file, $data); // Write data to the file
    fclose($file); // Close the file
    echo "Data has been written to $filename";
} else {
    echo "Unable to open file.";
}
?>
<?php
$filename = "user_data.txt"; // File to write to
$data = "Username: user2\nPassword: 67890\n";

// Open the file for appending (create if doesn't exist)
$file = fopen($filename, "a"); // "a" mode appends data

if ($file) {
    fwrite($file, $data); // Write data to the file
    fclose($file); // Close the file
    echo "Data has been appended to $filename";
} else {
    echo "Unable to open file.";
}
?>
