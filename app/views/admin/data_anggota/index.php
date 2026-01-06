<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<?php include __DIR__ . '/../../layout/header.php'; ?>

<h3 class="mb-4">Daftar Anggota</h3>

<?php if ($_SESSION['role'] === 'Pembina'): ?>
    <a href="?url=anggota/create" class="btn btn-dark mb-3">
        + Tambah Anggota
    </a>
<?php endif; ?>

<div class="table-responsive">
<table class="table table-bordered table-striped align-middle">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama Lengkap</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>No HP</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Tanggal Gabung</th>

            <?php if ($_SESSION['role'] === 'Pembina'): ?>
                <th width="160">Aksi</th>
            <?php endif; ?>
        </tr>
    </thead>

    <tbody>
        <?php if (!empty($data)): ?>
            <?php $no = 1; foreach ($data as $row): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($row['username']); ?></td>
                    <td><?= htmlspecialchars($row['nama_lengkap']); ?></td>
                    <td><?= htmlspecialchars($row['jenis_kelamin']); ?></td>
                    <td><?= htmlspecialchars($row['tanggal_lahir']); ?></td>
                    <td><?= htmlspecialchars($row['no_hp']); ?></td>
                    <td><?= htmlspecialchars($row['email']); ?></td>
                    <td><?= htmlspecialchars($row['role']); ?></td>
                    <td><?= htmlspecialchars($row['status_aktif']); ?></td>
                    <td><?= htmlspecialchars($row['tanggal_gabung']); ?></td>

                    <?php if ($_SESSION['role'] === 'Pembina'): ?>
                        <td>
                            <a href="?url=anggota/edit/<?= $row['userId']; ?>"
                               class="btn btn-sm btn-primary mb-1">
                                Edit
                            </a>

                            <a href="?url=anggota/delete/<?= $row['userId']; ?>"
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Yakin ingin menghapus anggota ini?');">
                                Hapus
                            </a>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="<?= ($_SESSION['role'] === 'Pembina') ? 11 : 10; ?>" class="text-center">
                    Data anggota belum tersedia
                </td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
</div>

<?php include __DIR__ . '/../../layout/footer.php'; ?>
