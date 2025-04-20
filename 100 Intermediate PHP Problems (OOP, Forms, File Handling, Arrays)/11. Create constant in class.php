<?php


class MyClass {
    const MY_CONSTANT = 'This is a constant value';

    public function displayConstant() {
        echo self::MY_CONSTANT;
    }
}

$obj = new MyClass();
$obj->displayConstant(); // Outputs: This is a constant value
