<?php include __DIR__ . '/../../layout/header.php'; ?>

<h3 class="mb-4">Daftar Jadwal Ibadah</h3>

<?php if ($_SESSION['role'] === 'Pembina'): ?>
    <a href="?url=JadwalIbadah/create" class="btn btn-dark mb-3">
        + Tambah Jadwal
    </a>
<?php endif; ?>

<!-- ✅ WAJIB: TABLE RESPONSIVE -->
<div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark text-center">
            <tr>
                <th>No</th>
                <th>Nama Ibadah</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Lokasi</th>
                <th>Pembicara</th>

                <?php if ($_SESSION['role'] === 'Pembina'): ?>
                    <th width="150">Aksi</th>
                <?php endif; ?>
            </tr>
        </thead>

        <tbody>
            <?php $no = 1; foreach ($data as $row): ?>
            <tr>
                <td class="text-center"><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['NamaIbadah']); ?></td>
                <td><?= htmlspecialchars($row['Tanggal']); ?></td>
                <td><?= htmlspecialchars($row['Waktu']); ?></td>
                <td><?= htmlspecialchars($row['Lokasi']); ?></td>
                <td><?= htmlspecialchars($row['Pembicara']); ?></td>

                <?php if ($_SESSION['role'] === 'Pembina'): ?>
                <td class="text-center">
                    <a href="?url=JadwalIbadah/edit/<?= $row['jadwalIbadahId']; ?>"
                       class="btn btn-sm btn-primary mb-1">
                        Edit
                    </a>

                    <a href="?url=JadwalIbadah/delete/<?= $row['jadwalIbadahId']; ?>"
                       class="btn btn-sm btn-danger mb-1"
                       onclick="return confirm('Yakin hapus data ini?')">
                        Hapus
                    </a>
                </td>
                <?php endif; ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include __DIR__ . '/../../layout/footer.php'; ?>
