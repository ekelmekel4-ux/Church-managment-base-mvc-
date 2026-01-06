<?php

class JadwalKegiatan {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    /* ===================== AMBIL DATA ===================== */

    public function all() {
        return $this->db
            ->query("SELECT * FROM jadwalkegiatanpemuda ORDER BY tanggal ASC")
            ->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id) {
        $id = (int)$id;
        return $this->db
            ->query("SELECT * FROM jadwalkegiatanpemuda WHERE KegiatanID = $id")
            ->fetch_assoc();
    }

    /* ===================== CREATE ===================== */
    // PEMUDA: TIDAK BOLEH SET VALIDASI & STATUS
    public function create($data) {

        $userId  = (int)$_SESSION['userId'];

        $nama    = $this->db->escape($data['namaKegiatan']);
        $tanggal = $this->db->escape($data['tanggal']);
        $waktu   = $this->db->escape($data['waktu']);
        $lokasi  = $this->db->escape($data['lokasi']);
        $desk    = $this->db->escape($data['deskripsi']);

        // ⛔ JANGAN SET validasi & status
        // BIARKAN DATABASE YANG ISI DEFAULT

        return $this->db->query("
            INSERT INTO jadwalkegiatanpemuda
            (userId, namaKegiatan, tanggal, waktu, lokasi, deskripsi)
            VALUES
            ($userId, '$nama', '$tanggal', '$waktu', '$lokasi', '$desk')
        ");
    }

    /* ===================== UPDATE DATA UTAMA ===================== */

    public function update($id, $data) {

        $id      = (int)$id;
        $nama    = $this->db->escape($data['namaKegiatan']);
        $tanggal = $this->db->escape($data['tanggal']);
        $waktu   = $this->db->escape($data['waktu']);
        $lokasi  = $this->db->escape($data['lokasi']);
        $desk    = $this->db->escape($data['deskripsi']);

        return $this->db->query("
            UPDATE jadwalkegiatanpemuda SET
                namaKegiatan = '$nama',
                tanggal      = '$tanggal',
                waktu        = '$waktu',
                lokasi       = '$lokasi',
                deskripsi    = '$desk'
            WHERE KegiatanID = $id
        ");
    }

    /* ===================== UPDATE VALIDASI & STATUS ===================== */
    // KHUSUS PEMBINA
    public function updateValidasiStatus($id, $validasi, $status) {

        $id = (int)$id;

        // ENUM SESUAI DATABASE
        $validasiAllowed = ['belum divalidasi', 'setuju', 'tidak setuju'];
        $statusAllowed   = ['pending', 'aktif', 'selesai'];

        if (!in_array($validasi, $validasiAllowed)) {
            $validasi = 'belum divalidasi';
        }

        if (!in_array($status, $statusAllowed)) {
            $status = 'pending';
        }

        return $this->db->query("
            UPDATE jadwalkegiatanpemuda
            SET validasi='$validasi', status='$status'
            WHERE KegiatanID=$id
        ");
    }

    /* ===================== DELETE ===================== */

    public function delete($id) {
        $id = (int)$id;
        return $this->db->query(
            "DELETE FROM jadwalkegiatanpemuda WHERE KegiatanID = $id"
        );
    }
}
