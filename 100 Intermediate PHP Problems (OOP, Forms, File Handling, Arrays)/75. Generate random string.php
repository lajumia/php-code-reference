$length = 16; // Length in bytes, final string will be twice as long
$randomString = bin2hex(random_bytes($length));
echo $randomString;
