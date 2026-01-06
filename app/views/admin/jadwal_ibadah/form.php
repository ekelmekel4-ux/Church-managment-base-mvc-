<?php include __DIR__ . '/../../layout/header.php'; ?>

<h3 class="mb-4">Tambah Jadwal Ibadah</h3>
<form action="?url=JadwalIbadah/create" method="POST">

    <div class="mb-3">
        <label class="form-label">Nama Ibadah</label>
        <input type="text" name="NamaIbadah" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Tanggal</label>
        <input type="date" name="Tanggal" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Waktu</label>
        <input type="time" name="Waktu" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Lokasi</label>
        <input type="text" name="Lokasi" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Pembicara</label>
        <input type="text" name="Pembicara" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-dark">Simpan</button>
    <a href="?url=admin/jadwal_ibadah" class="btn btn-secondary">Kembali</a>

</form>
<?php include __DIR__ . '/../../layout/footer.php'; ?>
