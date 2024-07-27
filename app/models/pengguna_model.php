<?php

class pengguna_model
{
    private $table = 'pengguna'; // tabel yang digunakan
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function getAllPengguna()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPenggunaById($idPengguna)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' JOIN hak_akses ON hak_akses.idAkses = pengguna.idAkses WHERE idPengguna =:idPengguna');
        $this->db->bind('idPengguna', $idPengguna);
        return $this->db->single();
    }

    public function tambahDataPengguna($data)
    {
        $query = "INSERT INTO pengguna VALUES (0, :namaPengguna, :password, :namaDepan, :namaBelakang, :noHP, :alamat, :idAkses) ";

        $this->db->query($query);

        $this->db->bind('namaPengguna', $data['namaPengguna']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('namaDepan', $data['namaDepan']);
        $this->db->bind('namaBelakang', $data['namaBelakang']);
        $this->db->bind('noHP', $data['noHP']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('idAkses', $data['idAkses']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataPengguna($data)
    {
        $query = "UPDATE pengguna SET 
        namaPengguna = :namaPengguna,
        password = :password,
        namaDepan = :namaDepan,
        namaBelakang = :namaBelakang,
        noHP = :noHP,
        alamat = :alamat,
        idAkses = :idAkses
        WHERE idPengguna = :idPengguna";

        $this->db->query($query);

        $this->db->bind('namaPengguna', $data['namaPengguna']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('namaDepan', $data['namaDepan']);
        $this->db->bind('namaBelakang', $data['namaBelakang']);
        $this->db->bind('noHP', $data['noHP']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('idAkses', $data['idAkses']);
        $this->db->bind('idPengguna', $data['idPengguna']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataPengguna($idPengguna)
    {
        $query = "DELETE FROM pengguna WHERE idPengguna = :idPengguna";
        $this->db->query($query);
        $this->db->bind('idPengguna', $idPengguna);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
