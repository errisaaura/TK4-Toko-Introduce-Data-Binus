<?php

class pembelian_model
{
    private $table = 'Pembelian'; // tabel yang digunakan
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPembelian()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPembelianById($idPembelian)
    {
        $this->db->query('SELECT * FROM pembelian JOIN pengguna on pengguna.idPengguna = pembelian.idPengguna JOIN barang on barang.idBarang = pembelian.idBarang JOIN supplier on supplier.idSupplier = pembelian.idSupplier WHERE idPembelian =:idPembelian');
        $this->db->bind('idPembelian', $idPembelian);
        return $this->db->single();
    }

    public function tambahDataPembelian($data)
    {
        $query = "INSERT INTO pembelian VALUES (0, :jumlahPembelian, :hargaBeli, :idPengguna, :idBarang, :idSupplier) ";

        $this->db->query($query);

        $this->db->bind('jumlahPembelian', $data['jumlahPembelian']);
        $this->db->bind('hargaBeli', $data['hargaBeli']);
        $this->db->bind('idPengguna', $data['idPengguna']);
        $this->db->bind('idBarang', $data['idBarang']);
        $this->db->bind('idSupplier', $data['idSupplier']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataPembelian($data)
    {
        $query = "UPDATE pembelian SET 
        jumlahPembelian = :jumlahPembelian,
        hargaBeli = :hargaBeli,
        idPengguna = :idPengguna,
        idBarang = :idBarang,
        idSupplier = :idSupplier
        WHERE idPembelian = :idPembelian";

        $this->db->query($query);

        $this->db->bind('jumlahPembelian', $data['jumlahPembelian']);
        $this->db->bind('hargaBeli', $data['hargaBeli']);
        $this->db->bind('idPengguna', $data['idPengguna']);
        $this->db->bind('idBarang', $data['idBarang']);
        $this->db->bind('idSupplier', $data['idSupplier']);
        $this->db->bind('idPembelian', $data['idPembelian']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataPembelian($idPembelian)
    {
        $query = "DELETE FROM pembelian WHERE idPembelian = :idPembelian";
        $this->db->query($query);
        $this->db->bind('idPembelian', $idPembelian);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
