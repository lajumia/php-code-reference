<?php

$year = 2025;

function check_leap_year($year){
    if($year % 4 == 0){
        echo "{$year} is a leap year";
    }else{
        echo "{$year} is not a leap year";
    }
}

check_leap_year($year);