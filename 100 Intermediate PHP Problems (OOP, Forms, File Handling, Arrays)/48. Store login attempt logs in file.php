<?php
session_start();

// Fake users (normally you will fetch from a database)
$users = [
    'admin' => 'password123',
    'user'  => '123456'
];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $login_success = isset($users[$username]) && $users[$username] === $password;

    // Prepare log message
    $log_message = date('Y-m-d H:i:s') . " - Username: {$username} - " . ($login_success ? 'SUCCESS' : 'FAILED') . "\n";

    // Append the log to a file
    file_put_contents('login_logs.txt', $log_message, FILE_APPEND);

    if ($login_success) {
        $_SESSION['username'] = $username;
        echo "Login successful. Welcome, {$username}!";
    } else {
        echo "Invalid login credentials.";
    }
}
?>

<!-- Simple Login Form -->
<form method="POST" action="">
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Login</button>
</form>
