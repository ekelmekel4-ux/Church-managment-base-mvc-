<?php include __DIR__ . '/../../layout/header.php'; ?>

<h3 class="mb-4">Edit Anggota</h3>

<form action="?url=anggota/edit/<?= $data['userId']; ?>" method="POST">

    <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control"
               value="<?= $data['username']; ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" class="form-control"
               value="<?= $data['nama_lengkap']; ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control">
            <option value="">- Pilih -</option>
            <option value="Laki-laki" <?= $data['jenis_kelamin']=='Laki-laki'?'selected':''; ?>>Laki-laki</option>
            <option value="Perempuan" <?= $data['jenis_kelamin']=='Perempuan'?'selected':''; ?>>Perempuan</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" class="form-control"
               value="<?= $data['tanggal_lahir']; ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea name="alamat" class="form-control"><?= $data['alamat']; ?></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">No HP</label>
        <input type="text" name="no_hp" class="form-control"
               value="<?= $data['no_hp']; ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control"
               value="<?= $data['email']; ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Password (Kosongkan jika tidak diganti)</label>
        <input type="password" name="password" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Role</label>
        <select name="role" class="form-control" required>
            <option value="Pembina" <?= $data['role']=='Pembina'?'selected':''; ?>>Pembina</option>
            <option value="Pemuda" <?= $data['role']=='Pemuda'?'selected':''; ?>>Pemuda</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Status Aktif</label>
        <select name="status_aktif" class="form-control">
            <option value="Aktif" <?= $data['status_aktif']=='Aktif'?'selected':''; ?>>Aktif</option>
            <option value="Tidak Aktif" <?= $data['status_aktif']=='Tidak Aktif'?'selected':''; ?>>Tidak Aktif</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Tanggal Gabung</label>
        <input type="date" name="tanggal_gabung" class="form-control"
               value="<?= $data['tanggal_gabung']; ?>">
    </div>

    <button type="submit" class="btn btn-dark">Update</button>
    <a href="?url=admin/data_anggota" class="btn btn-secondary">Batal</a>

</form>

<?php include __DIR__ . '/../../layout/footer.php'; ?>
