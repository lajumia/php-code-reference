<?php
// Function to get the user's IP address
function getUserIP() {
    // Check if the user is behind a proxy or load balancer (common in many hosting environments)
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    return $ip;
}

// Get and display the user's IP address
$user_ip = getUserIP();
echo "User's IP Address: $user_ip";
?>
