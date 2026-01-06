<?php

require_once __DIR__ . '/../models/User.php';

class AuthController extends Controller {

    private $model;

    public function __construct($db) {
        $this->model = new User($db);

        // pastikan session aktif
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /* =========================
       HALAMAN LOGIN
    ========================= */
    public function index() {
        $error = null;
        require_once __DIR__ . '/../views/auth/login.php';
    }

    /* =========================
       PROSES LOGIN
    ========================= */
    public function auth() {

        // VALIDASI INPUT
        if (empty($_POST['username']) || empty($_POST['password'])) {
            $error = "Username dan password wajib diisi";
            require __DIR__ . '/../views/auth/login.php';
            return;
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        // AMBIL USER
        $user = $this->model->getByUsername($username);

        if ($user && password_verify($password, $user['password'])) {

            // SIMPAN SESSION
            $_SESSION['userId']   = $user['userId'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role']     = $user['role'];

            // REDIRECT SESUAI ROLE
            if ($user['role'] === 'Pembina') {
                header("Location: ?url=admin/dashboard");
            } else {
                header("Location: ?url=home/index");
            }
            exit;
        }

        // JIKA GAGAL
        $error = "Username atau password salah";
        require __DIR__ . '/../views/auth/login.php';
    }

    /* =========================
       LOGOUT
    ========================= */
    public function logout() {
        session_unset();
        session_destroy();
        header("Location: ?url=auth/index");
        exit;
    }
}
