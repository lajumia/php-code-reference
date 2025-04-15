<?php
// An Armstrong number is a number that is equal to the sum of its own digits,
// each raised to the power of the number of digits.
//Example--------------------------------------------------
// 5¹ = 5 → Armstrong 
// 1³ + 5³ + 3³ = 1 + 125 + 27 = 153 
// 9⁴ + 4⁴ + 7⁴ + 4⁴ = 6561 + 256 + 2401 + 256 = 9474 


$number = 153;

function check_armstrong(){
    $number_count = strlen($number);
    $sum = 0;

    for($i=0;$i<=$number_count-1;$i++){
        $sum += paw($number[$i],$number_count);
    }

    if($sum == $number){
        echo "Armstrong";
    }else{
        echo "Not Armstrong";
    }
}



check_armstrong($number);