<?php
// Check if headers have been sent
if (headers_sent($file, $line)) {
    echo "Headers already sent in file $file on line $line.";
} else {
    echo "Headers have not been sent yet.";
    // Example of sending a header
    header("Location: https://www.example.com");
}
?>
