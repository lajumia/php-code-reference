<?php

$number = -34;
function check_number($number){
    if($number < 0){
        echo "Negative Number";
    
    }elseif($number > 0){
        echo "Positive Number";

    }else{
        echo "Zero";
    }

}

check_number($number);//Negative Number



?>