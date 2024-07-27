<?php

class supplier_model
{
    private $table = 'supplier'; // tabel yang digunakan
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllSupplier()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getSupplierById($idSupplier)
    {
        $this->db->query('SELECT * FROM supplier WHERE idSupplier =:idSupplier');
        $this->db->bind('idSupplier', $idSupplier);
        return $this->db->single();
    }

    public function tambahDataSupplier($data)
    {
        $query = "INSERT INTO supplier VALUES (0, :nama, :alamat, :noHP, :email) ";

        $this->db->query($query);

        $this->db->bind('nama', $data['nama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('noHP', $data['noHP']);
        $this->db->bind('email', $data['email']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataSupplier($data)
    {
        $query = "UPDATE supplier SET 
        nama = :nama,
        alamat = :alamat,
        noHP = :noHP,
        email = :email
        WHERE idSupplier = :idSupplier";

        $this->db->query($query);

        $this->db->bind('nama', $data['nama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('noHP', $data['noHP']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('idSupplier', $data['idSupplier']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataSupplier($idSupplier)
    {
        $query = "DELETE FROM supplier WHERE idSupplier = :idSupplier";
        $this->db->query($query);
        $this->db->bind('idSupplier', $idSupplier);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
