<!DOCTYPE html>
<html>
<head>
    <title>GET Method Example</title>
</head>
<body>

    <h2>Enter Your Name</h2>

    <form action="process.php" method="get">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <br><br>
        <input type="submit" value="Submit">
    </form>

</body>
</html>
<?php
// Check if 'name' is sent via GET
if (isset($_GET['name'])) {
    $name = $_GET['name'];
    echo "Hello, " . htmlspecialchars($name) . "!";
} else {
    echo "No name provided.";
}
