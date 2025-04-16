<!DOCTYPE html>
<html>
<head>
    <title>Email Validation</title>
</head>
<body>

    <h2>Enter Your Email</h2>
    <form method="post" action="">
        <input type="email" name="email" required>
        <input type="submit" value="Validate">
    </form>

    <!-- PHP code goes here -->

</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Validate the email address
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color: green;'>Valid email address: " . htmlspecialchars($email) . "</p>";
    } else {
        echo "<p style='color: red;'>Invalid email address.</p>";
    }
}
?>
