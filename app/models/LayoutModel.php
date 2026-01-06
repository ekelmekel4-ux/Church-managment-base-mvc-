<?php

class LayoutModel {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    /* =========================
       MENU BERDASARKAN ROLE
    ========================= */
    public function getMenuByRole($role) {

        $role = $this->db->escape($role);

        $sql = "
            SELECT * FROM menu
            WHERE role = 'All' OR role = '$role'
            ORDER BY urutan ASC
        ";

        $result = $this->db->query($sql);

        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    /* =========================
       HEADER / FOOTER DARI DB
    ========================= */
    public function getLayout($posisi) {

        $posisi = $this->db->escape($posisi);

        $sql = "
            SELECT konten
            FROM layout
            WHERE posisi = '$posisi'
            LIMIT 1
        ";

        $result = $this->db->query($sql);

        if ($result && $row = $result->fetch_assoc()) {
            return $row['konten'];
        }

        return '';
    }

    
}
