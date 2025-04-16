<?php
// Start the session
session_start();

// Store data in the session
$_SESSION['username'] = 'JohnDoe';
$_SESSION['email'] = 'johndoe@example.com';

echo "Session variables are set!";
?>
