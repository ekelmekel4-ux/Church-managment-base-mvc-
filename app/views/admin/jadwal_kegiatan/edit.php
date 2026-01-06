<?php include __DIR__ . '/../../layout/header.php'; ?>

<h3 class="mb-4">Edit Jadwal Kegiatan</h3>

<?php if (!empty($error)): ?>
    <div class="alert alert-danger"><?= $error; ?></div>
<?php endif; ?>

<form action="?url=JadwalKegiatan/edit/<?= $data['KegiatanID']; ?>" method="POST">

    <div class="mb-3">
        <label>Nama Kegiatan</label>
        <input type="text" name="namaKegiatan" class="form-control"
               value="<?= $data['namaKegiatan']; ?>" required>
    </div>

    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control"
               value="<?= $data['tanggal']; ?>" required>
    </div>

    <div class="mb-3">
        <label>Waktu</label>
        <input type="time" name="waktu" class="form-control"
               value="<?= $data['waktu']; ?>" required>
    </div>

    <div class="mb-3">
        <label>Lokasi</label>
        <input type="text" name="lokasi" class="form-control"
               value="<?= $data['lokasi']; ?>" required>
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control"
                  rows="3" required><?= $data['deskripsi']; ?></textarea>
    </div>

    <!-- VALIDASI -->
     <?php if ($_SESSION['role'] === 'Pembina'): ?>
    <div class="mb-3">
        <label>Validasi Pembina</label>
        <select name="validasi" class="form-select" required>
            <option value="tidak setuju"
                <?= $data['validasi']=='tidak setuju'?'selected':''; ?>>
                Tidak Setuju
            </option>
            <option value="setuju"
                <?= $data['validasi']=='setuju'?'selected':''; ?>>
                Setuju
            </option>
        </select>
    </div>
    <?php endif; ?>

    <!-- STATUS -->
     <?php if ($_SESSION['role'] === 'Pembina'): ?>
    <div class="mb-3">
        <label>Status Kegiatan</label>
        <select name="status" class="form-select" required>
            <option value="pending"
                <?= $data['status']=='pending'?'selected':''; ?>>
                Pending
            </option>
            <option value="aktif"
                <?= $data['status']=='aktif'?'selected':''; ?>>
                Aktif
            </option>
            <option value="selesai"
                <?= $data['status']=='selesai'?'selected':''; ?>>
                Selesai
            </option>
        </select>
    </div>
    <?php endif; ?>

    <button type="submit" class="btn btn-dark">Update</button>
    <a href="?url=admin/jadwal_kegiatan" class="btn btn-secondary">Batal</a>

</form>

<?php include __DIR__ . '/../../layout/footer.php'; ?>
