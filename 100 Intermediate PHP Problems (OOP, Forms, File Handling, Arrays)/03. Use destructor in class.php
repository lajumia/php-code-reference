<?php
class Car {
    public $brand;
    public $color;

    // Constructor: runs when object is created
    public function __construct($brand, $color) {
        $this->brand = $brand;
        $this->color = $color;
        echo "Car created: $this->brand ($this->color)<br>";
    }

    // Method to display info
    public function displayInfo() {
        echo "Brand: " . $this->brand . "<br>";
        echo "Color: " . $this->color . "<br>";
    }

    // Destructor: runs when object is destroyed or script ends
    public function __destruct() {
        echo "Car destroyed: $this->brand ($this->color)<br>";
    }
}

// Create an object
$myCar = new Car("Honda", "Blue");
$myCar->displayInfo();
?>
