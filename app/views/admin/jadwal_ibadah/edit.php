<?php include __DIR__ . '/../../layout/header.php'; ?>

<h3 class="mb-4">Edit Jadwal Ibadah</h3>

<form action="?url=JadwalIbadah/edit/<?= $data['jadwalIbadahId']; ?>" method="POST">

    <div class="mb-3">
        <label class="form-label">Nama Ibadah</label>
        <input type="text" name="NamaIbadah" class="form-control" 
               value="<?= $data['NamaIbadah']; ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Tanggal</label>
        <input type="date" name="Tanggal" class="form-control"
               value="<?= $data['Tanggal']; ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Waktu</label>
        <input type="time" name="Waktu" class="form-control"
               value="<?= $data['Waktu']; ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Lokasi</label>
        <input type="text" name="Lokasi" class="form-control"
               value="<?= $data['Lokasi']; ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Pembicara</label>
        <input type="text" name="Pembicara" class="form-control"
               value="<?= $data['Pembicara']; ?>" required>
    </div>

    <button type="submit" class="btn btn-dark">Update</button>
    <a href="?url=admin/jadwal_ibadah" class="btn btn-secondary">Batal</a>
    

</form>

<?php include __DIR__ . '/../../layout/footer.php'; ?>
