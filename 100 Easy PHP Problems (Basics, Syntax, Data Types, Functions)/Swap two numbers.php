<!DOCTYPE html>
<html>
<body>

<?php

$a = 1; $b = 2; $c = 3; $d= 4;

echo "a = ".$a." b = ".$b." c = ".$c." d =".$d;

echo "<br>";

list($a, $b, $c,$d) = array($d,$c,$b,$a);

echo "a = ".$a." b = ".$b." c = ".$c." d =" .$d;


?>

</body>
</html>
