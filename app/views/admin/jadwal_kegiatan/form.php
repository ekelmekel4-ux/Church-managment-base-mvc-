<?php include __DIR__ . '/../../layout/header.php'; ?>

<h3 class="mb-4">Tambah Kegiatan Pemuda</h3>

<?php if (!empty($error)): ?>
    <div class="alert alert-danger"><?= $error; ?></div>
<?php endif; ?>

<form method="POST" action="?url=JadwalKegiatan/create">

    <div class="mb-3">
        <label class="form-label">Nama Kegiatan</label>
        <input type="text" name="namaKegiatan" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Tanggal</label>
        <input type="date" name="tanggal" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Waktu</label>
        <input type="time" name="waktu" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Lokasi</label>
        <input type="text" name="lokasi" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
    </div>


    <button type="submit" class="btn btn-dark">Simpan</button>
    <a href="?url=JadwalKegiatan/index" class="btn btn-secondary">Kembali</a>

</form>

<?php include __DIR__ . '/../../layout/footer.php'; ?>
