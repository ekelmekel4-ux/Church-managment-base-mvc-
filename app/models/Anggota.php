<?php

class Anggota
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database->conn; // mysqli connection
    }

    // ===== GET ALL =====
    public function getAll()
    {
        $query = "SELECT * FROM actor ORDER BY userId DESC";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // ===== GET BY ID =====
    public function getById($id)
    {
        $query = "SELECT * FROM actor WHERE userId = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    // ===== INSERT =====
    public function insert($data)
    {
        $query = "INSERT INTO actor 
        (username, nama_lengkap, jenis_kelamin, tanggal_lahir, alamat, no_hp, email, password, role, status_aktif, tanggal_gabung)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($query);

        $stmt->bind_param(
            "sssssssssss",
            $data['username'],
            $data['nama_lengkap'],
            $data['jenis_kelamin'],
            $data['tanggal_lahir'],
            $data['alamat'],
            $data['no_hp'],
            $data['email'],
            $data['password'],
            $data['role'],
            $data['status_aktif'],
            $data['tanggal_gabung']
        );

        return $stmt->execute();
    }

    // ===== UPDATE =====
    public function update($id, $data)
    {
        if (!empty($data['password'])) {

            $query = "UPDATE actor SET
                username = ?,
                nama_lengkap = ?,
                jenis_kelamin = ?,
                tanggal_lahir = ?,
                alamat = ?,
                no_hp = ?,
                email = ?,
                password = ?,
                role = ?,
                status_aktif = ?,
                tanggal_gabung = ?
                WHERE userId = ?";

            $stmt = $this->db->prepare($query);

            $stmt->bind_param(
                "sssssssssssi",
                $data['username'],
                $data['nama_lengkap'],
                $data['jenis_kelamin'],
                $data['tanggal_lahir'],
                $data['alamat'],
                $data['no_hp'],
                $data['email'],
                $data['password'], // sudah hashed di controller
                $data['role'],
                $data['status_aktif'],
                $data['tanggal_gabung'],
                $id
            );

        } else {

            $query = "UPDATE actor SET
                username = ?,
                nama_lengkap = ?,
                jenis_kelamin = ?,
                tanggal_lahir = ?,
                alamat = ?,
                no_hp = ?,
                email = ?,
                role = ?,
                status_aktif = ?,
                tanggal_gabung = ?
                WHERE userId = ?";

            $stmt = $this->db->prepare($query);

            $stmt->bind_param(
                "ssssssssssi",
                $data['username'],
                $data['nama_lengkap'],
                $data['jenis_kelamin'],
                $data['tanggal_lahir'],
                $data['alamat'],
                $data['no_hp'],
                $data['email'],
                $data['role'],
                $data['status_aktif'],
                $data['tanggal_gabung'],
                $id
            );
        }

        return $stmt->execute();
    }

    // ===== DELETE =====
    public function delete($id)
    {
        $query = "DELETE FROM actor WHERE userId = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
