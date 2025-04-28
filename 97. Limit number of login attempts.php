1. Create a Database Table to Store Failed Login Attempts
Create a failed_logins table in your database to track the failed login attempts. Here's an example SQL schema:

sql
Copy
Edit
CREATE TABLE failed_logins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    attempt_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ip_address VARCHAR(45) NOT NULL
);
username: The username attempted to log in.

attempt_time: The timestamp of the failed attempt.

ip_address: The IP address from which the login attempt was made.

2. PHP Script to Handle Login with Attempt Limitation
The PHP script will:

Track login attempts.

Allow login if the number of failed attempts is within the allowed limit.

Block login attempts if the threshold is exceeded.

Login Script (login.php):
php
Copy
Edit
<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test"; // Use your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Max login attempts before blocking
$max_attempts = 5;
$block_duration = 30 * 60; // 30 minutes in seconds
$time_frame = 15 * 60; // 15 minutes in seconds

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get login credentials from POST data
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];
    $ip_address = $_SERVER['REMOTE_ADDR']; // Get the user's IP address

    // Check if the user is blocked (if there are too many failed attempts within the time frame)
    $current_time = time();
    $sql = "SELECT COUNT(*) AS failed_attempts FROM failed_logins 
            WHERE username = ? 
            AND attempt_time > (NOW() - INTERVAL $time_frame SECOND)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $input_username);
    $stmt->execute();
    $stmt->bind_result($failed_attempts);
    $stmt->fetch();
    
    if ($failed_attempts >= $max_attempts) {
        // Check if the user is still blocked
        $sql_block_check = "SELECT MAX(attempt_time) AS last_failed_attempt FROM failed_logins 
                            WHERE username = ? 
                            AND attempt_time > (NOW() - INTERVAL $block_duration SECOND)";
        $stmt = $conn->prepare($sql_block_check);
        $stmt->bind_param("s", $input_username);
        $stmt->execute();
        $stmt->bind_result($last_failed_attempt);
        $stmt->fetch();

        if ($last_failed_attempt) {
            $time_since_last_failed = $current_time - strtotime($last_failed_attempt);
            if ($time_since_last_failed < $block_duration) {
                echo "Your account is temporarily locked. Please try again later.";
                exit();
            }
        }
    }

    // Validate login credentials (replace with actual database check)
    if ($input_username === 'user' && $input_password === 'password') {
        // Successful login: start session and redirect to dashboard
        $_SESSION['username'] = $input_username;
        header('Location: dashboard.php');
        exit();
    } else {
        // Failed login: store the failed attempt
        $stmt = $conn->prepare("INSERT INTO failed_logins (username, ip_address) VALUES (?, ?)");
        $stmt->bind_param("ss", $input_username, $ip_address);
        $stmt->execute();
        echo "Invalid username or password.";
    }
}

$conn->close();
?>