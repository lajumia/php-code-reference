<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Error Handling Example</title>
</head>
<body>

<h2>Form with Error Handling</h2>

<form action="submit_form.php" method="POST">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>"><br>
    <span style="color:red;"><?php echo isset($errors['name']) ? $errors['name'] : ''; ?></span><br><br>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>"><br>
    <span style="color:red;"><?php echo isset($errors['email']) ? $errors['email'] : ''; ?></span><br><br>

    <label for="message">Message:</label><br>
    <textarea name="message" id="message" rows="4" cols="50"><?php echo isset($_POST['message']) ? $_POST['message'] : ''; ?></textarea><br>
    <span style="color:red;"><?php echo isset($errors['message']) ? $errors['message'] : ''; ?></span><br><br>

    <input type="submit" value="Submit">
</form>

</body>
</html>
<?php
// Initialize error array
$errors = [];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input fields

    // Name validation
    if (empty($_POST['name'])) {
        $errors['name'] = "Name is required.";
    } else {
        $name = sanitize_input($_POST['name']);
    }

    // Email validation
    if (empty($_POST['email'])) {
        $errors['email'] = "Email is required.";
    } else {
        $email = sanitize_input($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email format.";
        }
    }

    // Message validation
    if (empty($_POST['message'])) {
        $errors['message'] = "Message is required.";
    } else {
        $message = sanitize_input($_POST['message']);
    }

    // If no errors, process the form (e.g., save to the database or send an email)
    if (empty($errors)) {
        // Example: Display form data (you can replace this with actual processing)
        echo "<h2>Your input was received:</h2>";
        echo "Name: $name<br>";
        echo "Email: $email<br>";
        echo "Message: $message<br>";

        // Optionally, redirect after successful form submission
        // header("Location: thank_you.php");
        exit;
    }
}

// Sanitize input to prevent XSS attacks
function sanitize_input($data) {
    return htmlspecialchars(trim($data));
}
?>
