<?php
// Sample username to validate
$username = "user_name123";

// Regex pattern to validate username
$pattern = "/^[a-zA-Z][a-zA-Z0-9_-]{2,15}$/";

// Check if the username matches the pattern
if (preg_match($pattern, $username)) {
    echo "Valid username.";
} else {
    echo "Invalid username.";
}
?>
