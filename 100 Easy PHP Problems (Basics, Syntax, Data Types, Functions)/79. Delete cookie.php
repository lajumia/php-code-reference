<?php
// Delete the "username" cookie by setting its expiration time to one hour ago
setcookie("username", "", time() - 3600, "/");

echo "Cookie has been deleted!";
?>
