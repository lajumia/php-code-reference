<?php
// Start the session
session_start();

// Access session data
if (isset($_SESSION['username'])) {
    echo "Hello, " . $_SESSION['username'] . "!";
} else {
    echo "No session data available.";
}
?>
