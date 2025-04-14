
<?php

$a = 34;
$b = 234;

function find_max_number($number1, $number2){

    if($number1 == $number2){
    echo "The number is equal ";

    }elseif($number1 > $number2){
        echo "The larger Number is ". $number1;
    }else{
        echo "The larger Number is ". $number2;
    }

}

find_max_number($a,$b);// The larger Number is 234

?>

