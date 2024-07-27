<?php

class role_model
{
    private $table = 'hak_akses'; // tabel yang digunakan
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function getAllRole()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getRoleById($idAkses)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE idAkses =:idAkses');
        $this->db->bind('idAkses', $idAkses);
        return $this->db->single();
    }

    public function tambahDataRole($data)
    {
        $query = "INSERT INTO hak_akses VALUES (0, :namaAkses, :keterangan) ";

        $this->db->query($query);

        $this->db->bind('namaAkses', $data['namaAkses']);
        $this->db->bind('keterangan', $data['keterangan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataRole($data)
    {
        $query = "UPDATE hak_akses SET 
        namaAkses = :namaAkses,
        keterangan = :keterangan
        WHERE idAkses = :idAkses";

        $this->db->query($query);

        $this->db->bind('namaAkses', $data['namaAkses']);
        $this->db->bind('keterangan', $data['keterangan']);
        $this->db->bind('idAkses', $data['idAkses']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataRole($idAkses)
    {
        $query = "DELETE FROM hak_akses WHERE idAkses = :idAkses";
        $this->db->query($query);
        $this->db->bind('idAkses', $idAkses);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
