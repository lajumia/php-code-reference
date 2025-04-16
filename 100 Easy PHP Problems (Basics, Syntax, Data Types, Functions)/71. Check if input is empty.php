<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];

    // Check if name is empty
    if (empty($name)) {
        echo "Name is required!";
    } else {
        echo "Hello, " . htmlspecialchars($name);
    }
}
?>

<form method="post">
    <input type="text" name="name" required>
    <input type="submit" value="Submit">
</form>
