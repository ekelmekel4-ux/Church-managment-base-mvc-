<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="d-flex justify-content-center align-items-center">

    <div class="card shadow login-card" style="width: 380px;">
        <div class="card-header text-center bg-dark text-white">
            <h5 class="mb-0">Login Aplikasi Gereja Pemuda</h5>
        </div>

        <div class="card-body">

            <?php if (!empty($error)): ?>
                <div class="alert alert-danger text-center">
                    <?= $error; ?>
                </div>
            <?php endif; ?>

            <form action="?url=auth/auth" method="POST">

                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username"
                           class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password"
                           class="form-control" required>
                </div>

                <button class="btn btn-dark w-100">
                    Login
                </button>
            </form>

        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
