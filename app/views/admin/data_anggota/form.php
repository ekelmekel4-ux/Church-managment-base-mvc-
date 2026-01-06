<?php include __DIR__ . '/../../layout/header.php'; ?>

<h3 class="mb-4">Tambah Anggota</h3>

<form action="?url=Anggota/create" method="POST">

    <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control">
            <option value="">- Pilih -</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea name="alamat" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">No HP</label>
        <input type="text" name="no_hp" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Role</label>
        <select name="role" class="form-control" required>
            <option value="Pembina">Pembina</option>
            <option value="Pemuda">Pemuda</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Status Aktif</label>
        <select name="status_aktif" class="form-control">
            <option value="Aktif">Aktif</option>
            <option value="Tidak Aktif">Tidak Aktif</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Tanggal Gabung</label>
        <input type="date" name="tanggal_gabung" class="form-control">
    </div>

    <button type="submit" class="btn btn-dark">Simpan</button>
    <a href="?url=admin/data_anggota" class="btn btn-secondary">Kembali</a>

</form>

<?php include __DIR__ . '/../../layout/footer.php'; ?>
