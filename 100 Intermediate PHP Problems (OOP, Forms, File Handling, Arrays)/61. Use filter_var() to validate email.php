<?php
// Sample email
$email = "example@example.com";

// Validate email using filter_var() with FILTER_VALIDATE_EMAIL
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "The email address '$email' is valid.";
} else {
    echo "The email address '$email' is not valid.";
}
?>
