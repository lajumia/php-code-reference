<?php 

class User {
    private $data = [];

    public function __set($key, $value) {
        $this->data[$key] = $value;
    }

    public function __get($key) {
        return $this->data[$key] ?? null;
    }
}

$user = new User();
$user->email = 'laju@example.com';
echo $user->email; // Outputs: laju@example.com
