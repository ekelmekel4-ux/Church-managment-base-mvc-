<?php

class User {

    private $conn;

    public function __construct($db) {
        $this->conn = $db->conn;
    }

    public function getByUsername($username) {
        $stmt = $this->conn->prepare(
            "SELECT * FROM actor WHERE username = ?"
        );
        $stmt->bind_param("s", $username);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
