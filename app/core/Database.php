<?php

class Database {
    public $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "db_gereja_pemuda");
        if ($this->conn->connect_error) {
            die("Database error");
        }
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function escape($value) {
        return $this->conn->real_escape_string($value);
    }
}
