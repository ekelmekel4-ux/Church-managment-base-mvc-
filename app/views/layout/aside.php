<?php
// WAJIB: pertahankan url
$currentUrl = $_GET['url'] ?? 'Home/index';
?>

<div class="col-md-3">
    <div class="list-group">

        <a href="?url=<?= $currentUrl ?>&info=about" class="list-group-item">About</a>
        <a href="?url=<?= $currentUrl ?>&info=informasi" class="list-group-item">Informasi</a>
        <a href="?url=<?= $currentUrl ?>&info=pengumuman" class="list-group-item">Pengumuman</a>
        <a href="?url=<?= $currentUrl ?>&info=jadwal" class="list-group-item">Jadwal Ibadah</a>
        <a href="?url=<?= $currentUrl ?>&info=kegiatan" class="list-group-item">Kegiatan Pemuda</a>
        <a href="?url=<?= $currentUrl ?>&info=Data_Anggota" class="list-group-item">Data anggota</a>

    </div>
</div>
