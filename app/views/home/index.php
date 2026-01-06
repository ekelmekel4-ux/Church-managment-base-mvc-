<?php include __DIR__ . '/../layout/header.php'; ?>

<?php
// ================== LOGIC ASIDE ==================
$info = $_GET['info'] ?? 'about';

if ($info === 'jadwal') {

    // 🔹 Jadwal Ibadah
    $query = $GLOBALS['db']->query(
        "SELECT * FROM jadwalibadah ORDER BY Tanggal ASC"
    );

} elseif ($info === 'kegiatan') {

    // 🔹 Kegiatan Pemuda
    $query = $GLOBALS['db']->query(
        "SELECT * FROM jadwalkegiatanpemuda ORDER BY tanggal ASC"
    );

} elseif ($info === 'Data_Anggota') {

    // 🔹 Data Anggota
    $query = $GLOBALS['db']->query(
        "SELECT userId, username, nama_lengkap, role, status_aktif 
         FROM actor 
         ORDER BY userId DESC"
    );

} else {

    // 🔹 Aside default (about, informasi, pengumuman)
    $query = $GLOBALS['db']->query(
        "SELECT * FROM aside WHERE tipe='$info'"
    );
}

$data = $query ? $query->fetch_all(MYSQLI_ASSOC) : [];
?>

<div class="alert alert-primary">
    🙌 Selamat datang <b><?= $_SESSION['username']; ?></b>,  
    Tuhan memberkati pelayananmu hari ini.
</div>

<div class="row">

    <!-- ASIDE -->
    <?php include __DIR__ . '/../layout/aside.php'; ?>

    <!-- CONTENT -->
    <div class="col-md-9">

        <!-- ================= JADWAL IBADAH ================= -->
        <?php if ($info === 'jadwal'): ?>
            <h4>Jadwal Ibadah</h4>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama Ibadah</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Lokasi</th>
                        <th>Pembicara</th>
                    </tr>

                    <?php foreach ($data as $d): ?>
                    <tr>
                        <td><?= $d['NamaIbadah']; ?></td>
                        <td><?= $d['Tanggal']; ?></td>
                        <td><?= $d['Waktu']; ?></td>
                        <td><?= $d['Lokasi']; ?></td>
                        <td><?= $d['Pembicara']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>

        <!-- ================= KEGIATAN PEMUDA ================= -->
        <?php elseif ($info === 'kegiatan'): ?>
            <h4>Kegiatan Pemuda</h4>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama Kegiatan</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                    </tr>

                    <?php foreach ($data as $d): ?>
                    <tr>
                        <td><?= $d['namaKegiatan']; ?></td>
                        <td><?= $d['tanggal']; ?></td>
                        <td><?= $d['waktu']; ?></td>
                        <td><?= $d['lokasi']; ?></td>
                        <td><?= $d['status']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>

        <!-- ================= DATA ANGGOTA ================= -->
        <?php elseif ($info === 'Data_Anggota'): ?>
            <h4>Data Anggota</h4>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Role</th>
                        <th>Status</th>
                    </tr>

                    <?php $no = 1; foreach ($data as $d): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d['username']; ?></td>
                        <td><?= $d['nama_lengkap']; ?></td>
                        <td><?= $d['role']; ?></td>
                        <td><?= $d['status_aktif']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>

        <!-- ================= ASIDE INFO ================= -->
        <?php else: ?>
            <h4><?= ucfirst($info); ?></h4>

            <?php if (empty($data)): ?>
                <div class="alert alert-secondary">
                    Belum ada data.
                </div>
            <?php endif; ?>

            <?php foreach ($data as $d): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h6><?= $d['judul']; ?></h6>
                        <p><?= nl2br($d['isi']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>

        <?php endif; ?>

    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
