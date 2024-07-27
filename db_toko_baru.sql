-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2024 at 02:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `idBarang` int(255) NOT NULL,
  `namaBarang` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `idPengguna` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idBarang`, `namaBarang`, `keterangan`, `satuan`, `idPengguna`) VALUES
(1, 'Buku', 'Buku tulis', 'pcs', 23),
(2, 'Permen', 'Permen Yupi', 'pcs', 24),
(3, 'Tas', 'Tas Sekolah', 'pcs', 25),
(4, 'Sepatu', 'Sepatu untuk pergi', 'pasang', 26),
(5, 'Tumbler', 'Tempat Minum kalau Sekolah', 'pcs', 27),
(6, 'Garam', 'Bumbu Dapur', 'pcs', 28),
(7, 'Chiki', 'Camilan', 'bungkus', 29),
(8, 'Sabun', 'Sabun Mandi', 'pcs', 30),
(9, 'Kacang Kulit', 'Camilan', 'bungkus', 31),
(10, 'Roti', 'Bahan Pokok', 'pcs', 32);

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `idAkses` int(255) NOT NULL,
  `namaAkses` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`idAkses`, `namaAkses`, `keterangan`) VALUES
(1, 'Admin', 'Memiliki akses penuh ke semua fitur dan pengaturan'),
(2, 'Kasir', 'Memiliki akses untuk mengelola transaksi penjualan dan kasir'),
(3, 'Pelanggan', 'Memiliki akses untuk melihat dan membeli produk');

-- --------------------------------------------------------

--
-- Table structure for table `paket_barang`
--

CREATE TABLE `paket_barang` (
  `id_paket_barang` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_barang` int(255) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paket_barang`
--

INSERT INTO `paket_barang` (`id_paket_barang`, `id_paket`, `id_barang`, `jumlah`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 5),
(3, 2, 1, 3),
(4, 2, 2, 7),
(5, 2, 3, 1),
(6, 3, 1, 4),
(7, 3, 2, 10),
(8, 3, 3, 1),
(9, 3, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `paket_penjualan`
--

CREATE TABLE `paket_penjualan` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(255) NOT NULL,
  `harga_paket` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paket_penjualan`
--

INSERT INTO `paket_penjualan` (`id_paket`, `nama_paket`, `harga_paket`) VALUES
(1, 'Paket Hemat', 50000.00),
(2, 'Paket Standar', 75000.00),
(3, 'Paket Premium', 100000.00);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `idPelanggan` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `noHP` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`idPelanggan`, `nama`, `alamat`, `noHP`, `email`) VALUES
(1, 'Budi Santoso', 'Jl. Merdeka No. 10, Jakarta', '081234567827', 'budi.santoso@example.com'),
(2, 'siti rahayu', 'Jl. Pahlawan 25, Surabaya', '087654321928', 'siti.rahayu@example.com'),
(3, 'ahmad hidayat', 'Jl. Sudirman 50, Bandung', '089876543229', 'ahmad.hidayat@example.com'),
(4, 'rina.wati', 'Jl. Diponegoro 75, Semarang', '082345678930', 'rina.wati@example.com'),
(5, 'doni.kusuma', 'Jl. Gajah Mada 100, Yogyakarta', '083456789031', 'doni.kusuma@example.com'),
(6, 'David Wilson', 'Jl. Kakak Tua No. 20', '081234567895', 'david.wilson@example.com'),
(7, 'eva.sari', 'Jl. Ahmad Yani 30, Medan', '084567890132', 'eva.sari@example.com'),
(8, 'Frank Lee', 'Jl. Camar No. 18', '081234567897', 'frank.lee@example.com'),
(9, 'Grace Hall', 'Jl. Merak No. 25', '081234567898', 'grace.hall@example.com'),
(10, 'Hannah Young', 'Jl. Bangau No. 2', '081234567899', 'hannah.young@example.com'),
(11, 'Ivy Green', 'Jl. Nuri No. 13', '081234567900', 'ivy.green@example.com'),
(12, 'dewi.lestari', 'Jl. Pemuda 80, Palembang', '086789012334', 'dewi.lestari@example.com'),
(13, 'Kara King', 'Jl. Trenggiling No. 11', '081234567902', 'kara.king@example.com'),
(14, 'Liam Scott', 'Jl. Jangkrik No. 6', '081234567903', 'liam.scott@example.com'),
(15, 'Mia Adams', 'Jl. Laron No. 3', '081234567904', 'mia.adams@example.com'),
(16, 'Noah Baker', 'Jl. Semut No. 9', '081234567905', 'noah.baker@example.com'),
(17, 'Olivia Martinez', 'Jl. Belalang No. 14', '081234567906', 'olivia.martinez@example.com'),
(18, 'Paul Gonzalez', 'Jl. Cacing No. 16', '081234567907', 'paul.gonzalez@example.com'),
(19, 'Quinn Rodriguez', 'Jl. Kecoa No. 17', '081234567908', 'quinn.rodriguez@example.com'),
(20, 'Rachel Perez', 'Jl. Kumbang No. 19', '081234567909', 'rachel.perez@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `idPembelian` int(255) NOT NULL,
  `jumlahPembelian` int(255) NOT NULL,
  `hargaBeli` int(11) NOT NULL,
  `idPengguna` int(11) NOT NULL,
  `idBarang` int(255) NOT NULL,
  `idSupplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`idPembelian`, `jumlahPembelian`, `hargaBeli`, `idPengguna`, `idBarang`, `idSupplier`) VALUES
(1, 10, 50000, 23, 1, 1),
(2, 5, 25000, 23, 1, 1),
(3, 5, 5000, 24, 2, 20),
(4, 6, 6000, 24, 2, 10),
(5, 3, 150000, 25, 3, 3),
(6, 2, 100000, 25, 3, 3),
(7, 4, 400000, 26, 4, 18),
(8, 5, 500000, 26, 4, 4),
(9, 10, 200000, 27, 5, 6),
(10, 3, 60000, 27, 5, 6),
(11, 7, 21000, 28, 6, 19),
(12, 20, 60000, 28, 6, 10),
(13, 10, 10000, 29, 7, 10),
(14, 20, 20000, 29, 7, 7),
(15, 10, 40000, 30, 8, 4),
(16, 2, 8000, 30, 8, 17),
(17, 2, 30000, 31, 9, 13),
(18, 3, 45000, 31, 9, 11),
(19, 4, 10000, 32, 10, 16),
(20, 2, 20000, 32, 10, 8);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `idPengguna` int(255) NOT NULL,
  `namaPengguna` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `namaDepan` varchar(255) NOT NULL,
  `namaBelakang` varchar(255) NOT NULL,
  `noHP` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `idAkses` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`idPengguna`, `namaPengguna`, `password`, `namaDepan`, `namaBelakang`, `noHP`, `alamat`, `idAkses`) VALUES
(23, 'user1', '7c6a180b36896a0a8c02787eeafb0e4c', 'John', 'Doe', '081234567890', '123 Main St, Jakarta', 1),
(24, 'user2', '6cb75f652a9b52798eb6cf2201057c73', 'Jane', 'Smith', '081234567891', '456 Oak St, Jakarta', 2),
(25, 'user3', '819b0643d6b89dc9b579fdfc9094f28e', 'Alice', 'Johnson', '081234567892', '789 Pine St, Bandung', 3),
(26, 'user4', '34cc93ece0ba9e3f6f235d4af979b16c', 'Bob', 'Brown', '081234567893', '101 Maple St, Surabaya', 1),
(27, 'user5', 'db0edd04aaac4506f7edab03ac855d56', 'Charlie', 'Davis', '081234567894', '202 Cedar St, Yogyakarta', 2),
(28, 'user6', '218dd27aebeccecae69ad8408d9a36bf', 'David', 'Wilson', '081234567895', '303 Birch St, Semarang', 3),
(29, 'user7', '00cdb7bb942cf6b290ceb97d6aca64a3', 'Eva', 'Taylor', '081234567896', '404 Elm St, Malang', 1),
(30, 'user8', 'b25ef06be3b6948c0bc431da46c2c738', 'Frank', 'Anderson', '081234567897', '505 Walnut St, Bali', 2),
(31, 'user9', '5d69dd95ac183c9643780ed7027d128a', 'Grace', 'Thomas', '081234567898', '606 Chestnut St, Medan', 3),
(32, 'user10', '87e897e3b54a405da144968b2ca19b45', 'Hannah', 'Jackson', '081234567899', '707 Willow St, Makassar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `idPenjualan` int(255) NOT NULL,
  `jumlahPenjualan` int(255) NOT NULL,
  `hargaJual` int(11) NOT NULL,
  `idPengguna` int(255) NOT NULL,
  `idBarang` int(255) NOT NULL,
  `idPelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`idPenjualan`, `jumlahPenjualan`, `hargaJual`, `idPengguna`, `idBarang`, `idPelanggan`) VALUES
(1, 2, 25000, 23, 1, 1),
(2, 1, 12500, 23, 1, 2),
(3, 3, 6000, 24, 2, 3),
(4, 2, 4000, 24, 2, 4),
(5, 1, 75000, 25, 3, 5),
(6, 1, 75000, 25, 3, 6),
(7, 1, 125000, 26, 4, 7),
(8, 1, 125000, 26, 4, 8),
(9, 2, 50000, 27, 5, 9),
(10, 3, 75000, 27, 5, 10),
(11, 2, 10000, 28, 6, 11),
(12, 2, 10000, 28, 6, 12),
(13, 3, 6000, 29, 7, 12),
(14, 5, 10000, 29, 7, 14),
(15, 2, 12000, 30, 8, 15),
(16, 3, 18000, 30, 8, 16),
(17, 2, 40000, 31, 9, 17),
(18, 1, 20000, 31, 10, 18),
(19, 1, 12000, 32, 10, 19),
(20, 2, 24000, 32, 10, 20);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `idSupplier` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `noHP` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`idSupplier`, `nama`, `alamat`, `noHP`, `email`) VALUES
(1, 'Supplier Buku', 'Jl. Merpati No. 10', '081234567890', 'supplyBuku@example.com'),
(2, 'Supplier Permen', 'Jl. Kenari No. 15', '081234567891', 'supplyPermen@example.com'),
(3, 'Tas', 'Jl. Elang No. 5', '081234567892', 'supplyTas@example.com'),
(4, 'Unilever', 'Jl. Rajawali No. 12', '081234567893', 'unilever@example.com'),
(5, 'Ultra', 'Jl. Pelikan No. 8', '081234567894', 'ultra@example.com'),
(6, 'Supplier Tumbler', 'Jl. Kakak Tua No. 20', '081234567895', 'supplyTumbler@example.com'),
(7, 'Momogi', 'Jl. Kenari No. 7', '081234567896', 'momogi@example.com'),
(8, 'Sari Roti', 'Jl. Camar No. 18', '081234567897', 'sariroti@example.com'),
(9, 'Supplier Makanan Kering', 'Jl. Merak No. 25', '081234567898', 'makanan@example.com'),
(10, 'OT Grup', 'Jl. Bangau No. 2', '081234567899', 'OT@example.com'),
(11, 'Cimory', 'Jl. Nuri No. 13', '081234567900', 'cimory@example.com'),
(12, 'Khong Guan', 'Jl. Puyuh No. 4', '081234567901', 'khongguan@example.com'),
(13, 'Nata De Coco', 'Jl. Trenggiling No. 11', '081234567902', 'nataCoco@example.com'),
(14, 'Indomilk', 'Jl. Jangkrik No. 6', '081234567903', 'indomilk@example.com'),
(15, 'Kanzler', 'Jl. Laron No. 3', '081234567904', 'kanzler@example.com'),
(16, 'Dea Bakery', 'Jl. Semut No. 9', '081234567905', 'deaBakery@example.com'),
(17, 'Shinzui', 'Jl. Belalang No. 14', '081234567906', 'shinzui@example.com'),
(18, 'Kalbe Farma', 'Jl. Cacing No. 16', '081234567907', 'kalbe@example.com'),
(19, 'Supplier Garam ', 'Jl. Kecoa No. 17', '081234567908', 'supplyGaram@example.com'),
(20, 'relaxa', 'Jl. Kumbang No. 19', '081234567909', 'relaxa@example.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idBarang`),
  ADD KEY `idPengguna` (`idPengguna`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`idAkses`);

--
-- Indexes for table `paket_barang`
--
ALTER TABLE `paket_barang`
  ADD PRIMARY KEY (`id_paket_barang`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `paket_penjualan`
--
ALTER TABLE `paket_penjualan`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idPelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`idPembelian`),
  ADD KEY `idSupplier` (`idSupplier`),
  ADD KEY `idBarang` (`idBarang`),
  ADD KEY `idPengguna` (`idPengguna`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idPengguna`),
  ADD KEY `idAkses` (`idAkses`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`idPenjualan`),
  ADD KEY `idPelanggan` (`idPelanggan`),
  ADD KEY `idBarang` (`idBarang`),
  ADD KEY `idPengguna` (`idPengguna`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`idSupplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `idBarang` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `idAkses` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `paket_barang`
--
ALTER TABLE `paket_barang`
  MODIFY `id_paket_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `paket_penjualan`
--
ALTER TABLE `paket_penjualan`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `idPelanggan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `idPembelian` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `idPengguna` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `idPenjualan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `idSupplier` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`idPengguna`) REFERENCES `pengguna` (`idPengguna`);

--
-- Constraints for table `paket_barang`
--
ALTER TABLE `paket_barang`
  ADD CONSTRAINT `paket_barang_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `paket_penjualan` (`id_paket`),
  ADD CONSTRAINT `paket_barang_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`idBarang`);

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`idBarang`) REFERENCES `barang` (`idBarang`),
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`idPengguna`) REFERENCES `pengguna` (`idPengguna`),
  ADD CONSTRAINT `pembelian_ibfk_3` FOREIGN KEY (`idSupplier`) REFERENCES `supplier` (`idSupplier`);

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`idAkses`) REFERENCES `hak_akses` (`idAkses`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`idBarang`) REFERENCES `barang` (`idBarang`),
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`idPengguna`) REFERENCES `pengguna` (`idPengguna`),
  ADD CONSTRAINT `penjualan_ibfk_3` FOREIGN KEY (`idPelanggan`) REFERENCES `pelanggan` (`idPelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
