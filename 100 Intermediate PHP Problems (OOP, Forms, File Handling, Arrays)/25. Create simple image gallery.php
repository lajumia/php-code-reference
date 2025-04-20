<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Image Gallery</title>
    <style>
        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .gallery img {
            width: 200px;
            height: auto;
            border: 2px solid #ccc;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <h2>Dynamic Image Gallery</h2>
    <div class="gallery">
        <?php
        $dir = "images/";
        $images = glob($dir . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);

        foreach ($images as $image) {
            echo '<img src="' . $image . '" alt="Image">';
        }
        ?>
    </div>
</body>
</html>
