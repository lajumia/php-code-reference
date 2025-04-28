<?php
// User's plain password (usually from a form)
$password = 'MySecret123';

// Hash the password using bcrypt (default)
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Show the hashed password
echo "Hashed Password: " . $hashed_password;
?>

