✅ Step 1: HTML + JavaScript (AJAX) — form.html
html
Copy
Edit
<!DOCTYPE html>
<html>
<head>
    <title>AJAX Form</title>
    <script>
        function submitForm(event) {
            event.preventDefault(); // Prevent page reload

            const formData = new FormData(document.getElementById("myForm"));

            fetch("process.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById("response").innerHTML = data;
            })
            .catch(error => {
                document.getElementById("response").innerHTML = "Error: " + error;
            });
        }
    </script>
</head>
<body>

<h2>AJAX Contact Form</h2>

<form id="myForm" onsubmit="submitForm(event)">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    <input type="submit" value="Submit">
</form>

<div id="response"></div>

</body>
</html>
✅ Step 2: PHP Backend — process.php
php
Copy
Edit
<?php
// Simple form processing
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';

if ($name && $email) {
    echo "Thanks, $name! We received your email: $email";
} else {
    echo "Please fill in all fields.";
}
?>