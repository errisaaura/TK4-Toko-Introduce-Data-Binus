<?php

class barang_model
{
    private $table = 'barang'; // tabel yang digunakan
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllBarang()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getBarangById($idBarang)
    {
        $this->db->query('SELECT * FROM barang JOIN pengguna on pengguna.idPengguna = barang.idPengguna WHERE idBarang =:idBarang');
        $this->db->bind('idBarang', $idBarang);
        return $this->db->single();
    }

    public function tambahDataBarang($data)
    {
        $query = "INSERT INTO barang VALUES (0, :namaBarang, :keterangan, :satuan, :idPengguna) ";

        $this->db->query($query);

        $this->db->bind('namaBarang', $data['namaBarang']);
        $this->db->bind('keterangan', $data['keterangan']);
        $this->db->bind('satuan', $data['satuan']);
        $this->db->bind('idPengguna', $data['idPengguna']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataBarang($data)
    {
        $query = "UPDATE barang SET 
        namaBarang = :namaBarang,
        keterangan = :keterangan,
        satuan = :satuan,
        idPengguna = :idPengguna
        WHERE idBarang = :idBarang";

        $this->db->query($query);

        $this->db->bind('namaBarang', $data['namaBarang']);
        $this->db->bind('keterangan', $data['keterangan']);
        $this->db->bind('satuan', $data['satuan']);
        $this->db->bind('idPengguna', $data['idPengguna']);
        $this->db->bind('idBarang', $data['idBarang']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataBarang($idBarang)
    {
        $query = "DELETE FROM barang WHERE idBarang = :idBarang";
        $this->db->query($query);
        $this->db->bind('idBarang', $idBarang);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
