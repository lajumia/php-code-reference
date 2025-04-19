<!DOCTYPE html>
<html>
<head>
    <title>Simple Login</title>
</head>
<body>

<h2>Login Form</h2>

<form method="post" action="login.php">
    <label>Username:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <input type="submit" name="login" value="Login">
</form>

<?php
// Check if form is submitted
if (isset($_POST['login'])) {
    // Hardcoded credentials (for demo only)
    $correct_username = "admin";
    $correct_password = "12345";

    // Get form values
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check credentials
    if ($username === $correct_username && $password === $correct_password) {
        echo "<p style='color:green;'>Login successful! Welcome, $username.</p>";
    } else {
        echo "<p style='color:red;'>Invalid username or password.</p>";
    }
}
?>

</body>
</html>
