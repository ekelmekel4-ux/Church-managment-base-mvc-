<?php

class JadwalIbadah {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function all() {
    $result = $this->db->query("SELECT * FROM jadwalibadah ORDER BY tanggal ASC");
    return $result->fetch_all(MYSQLI_ASSOC); // FIX
}

    public function find($id) {
        return $this->db->query("SELECT * FROM jadwalibadah WHERE jadwalIbadahId = $id")->fetch_assoc();
    }

    public function create($data) {
        $userId = $_SESSION['userId'] ?? 1;
        $nama   = $this->db->escape($data['NamaIbadah']);
        $tgl    = $this->db->escape($data['Tanggal']);
        $wkt    = $this->db->escape($data['Waktu']);
        $lokasi = $this->db->escape($data['Lokasi']);
        $pmb    = $this->db->escape($data['Pembicara']);

        return $this->db->query("
            INSERT INTO jadwalibadah (userId, NamaIbadah, Tanggal, Waktu, Lokasi, Pembicara)
            VALUES ($userId, '$nama', '$tgl', '$wkt', '$lokasi', '$pmb')
        ");
    }

    public function update($id, $data) {
        $nama   = $this->db->escape($data['NamaIbadah']);
        $tgl    = $this->db->escape($data['Tanggal']);
        $wkt    = $this->db->escape($data['Waktu']);
        $lokasi = $this->db->escape($data['Lokasi']);
        $pmb    = $this->db->escape($data['Pembicara']);

        return $this->db->query("
            UPDATE jadwalibadah SET
                NamaIbadah='$nama',
                Tanggal='$tgl',
                Waktu='$wkt',
                Lokasi='$lokasi',
                Pembicara='$pmb'
            WHERE jadwalIbadahId = $id
        ");
    }

    public function delete($id) {
        return $this->db->query("DELETE FROM jadwalibadah WHERE jadwalIbadahId = $id");
    }
}
