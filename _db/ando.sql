-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 05, 2021 at 08:03 AM
-- Server version: 5.7.33
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ando`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kd_brg` varchar(10) NOT NULL,
  `nm_brg` varchar(20) DEFAULT NULL,
  `satuan` varchar(6) DEFAULT NULL,
  `pcs` int(5) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `gambar` text,
  `stok` int(4) DEFAULT NULL,
  `berat` int(125) NOT NULL DEFAULT '0' COMMENT 'satuan gram'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_brg`, `nm_brg`, `satuan`, `pcs`, `harga`, `gambar`, `stok`, `berat`) VALUES
('1-173.01', 'ANDO MOONBEAR HITAM', 'ball', 12, 10000, '21.JPG', 118, 700),
('1-173.02', 'HAWAII ABU', 'Ball', 12, 10000, '11.JPG', 118, 700),
('1-173.03', 'HAWAII GRAPE', 'Ball', 12, 10000, '12.JPG', 120, 700),
('1-173.04', 'HAWAII HIJAU', 'Ball', 12, 10000, '13.JPG', 120, 700),
('1-173.05', 'HAWAII HITAM', 'Ball', 12, 10000, '14.JPG', 120, 700),
('1-173.06', 'HAWAII KUNING', 'Ball', 12, 10000, '15.JPG', 120, 700),
('1-173.07', 'HAWAII MERAH', 'Ball', 12, 10000, '16.JPG', 120, 700),
('1-173.08', 'HAWAII ROYAL BLUE', 'Ball', 12, 10000, '17.JPG', 120, 700),
('1-173.09', 'NICE AQUA', 'Ball', 12, 10000, '18.JPG', 120, 700),
('1-173.10', 'NICE AVOCADO', 'Ball', 12, 10000, '19.JPG', 120, 700),
('1-173.11', 'NICE FUHCSIA', 'Ball', 12, 10000, '110.JPG', 120, 700),
('1-173.12', 'NICE HIJAU NEON', 'Ball', 12, 10000, '111.JPG', 120, 700),
('1-173.13', 'NICE R BLUE', 'Ball', 12, 10000, '112.JPG', 120, 700),
('1-173.14', 'NICE TOSKA', 'Ball', 12, 10000, '113.JPG', 120, 700),
('1-173.15', 'NICE UNGU', 'Ball', 12, 10000, '114.JPG', 120, 700),
('1-173.16', 'SG 225 NAVI', 'Ball', 12, 10000, '116.JPG', 120, 700),
('1-173.17', 'SG 225 NAVI 2', 'Ball', 12, 10000, '117.JPG', 120, 700),
('1-173.18', 'SG 257 HITAM', 'Ball', 12, 10000, '118.JPG', 120, 700),
('1-173.19', 'SG 257 PINK', 'Ball', 12, 10000, '119.JPG', 120, 700);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_order` int(5) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(13) DEFAULT NULL,
  `tgl_pesan` datetime DEFAULT NULL,
  `batas_bayar` datetime DEFAULT NULL,
  `status` enum('1','2','3') NOT NULL COMMENT '1: sedang diproses, 2: sudah dikirim, 3:batal',
  `no_pengiriman` varchar(125) DEFAULT NULL,
  `ekspedisi` varchar(125) DEFAULT NULL,
  `paket_ekspedisi` varchar(125) DEFAULT NULL,
  `berat_barang` int(125) DEFAULT NULL,
  `total_bayar` int(125) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_order`, `nama`, `alamat`, `telp`, `tgl_pesan`, `batas_bayar`, `status`, `no_pengiriman`, `ekspedisi`, `paket_ekspedisi`, `berat_barang`, `total_bayar`) VALUES
(19, 'Universitas Muhammdiyah Sidoar', 'Kendal Pecabean Rt 03 Rw 01 Candi', '6281111111111', '2021-11-05 14:38:06', '2021-12-05 14:38:06', '1', '281869392', 'tiki', 'ECO(4)', 2100, 42000);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesan` int(11) NOT NULL,
  `id_order` int(5) NOT NULL,
  `kd_brg` varchar(10) NOT NULL,
  `nm_brg` varchar(20) DEFAULT NULL,
  `satuan` varchar(6) DEFAULT NULL,
  `jumlah` int(4) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesan`, `id_order`, `kd_brg`, `nm_brg`, `satuan`, `jumlah`, `harga`) VALUES
(29, 19, '1-173.05', 'ANDO MOONBEAR HITAM', NULL, 1, 10000),
(30, 19, '1-173.06', 'HAWAII ABU', NULL, 2, 10000);

--
-- Triggers `pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `pesanan` FOR EACH ROW BEGIN
	UPDATE barang SET stok = stok-NEW.jumlah
    WHERE kd_brg = NEW.kd_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(6) DEFAULT NULL,
  `nama_usaha` varchar(30) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `no_npwp` varchar(15) DEFAULT NULL,
  `role_id` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_usaha`, `nama`, `alamat`, `no_telp`, `no_npwp`, `role_id`) VALUES
(1, 'admin', 'admin', 'Kafe', 'Istana Kafe', 'Sidoarjo', '0899899289', '655277769901', 1),
(2, 'fanani', 'fanani', 'pt garuda food', 'fanani', 'pasuruan', '0321 00029', '2993988299', 2),
(3, 'achsa', 'achsa', 'cafe', 'achsa cafe', 'Suko', '085748210484', '12345678', 2),
(4, 'rachmad', 'rachma', 'hotel', 'rachmad hotel', 'sidoarjo', '085777888777', '12345678', 2),
(5, 'rachmad', 'rachma', 'hotel', 'rachmad hotel', 'suko', '085666777888', '1234568', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_brg`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_order` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
