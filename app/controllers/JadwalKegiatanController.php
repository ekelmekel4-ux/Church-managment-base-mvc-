<?php
require_once __DIR__ . '/../models/JadwalKegiatan.php';

class JadwalKegiatanController extends Controller {

    private $model;

    public function __construct($db) {
        $this->model = new JadwalKegiatan($db);

        if (!isset($_SESSION['role'])) {
            header("Location: ?url=auth/index");
            exit;
        }
    }

    public function index() {
        $data = $this->model->all();
        include __DIR__ . '/../views/admin/jadwal_kegiatan/index.php';
    }

    /* ===================== CREATE ===================== */
    public function create() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $required = [
                'namaKegiatan',
                'tanggal',
                'waktu',
                'lokasi',
                'deskripsi'
            ];

            foreach ($required as $field) {
                if (empty(trim($_POST[$field]))) {
                    $error = "Semua field wajib diisi!";
                    include __DIR__ . '/../views/admin/jadwal_kegiatan/form.php';
                    return;
                }
            }

            $this->model->create($_POST);
            header("Location: ?url=JadwalKegiatan/index");
            exit;
        }

        include __DIR__ . '/../views/admin/jadwal_kegiatan/form.php';
    }

    /* ===================== EDIT ===================== */
    public function edit($id) {

    $data = $this->model->find($id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // ===== VALIDASI FIELD UMUM =====
        $required = [
            'namaKegiatan',
            'tanggal',
            'waktu',
            'lokasi',
            'deskripsi'
        ];

        foreach ($required as $field) {
            if (empty(trim($_POST[$field]))) {
                $error = "Semua field wajib diisi!";
                include __DIR__ . '/../views/admin/jadwal_kegiatan/edit.php';
                return;
            }
        }

        // ===== UPDATE DATA UTAMA (SEMUA ROLE) =====
        $this->model->update($id, $_POST);

        // ===== KHUSUS PEMBINA =====
        if ($_SESSION['role'] === 'Pembina') {
            $this->model->updateValidasiStatus(
                $id,
                $_POST['validasi'],
                $_POST['status']
            );
        }

        header("Location: ?url=JadwalKegiatan/index");
        exit;
    }

    include __DIR__ . '/../views/admin/jadwal_kegiatan/edit.php';
}

    /* ===================== DELETE ===================== */
    public function delete($id) {
        $this->model->delete($id);
        header("Location: ?url=JadwalKegiatan/index");
        exit;
    }

    
}
