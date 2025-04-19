<?php
$filename = "user_data.txt"; // File to read

// Read the content of the file
$file_content = file_get_contents($filename);

// Check if reading was successful
if ($file_content !== false) {
    echo "File content: <pre>$file_content</pre>";
} else {
    echo "Unable to read the file.";
}
?>
<?php
$filename = "user_data.txt"; // File to read

// Open the file in read mode
$file = fopen($filename, "r");

if ($file) {
    while (($line = fgets($file)) !== false) {
        echo "Line: $line<br>"; // Print each line
    }

    // Close the file
    fclose($file);
} else {
    echo "Unable to open the file.";
}
?>
<?php
$filename = "user_data.txt"; // File to read

// Open the file in read mode
$file = fopen($filename, "r");

if ($file) {
    // Read the entire content of the file
    $file_content = fread($file, filesize($filename));

    // Close the file
    fclose($file);

    echo "File content: <pre>$file_content</pre>";
} else {
    echo "Unable to open the file.";
}
?>
