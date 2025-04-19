<?php
$filename = "user_data.txt"; // File to delete

if (file_exists($filename)) {
    // Delete the file
    if (unlink($filename)) {
        echo "The file $filename has been deleted successfully.";
    } else {
        echo "Unable to delete the file.";
    }
} else {
    echo "The file $filename does not exist.";
}
?>
