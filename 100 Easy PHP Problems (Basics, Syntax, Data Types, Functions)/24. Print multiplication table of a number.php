<?php

$number = 9;

function print_multiplication_table($number) {

    for ($i = 1; $i <= 10; $i++) {
        $result = $number * $i;
        echo $number." x ".$i."= ".$result."<br>";
    }
}

print_multiplication_table($number);