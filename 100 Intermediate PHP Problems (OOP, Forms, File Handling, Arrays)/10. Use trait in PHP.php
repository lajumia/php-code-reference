<?php
// Define a trait
trait Logger {
    public function log($message) {
        echo "Log: $message<br>";
    }
}

// Use the trait in different classes
class User {
    use Logger;

    public function create() {
        echo "User created<br>";
        $this->log("User creation logged.");
    }
}

class Order {
    use Logger;

    public function process() {
        echo "Order processed<br>";
        $this->log("Order process logged.");
    }
}

// Create objects
$user = new User();
$user->create();

$order = new Order();
$order->process();
?>
