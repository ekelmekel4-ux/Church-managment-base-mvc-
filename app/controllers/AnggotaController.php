<?php
require_once __DIR__ . '/../models/Anggota.php';

class AnggotaController {

    private $model;

    public function __construct($db) {
        if (!isset($_SESSION['role'])) {
    header("Location: ?url=auth/login");
    exit;
    }


        $this->model = new Anggota($db);
    }

    public function index() {
    $data = $this->model->getAll();   // benar
    include __DIR__ . '/../views/admin/data_anggota/index.php';
}

public function create() {
    if ($_SESSION['role'] !== 'Pembina') {
        header("Location: ?url=admin/data_anggota");
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $this->model->insert($_POST);
        header("Location: ?url=admin/data_anggota");
        exit;
    }

    include __DIR__ . '/../views/admin/data_anggota/form.php';
}

public function edit($id) {
    if ($_SESSION['role'] !== 'Pembina') {
        header("Location: ?url=admin/data_anggota");
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         if (!empty($_POST['password'])) {
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        } else {
            unset($_POST['password']); // biar tidak update password
        }

        $this->model->update($id, $_POST);
        header("Location: ?url=admin/data_anggota");
        exit;
    }

    $data = $this->model->getById($id);
    include __DIR__ . '/../views/admin/data_anggota/edit.php';
}

public function delete($id) {
    if ($_SESSION['role'] !== 'Pembina') {
        header("Location: ?url=admin/data_anggota");
        exit;
    }

    $this->model->delete($id);
    header("Location: ?url=admin/data_anggota");
    exit;
}
}
