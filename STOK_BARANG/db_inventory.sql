-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2019 at 09:24 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode` char(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `h_jual_brg` double NOT NULL,
  `stok_brg` int(11) NOT NULL,
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode`, `nama`, `id_kategori`, `h_jual_brg`, `stok_brg`, `foto`) VALUES
(1, '01-1', 'Beras', 1, 12000, 20, 'beras.jpg'),
(2, '01-2', 'Telur', 1, 20000, 10, 'telur.jpg'),
(3, '01-3', 'Gula', 1, 10000, 10, 'gula.jpg'),
(4, '01-4', 'Garam', 1, 4000, 10, 'garam.jpg'),
(5, '01-5', 'Lada', 1, 5000, 5, 'lada.jpg'),
(6, '01-6', 'Cabai', 1, 25000, 15, 'cabe.jpeg'),
(7, '01-7', 'Gula Merah', 1, 6000, 5, 'gula_merah.jpg'),
(8, '02-1', 'Sabun Mandi', 2, 5000, 15, 'sabun_mandi.jpg'),
(9, '02-2', 'Odol', 2, 8000, 15, 'odol.jpg'),
(10, '02-3', 'Sikat Gigi', 2, 6000, 5, 'sikat_gigi.jpg'),
(11, '02-04', 'Sabun Muka', 2, 25000, 8, 'sabun_muka.jpg'),
(12, '02-5', 'Shampo', 2, 13000, 6, 'shampo.jpg'),
(13, '02-6', 'Conditioner', 2, 22000, 14, 'conditioner.jpg'),
(14, '02-7', 'Sabun Cuci Tangan', 2, 7000, 13, 'sabun_cuci_tangan.jpg'),
(15, '03-1', 'Pensil', 3, 2000, 20, 'pensil.jpg'),
(16, '03-2', 'Pulpen', 3, 4000, 11, 'pulpen.jpg'),
(17, '03-3', 'Penghapus', 3, 3000, 15, 'penghapus.jpg'),
(18, '03-4', 'Tipe-X', 3, 4000, 16, 'tipe-x.jpg'),
(19, '03-5', 'Spidol', 3, 5000, 14, 'spidol.jpg'),
(20, '03-6', 'Penggaris', 3, 6000, 6, 'penggaris.jpg'),
(21, '03-7', 'Stabilo', 3, 6000, 13, 'stabilo.jpg'),
(22, '04-1', 'Handphone', 4, 2500000, 5, 'handphone.jpg'),
(23, '04-2', 'Laptop', 4, 4000000, 2, 'laptop.jpg'),
(24, '04-3', 'Calculator', 4, 50000, 5, 'calculator.jpg'),
(25, '04-4', 'Speaker', 4, 500000, 3, 'speaker.jpg'),
(26, '04-5', 'Mouse', 4, 500000, 2, 'mouse.jpg'),
(27, '04-6', 'Keyboard', 4, 600000, 3, 'keyboard.jpg'),
(28, '04-7', 'Televisi', 4, 4000000, 1, 'tv.jpg'),
(29, '05-1', 'Baju', 5, 200000, 3, 'baju.jpg'),
(30, '05-2', 'Celana', 5, 300000, 3, 'celana.jpg'),
(31, '05-3', 'Kaos Kaki', 5, 50000, 3, 'kaos_kaki.jpg'),
(32, '05-4', 'Sepatu', 5, 250000, 3, 'sepatu.jpg'),
(33, '05-5', 'Topi', 5, 100000, 3, 'topi.jpg'),
(34, '05-6', 'Rok', 5, 200000, 3, 'rok.jpg'),
(35, '05-7', 'Jaket', 5, 350000, 3, 'jaket.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(4, 'Alat Elektronik'),
(2, 'Alat Mandi'),
(3, 'Alat Tulis'),
(1, 'Bahan Pokok'),
(5, 'Pakaian');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `id_splr` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `tgl_beli` date NOT NULL,
  `jml_beli` int(11) NOT NULL,
  `h_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama_splr` varchar(30) NOT NULL,
  `alamat_splr` text NOT NULL,
  `tlp_splr` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama_splr`, `alamat_splr`, `tlp_splr`) VALUES
(1, 'Toko Makmur', 'Bekasi', '081111111'),
(2, 'Toko Maju Jaya', 'Bekasi', '081111112'),
(3, 'Toko Pelita Jaya', 'Tambun', '081111113'),
(4, 'Toko Sentosa', 'Tambun', '081111114'),
(5, 'Toko Perkasa', 'Jakarta', '081111115');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_UNIQUE` (`nama`),
  ADD UNIQUE KEY `kode_UNIQUE` (`kode`),
  ADD KEY `fk_barang_kategori1_idx` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_kategori_UNIQUE` (`nama`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Pembelian_barang1_idx` (`id_brg`),
  ADD KEY `fk_Pembelian_supplier1_idx` (`id_splr`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tlp_splr_UNIQUE` (`tlp_splr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_barang_kategori1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `fk_Pembelian_barang1` FOREIGN KEY (`id_brg`) REFERENCES `barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pembelian_supplier1` FOREIGN KEY (`id_splr`) REFERENCES `supplier` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
