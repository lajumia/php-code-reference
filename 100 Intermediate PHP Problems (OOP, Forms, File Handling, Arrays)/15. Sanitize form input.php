<?php
function sanitizeInput($input) {
    $input = trim($input); // Remove extra spaces from beginning/end
    $input = stripslashes($input); // Remove backslashes
    $input = htmlspecialchars($input); // Convert special characters to HTML entities
    return $input;
}
$name = sanitizeInput($_POST['name']);
$email = sanitizeInput($_POST['email']);
$message = sanitizeInput($_POST['message']);
