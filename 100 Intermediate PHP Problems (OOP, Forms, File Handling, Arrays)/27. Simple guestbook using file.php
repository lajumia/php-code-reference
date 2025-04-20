<!DOCTYPE html>
<html>
<head>
    <title>Simple Guestbook</title>
</head>
<body>
    <h2>Guestbook</h2>

    <!-- Guestbook Form -->
    <form method="POST" action="">
        <label for="name">Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label for="message">Message:</label><br>
        <textarea name="message" rows="4" required></textarea><br><br>

        <input type="submit" value="Sign Guestbook">
    </form>

    <hr>

    <h3>Messages:</h3>

    <?php
    $file = "guestbook.txt";

    // Handle Form Submission
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = htmlspecialchars(trim($_POST["name"]));
        $message = htmlspecialchars(trim($_POST["message"]));

        $entry = "Name: $name\nMessage: $message\nDate: " . date("Y-m-d H:i:s") . "\n---\n";
        file_put_contents($file, $entry, FILE_APPEND | LOCK_EX);

        echo "<p><strong>Thank you, $name! Your message has been added.</strong></p><hr>";
    }

    // Display Guestbook Entries
    if (file_exists($file)) {
        $entries = file_get_contents($file);
        echo nl2br(htmlspecialchars($entries)); // nl2br() keeps line breaks
    } else {
        echo "<p>No messages yet. Be the first to sign!</p>";
    }
    ?>
</body>
</html>
