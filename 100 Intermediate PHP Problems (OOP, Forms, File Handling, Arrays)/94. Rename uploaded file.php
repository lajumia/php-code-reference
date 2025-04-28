1. HTML Form for File Upload (upload_form.html):
This form will allow the user to choose a file and submit it for upload.

html
Copy
Edit
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>

<h2>Upload File</h2>
<form action="upload.php" method="POST" enctype="multipart/form-data">
    <label for="file">Choose a file to upload:</label>
    <input type="file" name="file" id="file" required><br><br>
    <button type="submit">Upload</button>
</form>

</body>
</html>
2. PHP Script to Handle File Upload and Rename (upload.php):
This PHP script will process the uploaded file, rename it, and move it to the desired folder.

php
Copy
Edit
<?php
// Check if a file is uploaded
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    // Get the file information
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    // Specify the upload directory (ensure the folder exists or create it)
    $uploadDir = 'uploads/';

    // Check if the file was uploaded without errors
    if ($fileError === 0) {
        // Get the file extension
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Generate a new unique name for the file using a timestamp
        $newFileName = uniqid('file_', true) . '.' . $fileExt;

        // Define the new path for the uploaded file
        $fileDestination = $uploadDir . $newFileName;

        // Move the uploaded file to the desired location with the new name
        if (move_uploaded_file($fileTmpName, $fileDestination)) {
            echo "File uploaded and renamed successfully!<br>";
            echo "New file name: " . $newFileName;
        } else {
            echo "There was an error moving the uploaded file.";
        }
    } else {
        echo "Error uploading the file. Error code: " . $fileError;
    }
} else {
    echo "No file uploaded.";
}
?>