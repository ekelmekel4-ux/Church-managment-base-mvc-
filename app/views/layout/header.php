<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../../models/LayoutModel.php';
$layoutModel = new LayoutModel($GLOBALS['db']);

$headerData = explode('|', $layoutModel->getLayout('header'));

$currentUrl  = $_GET['url'] ?? '';
$isLoginPage = in_array($currentUrl, ['auth','auth/index','auth/login']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Aplikasi Gereja Pemuda</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/MVC_CMS_1/public/assets/style.css">
</head>

<body class="<?= $isLoginPage ? 'login-page' : 'app-page'; ?>">

<!-- ================= HEADER ================= -->
<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">

            <!-- LOGO + INFO -->
            <div class="d-flex align-items-center">
                <img src="/MVC_CMS_1/public/assets/logo.jpeg" class="logo-img me-3">

                <div class="text-white">
                    <div class="fw-bold"><?= trim($headerData[0] ?? '') ?></div>
                    <div class="small"><?= trim($headerData[1] ?? '') ?></div>
                    <div class="small fst-italic"><?= trim($headerData[2] ?? '') ?></div>
                </div>
            </div>

            <!-- TOGGLE (HP) -->
            <?php if (!$isLoginPage && isset($_SESSION['role'])): ?>
                <button class="navbar-toggler" type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#headerMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <?php endif; ?>

            <!-- MENU -->
            <?php if (!$isLoginPage && isset($_SESSION['role'])): ?>
                <?php $menu = $layoutModel->getMenuByRole($_SESSION['role']); ?>

                <div class="collapse navbar-collapse justify-content-end" id="headerMenu">
                    <ul class="navbar-nav gap-lg-3 mt-3 mt-lg-0">

                        <?php foreach ($menu as $m): ?>
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="?url=<?= $m['url']; ?>">
                                    <?= $m['nama_menu']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>

                        <li class="nav-item">
                            <a class="nav-link text-danger fw-semibold"
                               href="?url=auth/logout">
                                Logout
                            </a>
                        </li>

                    </ul>
                </div>
            <?php endif; ?>

        </div>
    </nav>
</header>

<!-- ================= MAIN ================= -->
<main class="flex-fill <?= $isLoginPage ? 'main-center' : ''; ?>">
    <div class="container my-4">
