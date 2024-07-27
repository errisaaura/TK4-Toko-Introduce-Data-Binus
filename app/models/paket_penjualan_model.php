<?php

class paket_penjualan_model
{
    private $table = 'paket_penjualan'; // tabel yang digunakan
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPaketPenjualan()
    {
        $this->db->query(
            "SELECT
                pp.id_paket,
                pp.nama_paket,
                pp.harga_paket,
                GROUP_CONCAT(b.namaBarang ORDER BY b.idBarang) AS namaBarang,
                SUM(pb.jumlah) AS total_jumlah,
                SUM(
                    (SELECT SUM(jumlahPenjualan) FROM penjualan WHERE idBarang = b.idBarang)
                ) AS total_penjualan
            FROM
                paket_penjualan pp
            JOIN
                paket_barang pb ON pp.id_paket = pb.id_paket
            JOIN
                barang b ON pb.id_barang = b.idBarang
            GROUP BY
                pp.id_paket, pp.nama_paket, pp.harga_paket
            ORDER BY
                pp.id_paket;"
        );
        return $this->db->resultSet();
    }


    // public function getAllPaketPenjualan()
    // {
    //     $this->db->query('SELECT * FROM ' . $this->table);
    //     return $this->db->resultSet();
    // }

    // public function getPaketPenjualanById($idPaketPenjualan)
    // {
    //     $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_paket = :id_paket');
    //     $this->db->bind('id_paket', $idPaketPenjualan);
    //     return $this->db->single();
    // }

    // public function tambahDataPaketPenjualan($data)
    // {
    //     $query = "INSERT INTO paket_penjualan VALUES (0, :nama_paket, :harga_paket) ";

    //     $this->db->query($query);

    //     $this->db->bind('nama_paket', $data['nama_paket']);
    //     $this->db->bind('harga_paket', $data['harga_paket']);

    //     $this->db->execute();

    //     return $this->db->rowCount();
    // }

    // public function updateDataPaketPenjualan($data)
    // {
    //     $query = "UPDATE paket_penjualan SET 
    //     nama_paket = :nama_paket,
    //     harga_paket = :harga_paket
    //     WHERE id_paket = :id_paket";

    //     $this->db->query($query);

    //     $this->db->bind('nama_paket', $data['nama_paket']);
    //     $this->db->bind('harga_paket', $data['harga_paket']);
    //     $this->db->bind('id_paket', $data['id_paket']);

    //     $this->db->execute();

    //     return $this->db->rowCount();
    // }

    // public function hapusDataPaketPenjualan($idPaketPenjualan)
    // {
    //     $query = "DELETE FROM paket_penjualan WHERE id_paket = :id_paket";
    //     $this->db->query($query);
    //     $this->db->bind('id_paket', $idPaketPenjualan);

    //     $this->db->execute();

    //     return $this->db->rowCount();
    // }
}
