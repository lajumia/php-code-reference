<?php
session_start(); // Start the session at the beginning
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Session Example</title>
</head>
<body>
    <h2>Enter Your Information</h2>
    <form method="POST" action="store.php">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
<?php
session_start(); // Start session to store data

// Sanitize input
$name = htmlspecialchars(trim($_POST['name']));
$email = htmlspecialchars(trim($_POST['email']));

// Store in session
$_SESSION['user'] = [
    'name' => $name,
    'email' => $email
];

// Redirect to show page
header("Location: show.php");
exit;
