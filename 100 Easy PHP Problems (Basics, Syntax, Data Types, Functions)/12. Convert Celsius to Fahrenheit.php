<?php

$temp = 34;

function cel_to_fah($temp){
    $fah = ($temp * 9/5) + 32;
    echo "The temperature in Fahrenheit is: " . $fah;
}

cel_to_fah($temp);