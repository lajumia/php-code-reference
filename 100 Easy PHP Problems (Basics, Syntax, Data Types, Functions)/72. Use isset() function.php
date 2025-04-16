<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if 'name' is set
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        echo "Hello, " . htmlspecialchars($name) . "!";
    } else {
        echo "Name field is not set.";
    }
}
?>

<form method="post">
    <input type="text" name="name" required>
    <input type="submit" value="Submit">
</form>
