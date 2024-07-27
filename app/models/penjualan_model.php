<?php

class penjualan_model
{
    private $table = 'penjualan'; // tabel yang digunakan
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPenjualan()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPenjualanById($idPenjualan)
    {
        $this->db->query('SELECT * FROM penjualan JOIN pengguna on pengguna.idPengguna = penjualan.idPengguna JOIN barang on barang.idBarang = penjualan.idBarang JOIN pelanggan on pelanggan.idPelanggan = penjualan.idPelanggan  WHERE idPenjualan =:idPenjualan');
        $this->db->bind('idPenjualan', $idPenjualan);
        return $this->db->single();
    }

    public function tambahDataPenjualan($data)
    {
        $query = "INSERT INTO penjualan VALUES (0, :jumlahPenjualan, :hargaJual, :idPengguna, :idBarang, :idPelanggan) ";

        $this->db->query($query);

        $this->db->bind('jumlahPenjualan', $data['jumlahPenjualan']);
        $this->db->bind('hargaJual', $data['hargaJual']);
        $this->db->bind('idPengguna', $data['idPengguna']);
        $this->db->bind('idBarang', $data['idBarang']);
        $this->db->bind('idPelanggan', $data['idPelanggan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataPenjualan($data)
    {
        $query = "UPDATE penjualan SET 
        jumlahPenjualan = :jumlahPenjualan,
        hargaJual = :hargaJual,
        idPengguna = :idPengguna,
        idBarang = :idBarang,
        idPelanggan = :idPelanggan
        WHERE idPenjualan = :idPenjualan";

        $this->db->query($query);

        $this->db->bind('jumlahPenjualan', $data['jumlahPenjualan']);
        $this->db->bind('hargaJual', $data['hargaJual']);
        $this->db->bind('idPengguna', $data['idPengguna']);
        $this->db->bind('idBarang', $data['idBarang']);
        $this->db->bind('idPelanggan', $data['idPelanggan']);
        $this->db->bind('idPenjualan', $data['idPenjualan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataPenjualan($idPenjualan)
    {
        $query = "DELETE FROM penjualan WHERE idPenjualan = :idPenjualan";
        $this->db->query($query);
        $this->db->bind('idPenjualan', $idPenjualan);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
