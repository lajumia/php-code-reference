<?php
$fileName = 'example.txt';

// Get file extension
$fileInfo = pathinfo($fileName);
$fileExtension = $fileInfo['extension']; // 'txt'

echo "File extension: " . $fileExtension;
?>
