<?php

class pelanggan_model
{
    private $table = 'pelanggan'; // tabel yang digunakan
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPelanggan()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPelangganById($idPelanggan)
    {
        $this->db->query('SELECT * FROM pelanggan WHERE idPelanggan =:idPelanggan');
        $this->db->bind('idPelanggan', $idPelanggan);
        return $this->db->single();
    }

    public function tambahDataPelanggan($data)
    {
        $query = "INSERT INTO pelanggan VALUES (0, :nama, :alamat, :noHP, :email) ";

        $this->db->query($query);

        $this->db->bind('nama', $data['nama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('noHP', $data['noHP']);
        $this->db->bind('email', $data['email']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataPelanggan($data)
    {
        $query = "UPDATE pelanggan SET 
        nama = :nama,
        alamat = :alamat,
        noHP = :noHP,
        email = :email
        WHERE idPelanggan = :idPelanggan";

        $this->db->query($query);

        $this->db->bind('nama', $data['nama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('noHP', $data['noHP']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('idPelanggan', $data['idPelanggan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataPelanggan($idPelanggan)
    {
        $query = "DELETE FROM pelanggan WHERE idPelanggan = :idPelanggan";
        $this->db->query($query);
        $this->db->bind('idPelanggan', $idPelanggan);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
