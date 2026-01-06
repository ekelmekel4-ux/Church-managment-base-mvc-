<?php
require_once __DIR__ . '/../models/JadwalIbadah.php';

class JadwalIbadahController extends Controller {

    private $model;

    public function __construct($db) {
        $this->model = new JadwalIbadah($db);
    }

    public function index() {
        $data = $this->model->all();
        include __DIR__ . '/../views/admin/jadwal_ibadah/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->create($_POST);
            header("Location: /MVC_CMS_1/public/?url=JadwalIbadah/index");
            exit;
        }
        include __DIR__ . '/../views/admin/jadwal_ibadah/form.php';
    }

    public function edit($id) {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $this->model->update($id, $_POST);

        // FIX: Sesuaikan dengan pola routing project kamu
        header("Location: /MVC_CMS_1/public/?url=JadwalIbadah/index");
        exit;
    }

    $data = $this->model->find($id);
    include __DIR__ . '/../views/admin/jadwal_ibadah/edit.php';
}

    public function delete($id) {
        $this->model->delete($id);
        header("Location: /MVC_CMS_1/public/?url=JadwalIbadah/index");
        exit;
    }

    
}
