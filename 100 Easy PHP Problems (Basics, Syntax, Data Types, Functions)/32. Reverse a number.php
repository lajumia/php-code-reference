<?php

//Method 1
$number = "0123456789";
$num_prev = strrev($number);
echo $num_prev;


// Method 2
$number2 = "0123456789";
for($i=strlen($number2)-1;$i>=0;$i--){

echo $number2[$i];
}