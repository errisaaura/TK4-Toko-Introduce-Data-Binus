<?php

class dashboard_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAnalytic()
    {
        $this->db->query(
            "SELECT 
                TotalPenjualan.idBarang,
                barang.namaBarang,
                TotalPenjualan.TotalPenjualan, 
                TotalPembelian.TotalPembelian, 
                TotalPenjualan.TotalPenjualan - TotalPembelian.TotalPembelian AS Selisih, 
                CASE
                    WHEN TotalPenjualan.TotalPenjualan - TotalPembelian.TotalPembelian > 0 THEN 'Untung'
                    WHEN TotalPenjualan.TotalPenjualan - TotalPembelian.TotalPembelian < 0 THEN 'Rugi'
                    WHEN TotalPenjualan.TotalPenjualan - TotalPembelian.TotalPembelian = 0 THEN 'Balik Modal'
                END AS Status
            FROM (
                SELECT idBarang, SUM(jumlahPenjualan * hargaJual) AS TotalPenjualan
                FROM penjualan
                GROUP BY idBarang
            ) TotalPenjualan
            LEFT JOIN (
                SELECT idBarang, SUM(jumlahPembelian * hargaBeli) AS TotalPembelian
                FROM pembelian
                GROUP BY idBarang
            ) TotalPembelian ON TotalPenjualan.idBarang = TotalPembelian.idBarang
            LEFT JOIN barang ON barang.idBarang = TotalPenjualan.idBarang;"
        );
        return $this->db->resultSet();
    }

    public function getProductCombination()
    {
        $this->db->query(
            "SELECT 
                Penjualan.idBarang,
                namaBarang,
                hargaJual - hargaBeli AS Keuntungan
            FROM (
                SELECT idPengguna AS idBarang, MAX(hargaJual) AS hargaJual
                FROM penjualan
                GROUP BY idPengguna
            ) Penjualan LEFT JOIN (
                SELECT idPengguna AS idBarang, MAX(hargaBeli) AS hargaBeli
                FROM pembelian
                GROUP BY idPengguna
            ) Pembelian ON Penjualan.idBarang = Pembelian.idBarang
            LEFT JOIN barang ON barang.idBarang = Pembelian.idBarang
            WHERE hargaJual - hargaBeli > 0"
        );
        $result = $this->db->resultSet();

        $combinations = [];
        for ($i = 0; $i < count($result); $i++) {
            for ($j = 2; $j <= count($result); $j++) {
                if ($i + $j > count($result)) continue;

                $products = array_slice($result, $i, $j);
                $profit = array_sum(
                    array_map(function ($product) {
                        return $product["Keuntungan"];
                    }, $products)
                );
                array_push($combinations, ["products" => $products, "profit" => $profit]);
            }
        }

        return $combinations;
    }
}
