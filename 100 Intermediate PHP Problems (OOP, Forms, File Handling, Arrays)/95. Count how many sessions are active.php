1. Create a MySQL Database to Store Session Information
First, create a table in your database to store session data. Here’s an example SQL schema:

sql
Copy
Edit
CREATE TABLE sessions (
    session_id VARCHAR(255) PRIMARY KEY,
    last_activity INT NOT NULL
);
session_id: The session ID of the user.

last_activity: A timestamp of the user's last activity.

2. PHP Script to Track and Count Active Sessions
Now, we can create a PHP script that will manage the session, store it in the database, and count how many sessions are active.

session_start.php (Start and Track Session)
This script will start a session, track activity, and store it in the database.

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

session_start();

// Set the session ID in the database
$session_id = session_id();
$current_time = time();

// Check if the session already exists in the database
$sql = "SELECT * FROM sessions WHERE session_id = '$session_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Update the last activity time for the existing session
    $update_sql = "UPDATE sessions SET last_activity = $current_time WHERE session_id = '$session_id'";
    $conn->query($update_sql);
} else {
    // Insert a new session record
    $insert_sql = "INSERT INTO sessions (session_id, last_activity) VALUES ('$session_id', $current_time)";
    $conn->query($insert_sql);
}

$conn->close();
?>
count_active_sessions.php (Count Active Sessions)
This script will count how many sessions are currently active. We can define "active" sessions as those that have been active within the last 10 minutes (you can adjust this time period).

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

$active_time_limit = 10 * 60; // Define active time limit (10 minutes)

// Get the current time
$current_time = time();

// Count sessions that have been active in the last 10 minutes
$sql = "SELECT COUNT(*) AS active_sessions FROM sessions WHERE last_activity > ($current_time - $active_time_limit)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "Active sessions: " . $row['active_sessions'];
} else {
    echo "No active sessions.";
}

$conn->close();
?>