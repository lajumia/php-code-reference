<?php
// Parent class
class Vehicle {
    public $brand;

    public function __construct($brand) {
        $this->brand = $brand;
    }

    public function honk() {
        echo "Beep! Beep!<br>";
    }
}

// Child class that inherits from Vehicle
class Car extends Vehicle {
    public $model;

    public function __construct($brand, $model) {
        // Call parent constructor
        parent::__construct($brand);
        $this->model = $model;
    }

    public function displayInfo() {
        echo "Brand: $this->brand<br>";
        echo "Model: $this->model<br>";
    }
}

// Create object of child class
$myCar = new Car("Toyota", "Corolla");
$myCar->honk();           // Inherited method
$myCar->displayInfo();    // Child class method
?>
