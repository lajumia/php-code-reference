<?php
// Set content type to JSON for API response
header('Content-Type: application/json');

// Check if the email parameter is passed
if (isset($_GET['email'])) {
    $email = $_GET['email'];

    // Validate the email format
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Email format is valid
        $response = [
            'status' => 'success',
            'message' => 'Valid email format',
            'email' => $email
        ];
    } else {
        // Invalid email format
        $response = [
            'status' => 'error',
            'message' => 'Invalid email format',
            'email' => $email
        ];
    }
} else {
    // If email parameter is missing
    $response = [
        'status' => 'error',
        'message' => 'Email parameter is missing'
    ];
}

// Return the response as JSON
echo json_encode($response);
?>
