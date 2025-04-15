<?php

$number = "23546";
$total = 0;

for($i=0; $i<strlen($number); $i++){
    $total += $number[$i];

}

echo "The total is ". $total;