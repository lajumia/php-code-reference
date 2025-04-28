<?php

function generateThumbnail($sourceImagePath, $thumbnailPath, $width = 150, $height = 150) {
    // Check if file exists
    if (!file_exists($sourceImagePath)) {
        echo "File not found!";
        return;
    }

    // Get image information (mime type)
    list($originalWidth, $originalHeight, $imageType) = getimagesize($sourceImagePath);

    // Create an image resource from the source image
    switch ($imageType) {
        case IMAGETYPE_JPEG:
            $sourceImage = imagecreatefromjpeg($sourceImagePath);
            break;
        case IMAGETYPE_PNG:
            $sourceImage = imagecreatefrompng($sourceImagePath);
            break;
        case IMAGETYPE_GIF:
            $sourceImage = imagecreatefromgif($sourceImagePath);
            break;
        default:
            echo "Unsupported image type!";
            return;
    }

    // Create a new image resource for the thumbnail
    $thumbnail = imagecreatetruecolor($width, $height);

    // Copy and resize the image
    imagecopyresampled($thumbnail, $sourceImage, 0, 0, 0, 0, $width, $height, $originalWidth, $originalHeight);

    // Save the thumbnail image
    switch ($imageType) {
        case IMAGETYPE_JPEG:
            imagejpeg($thumbnail, $thumbnailPath);
            break;
        case IMAGETYPE_PNG:
            imagepng($thumbnail, $thumbnailPath);
            break;
        case IMAGETYPE_GIF:
            imagegif($thumbnail, $thumbnailPath);
            break;
    }

    // Free up memory
    imagedestroy($sourceImage);
    imagedestroy($thumbnail);

    echo "Thumbnail generated successfully: <a href='$thumbnailPath'>$thumbnailPath</a>";
}

// Example usage
$sourceImage = 'path_to_image.jpg'; // Replace with your image path
$thumbnailImage = 'thumbnail_image.jpg'; // Thumbnail file path
generateThumbnail($sourceImage, $thumbnailImage);
?>
