<!DOCTYPE html>
<html>
<head>
    <title>POST Method Example</title>
</head>
<body>

    <h2>Enter Your Name</h2>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <br><br>
        <input type="submit" value="Submit">
    </form>

    <?php
    // Process form data after submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['name'])) {
            $name = htmlspecialchars($_POST['name']);
            echo "<h3>Hello, $name!</h3>";
        }
    }
    ?>

</body>
</html>
