<?php
// Define a class named Car
class Car {
    // Properties (variables inside a class)
    public $brand;
    public $color;

    // Constructor to initialize properties
    public function __construct($brand, $color) {
        $this->brand = $brand;
        $this->color = $color;
    }

    // Method (function inside a class)
    public function displayInfo() {
        echo "Brand: " . $this->brand . "<br>";
        echo "Color: " . $this->color . "<br>";
    }
}

// Create an object (instance) of the class
$myCar = new Car("Toyota", "Red");

// Call the method using the object
$myCar->displayInfo();
?>
