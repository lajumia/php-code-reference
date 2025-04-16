<?php
if (isset($_COOKIE['username'])) {
    echo "Hello, " . $_COOKIE['username'];
} else {
    echo "Username cookie is not set.";
}
?>
