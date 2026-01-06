<?php

class AdminController {

    public function __construct($db) {

        // CEK LOGIN
        if (!isset($_SESSION['userId'])) {
            header("Location: ?url=auth/index");
            exit;
        }
    }

    public function dashboard() {
        require_once __DIR__ . '/../views/admin/dashboard.php';
    }

    
    // Tambahkan metode jadwal_ibadah
    public function jadwal_ibadah() {
    require_once __DIR__ . '/../controllers/JadwalIbadahController.php';
    $controller = new jadwalIbadahController($GLOBALS['db']); 
    $controller->index(); 
}


    // Tambahkan metode jadwal_kegiatan (karena ada tautan di header.php)
    public function jadwal_kegiatan() {
    require_once __DIR__ . '/../controllers/JadwalKegiatanController.php';
    $controller = new jadwalKegiatanController($GLOBALS['db']); 
    $controller->index(); 
}

    public function data_anggota() {
    require_once __DIR__ . '/../controllers/AnggotaController.php';
    $controller = new AnggotaController($GLOBALS['db']); 
    $controller->index(); 
}
}