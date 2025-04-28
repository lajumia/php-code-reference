✅ 1. contact.html — The Form
html
Copy
Edit
<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
</head>
<body>

<h2>Contact Us</h2>

<form action="contact.php" method="post">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Message:<br>
    <textarea name="message" rows="5" cols="30" required></textarea><br><br>
    <input type="submit" value="Send">
</form>

</body>
</html>
✅ 2. contact.php — Form Handler with Validation
php
Copy
Edit
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize inputs
    $name = trim(htmlspecialchars($_POST["name"] ?? ""));
    $email = trim(htmlspecialchars($_POST["email"] ?? ""));
    $message = trim(htmlspecialchars($_POST["message"] ?? ""));

    // Initialize errors array
    $errors = [];

    // Validate name
    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    // Validate email
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Validate message
    if (empty($message)) {
        $errors[] = "Message is required.";
    }

    if (empty($errors)) {
        // Optionally send email or save to database here
        echo "Thank you, <strong>" . htmlspecialchars($name) . "</strong>. Your message has been received.";
    } else {
        // Display errors
        echo "<h3>There were errors:</h3><ul>";
        foreach ($errors as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
    }

} else {
    echo "Invalid request.";
}
?>