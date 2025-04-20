<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize input
    $name = htmlspecialchars(trim($_POST['name']));
    $feedback = htmlspecialchars(trim($_POST['feedback']));
    
    // Prepare content
    $entry = "Name: $name\nFeedback: $feedback\nDate: " . date("Y-m-d H:i:s") . "\n---\n";

    // Save to file
    file_put_contents("feedback.txt", $entry, FILE_APPEND | LOCK_EX);

    echo "Thank you for your feedback!";
} else {
    echo "Invalid request.";
}
