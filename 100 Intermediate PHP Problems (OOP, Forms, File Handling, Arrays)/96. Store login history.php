1. Create a MySQL Table to Store Login History
You can create a login_history table in your database to store login details. Here's an example SQL schema for this:

sql
Copy
Edit
CREATE TABLE login_history (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    username VARCHAR(255) NOT NULL,
    login_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ip_address VARCHAR(45) NOT NULL,
    user_agent VARCHAR(255) NOT NULL
);
user_id: The ID of the user who logged in (foreign key from the users table).

username: The username of the user.

login_time: The timestamp of the login (automatically set to the current time).

ip_address: The IP address from which the user logged in.

user_agent: The user-agent string (browser and device details).

2. PHP Script to Handle User Login and Store History
In the login process, after validating the user's credentials (e.g., checking the username and password), you will store the login details into the login_history table.

Login Form (login_form.html)
html
Copy
Edit
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<h2>Login Form</h2>
<form action="login.php" method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username" required><br><br>
    
    <label for="password">Password:</label>
    <input type="password" name="password" required><br><br>
    
    <button type="submit">Login</button>
</form>

</body>
</html>
PHP Script to Handle Login and Store Login History (login.php)
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

// Start session to manage user login
session_start();

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get login credentials from POST data
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Validate credentials (this should be replaced with actual database checks)
    // For the sake of example, assume username is 'user' and password is 'password'
    if ($input_username === 'user' && $input_password === 'password') {
        // Store session information after successful login
        $_SESSION['username'] = $input_username;

        // Get user information (this is an example; you would typically fetch this from a database)
        $user_id = 1; // Example user ID
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        // Store login history in the database
        $stmt = $conn->prepare("INSERT INTO login_history (user_id, username, ip_address, user_agent) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $user_id, $input_username, $ip_address, $user_agent);
        $stmt->execute();

        // Redirect to dashboard or home page after successful login
        header('Location: dashboard.php');
        exit();
    } else {
        // Invalid login attempt
        echo "Invalid username or password.";
    }
}

$conn->close();
?>
3. Display Login History for a User
If you want to display a user's login history, you can fetch the records from the login_history table and show them on a page.

PHP Script to Fetch and Display Login History (login_history.php)
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

// Start session to get the logged-in user's ID
session_start();
if (!isset($_SESSION['username'])) {
    echo "You must be logged in to view your login history.";
    exit();
}

// Assume the user ID is fetched from the database based on their session or username
$user_id = 1; // Example user ID (you should query this from your user table)

// Fetch login history from the database
$sql = "SELECT * FROM login_history WHERE user_id = $user_id ORDER BY login_time DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Your Login History:</h2>";
    echo "<table border='1'>
            <tr>
                <th>Login Time</th>
                <th>IP Address</th>
                <th>User Agent</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['login_time'] . "</td>
                <td>" . $row['ip_address'] . "</td>
                <td>" . $row['user_agent'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No login history found.";
}

$conn->close();
?>
