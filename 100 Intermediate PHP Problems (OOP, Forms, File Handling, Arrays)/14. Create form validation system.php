<form action="validate.php" method="POST">
    <label>Name:</label>
    <input type="text" name="name"><br><br>

    <label>Email:</label>
    <input type="text" name="email"><br><br>

    <label>Password:</label>
    <input type="password" name="password"><br><br>

    <button type="submit">Submit</button>
</form>
<?php

$errors = [];
$data = [];

// Helper function to sanitize input
function cleanInput($input) {
    return htmlspecialchars(stripslashes(trim($input)));
}

// Validate Name
if (empty($_POST['name'])) {
    $errors['name'] = "Name is required.";
} else {
    $data['name'] = cleanInput($_POST['name']);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $data['name'])) {
        $errors['name'] = "Only letters and spaces allowed.";
    }
}

// Validate Email
if (empty($_POST['email'])) {
    $errors['email'] = "Email is required.";
} else {
    $data['email'] = cleanInput($_POST['email']);
    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }
}

// Validate Password
if (empty($_POST['password'])) {
    $errors['password'] = "Password is required.";
} else {
    $data['password'] = cleanInput($_POST['password']);
    if (strlen($data['password']) < 6) {
        $errors['password'] = "Password must be at least 6 characters.";
    }
}

// Show result
if (!empty($errors)) {
    echo "<h3>Form contains errors:</h3>";
    foreach ($errors as $field => $error) {
        echo "<p><strong>$field:</strong> $error</p>";
    }
} else {
    echo "<h3>Form Submitted Successfully!</h3>";
    echo "<p>Name: {$data['name']}</p>";
    echo "<p>Email: {$data['email']}</p>";
    // Note: Never display passwords in real apps
}
