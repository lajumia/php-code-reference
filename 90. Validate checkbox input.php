1. HTML Form (form.html):
html
Copy
Edit
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkbox Validation Form</title>
</head>
<body>
    <h2>Subscribe to Our Newsletter</h2>
    <form action="process-form.php" method="POST">
        <label for="subscribe">
            <input type="checkbox" name="subscribe" id="subscribe">
            I want to receive newsletters
        </label><br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
2. PHP Script for Validation (process-form.php):
php
Copy
Edit
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the checkbox is checked
    if (isset($_POST['subscribe'])) {
        // If checked, process further
        echo "Thank you for subscribing to our newsletter!";
    } else {
        // If not checked, show an error message
        echo "Please check the box to subscribe to the newsletter.";
    }
} else {
    echo "Invalid request method.";
}
?>