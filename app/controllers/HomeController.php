<?php

class HomeController {

    public function __construct($db) {
        if (!isset($_SESSION['userId']) || $_SESSION['role'] !== 'Pemuda') {
            header("Location: ?url=auth/index");
            exit;
        }
    }

    public function index() {
        require __DIR__ . '/../views/home/index.php';
    }
}
