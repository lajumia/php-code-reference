1. HTML Form (form.html):
html
Copy
Edit
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form with File Upload</title>
</head>
<body>
    <h2>Submit Form with File Upload</h2>
    <form action="process-form.php" method="POST" enctype="multipart/form-data">
        <!-- Text fields -->
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <!-- File upload -->
        <label for="file">Upload a file:</label>
        <input type="file" name="file" id="file" required><br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
2. PHP Processing Script (process-form.php):
php
Copy
Edit
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Form data (text inputs)
    $name = $_POST['name'];
    $email = $_POST['email'];

    // File upload data
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    // Specify upload directory
    $uploadDirectory = 'uploads/';
    
    // Check if the upload was successful
    if ($fileError === UPLOAD_ERR_OK) {
        // Create a unique file name to avoid conflicts
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $uniqueFileName = uniqid('file_', true) . '.' . $fileExtension;
        $fileDestination = $uploadDirectory . $uniqueFileName;

        // Move the file to the desired location
        if (move_uploaded_file($fileTmpName, $fileDestination)) {
            // Success: Return the form data and uploaded file details
            echo "Form submitted successfully!<br>";
            echo "Name: $name<br>";
            echo "Email: $email<br>";
            echo "File uploaded successfully: <a href='$fileDestination'>$uniqueFileName</a>";
        } else {
            echo "Error uploading the file.";
        }
    } else {
        echo "Error during file upload. Please try again.";
    }
} else {
    echo "Invalid request method.";
}
?>
