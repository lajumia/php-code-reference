<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Download Example</title>
</head>
<body>

<h2>Download Files</h2>

<!-- Form to select a file to download -->
<form action="download.php" method="GET">
    <label for="file">Select file to download:</label>
    <select name="file" id="file">
        <!-- Dynamically generated file list (from PHP) -->
        <?php
        // List available files from the 'uploads' directory
        $upload_dir = 'uploads/';
        $files = scandir($upload_dir);

        // Loop through the files and display them in the select dropdown
        foreach ($files as $file) {
            // Exclude "." and ".." directories
            if ($file != '.' && $file != '..') {
                echo "<option value='$file'>$file</option>";
            }
        }
        ?>
    </select>
    <input type="submit" value="Download">
</form>

</body>
</html>
<?php
// Function to download the file
function download_file($file_path) {
    // Check if the file exists
    if (file_exists($file_path)) {
        // Set headers to prompt file download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream'); // Binary data
        header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
        header('Content-Length: ' . filesize($file_path));

        // Clear the output buffer
        ob_clean();
        flush();

        // Read the file and send it to the output
        readfile($file_path);

        // Terminate the script to stop further output
        exit;
    } else {
        echo "File not found.";
    }
}

// Example usage
if (isset($_GET['file'])) {
    $file_name = $_GET['file']; // Get the file name from the URL parameter
    $file_path = 'uploads/' . $file_name; // Set the full path to the file

    // Call the download function
    download_file($file_path);
}
?>
