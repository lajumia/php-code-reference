<?php
// Sample URL
$url = "https://www.example.com";

// Validate URL using filter_var() with FILTER_VALIDATE_URL
if (filter_var($url, FILTER_VALIDATE_URL)) {
    echo "The URL '$url' is valid.";
} else {
    echo "The URL '$url' is not valid.";
}
?>
