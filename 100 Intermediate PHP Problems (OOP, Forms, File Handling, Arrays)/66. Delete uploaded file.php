<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload and Delete Images</title>
</head>
<body>

<h2>Upload Multiple Images</h2>

<form action="upload.php" method="POST" enctype="multipart/form-data">
    <label for="files">Choose images to upload:</label>
    <input type="file" name="files[]" id="files" multiple><br><br>
    
    <input type="submit" value="Upload Images" name="submit">
</form>

<h3>Uploaded Images:</h3>

<?php
// Show the list of uploaded images
$upload_dir = 'uploads/';
$allowed_extensions = ['jpg', 'jpeg', 'png']; // Define allowed image types

// Check if the upload directory exists
if (is_dir($upload_dir)) {
    // Get all files in the upload directory
    $files = scandir($upload_dir);

    // Loop through the files and show images
    foreach ($files as $file) {
        $file_ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

        // Check if the file is an image and has a valid extension
        if (in_array($file_ext, $allowed_extensions)) {
            echo "<div style='margin-bottom: 10px;'>";
            echo "<img src='$upload_dir$file' alt='$file' style='width: 100px; height: 100px; margin-right: 10px;'>";
            echo "<a href='?delete=$file'>Delete</a>";
            echo "</div>";
        }
    }
}
?>

</body>
</html>

<?php
if (isset($_POST['submit'])) {
    // Check if files are uploaded
    if (isset($_FILES['files']) && !empty($_FILES['files']['name'][0])) {
        $total_files = count($_FILES['files']['name']);  // Count the number of files uploaded

        // Define allowed file extensions
        $allowed_extensions = ['jpg', 'jpeg', 'png'];

        // Define upload directory
        $upload_dir = 'uploads/';
        
        // Create the uploads directory if it doesn't exist
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        for ($i = 0; $i < $total_files; $i++) {
            // Get the file name and file details
            $file_name = $_FILES['files']['name'][$i];
            $file_tmp = $_FILES['files']['tmp_name'][$i];
            $file_size = $_FILES['files']['size'][$i];
            $file_error = $_FILES['files']['error'][$i];

            // Get file extension
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

            // Check for upload errors
            if ($file_error === UPLOAD_ERR_OK) {
                // Check if the file extension is allowed
                if (in_array($file_ext, $allowed_extensions)) {
                    // Move the uploaded file to the destination directory
                    $file_path = $upload_dir . basename($file_name);
                    if (move_uploaded_file($file_tmp, $file_path)) {
                        echo "File '$file_name' uploaded successfully!<br>";
                    } else {
                        echo "Error uploading '$file_name'.<br>";
                    }
                } else {
                    echo "File type '$file_ext' not allowed for '$file_name'.<br>";
                }
            } else {
                echo "Error uploading '$file_name'. Error code: $file_error<br>";
            }
        }
    } else {
        echo "No files uploaded.";
    }
}

// Handle file deletion
if (isset($_GET['delete'])) {
    $file_to_delete = $_GET['delete'];
    $file_path = 'uploads/' . $file_to_delete;

    // Check if the file exists and then delete it
    if (file_exists($file_path)) {
        if (unlink($file_path)) {
            echo "File '$file_to_delete' deleted successfully!<br>";
        } else {
            echo "Error deleting '$file_to_delete'.<br>";
        }
    } else {
        echo "File '$file_to_delete' not found.<br>";
    }
}
?>
