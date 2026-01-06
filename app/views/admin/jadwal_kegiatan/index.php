<?php include __DIR__ . '/../../layout/header.php'; ?>

<h3 class="mb-4">Daftar Jadwal Kegiatan Pemuda</h3>

<a href="?url=JadwalKegiatan/create" class="btn btn-dark mb-3">
    + Tambah Kegiatan
</a>

<!-- ✅ WAJIB: TABLE RESPONSIVE -->
<div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark text-center">
            <tr>
                <th>No</th>
                <th>Nama Kegiatan</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Lokasi</th>
                <th>Validasi</th>
                <th>Status</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>

        <tbody>
        <?php if (empty($data)): ?>
            <tr>
                <td colspan="8" class="text-center">
                    Belum ada data kegiatan
                </td>
            </tr>
        <?php else: ?>
            <?php $no = 1; foreach ($data as $row): ?>
            <tr>
                <td class="text-center"><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['namaKegiatan']); ?></td>
                <td><?= htmlspecialchars($row['tanggal']); ?></td>
                <td><?= htmlspecialchars($row['waktu']); ?></td>
                <td><?= htmlspecialchars($row['lokasi']); ?></td>

                <td class="text-center">
                    <span class="badge bg-<?= $row['validasi'] === 'setuju' ? 'success' : 'secondary'; ?>">
                        <?= ucfirst($row['validasi']); ?>
                    </span>
                </td>

                <td class="text-center">
                    <span class="badge bg-info text-dark">
                        <?= ucfirst($row['status']); ?>
                    </span>
                </td>

                <td class="text-center">
                    <a href="?url=JadwalKegiatan/edit/<?= $row['KegiatanID']; ?>"
                       class="btn btn-sm btn-primary mb-1">
                        Edit
                    </a>

                    <?php if ($_SESSION['role'] === 'Pembina'): ?>
                    <a href="?url=JadwalKegiatan/delete/<?= $row['KegiatanID']; ?>"
                       class="btn btn-sm btn-danger mb-1"
                       onclick="return confirm('Yakin hapus data ini?');">
                        Hapus
                    </a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include __DIR__ . '/../../layout/footer.php'; ?>
                        