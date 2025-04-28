<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // You can process your form data here
    $name = $_POST['name'];
    $email = $_POST['email'];

    // After processing the form, display a confirmation message
    echo "<h2>Thank you for your submission, $name!</h2>";
    echo "<p>We have received your information and will get in touch with you soon.</p>";
    echo "<p>Your email address is: $email</p>";
} else {
    // Display the form if the request method is not POST
    ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <input type="submit" value="Submit">
    </form>
    <?php
}
?>
