<?php
// Set a cookie that expires in 1 hour
setcookie("username", "JohnDoe", time() + 3600, "/"); // 3600 seconds = 1 hour

echo "Cookie has been set!";
?>
