-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2021 at 12:03 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `horeka`
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
  `stok` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_brg`, `nm_brg`, `satuan`, `pcs`, `harga`, `gambar`, `stok`) VALUES
('1-173.01', 'DOROKU', 'ball', 20, 30000, 'doroku2.jpg', 70),
('1-173.02', 'BD Urai Pipih', 'ball', 22, 50000, 'bd_urai_pipih3.jpg', 43),
('1-173.03', 'BD Mie Kering Pipih', 'ball', 22, 50000, 'bd_mie_kering_pipih2.jpg', 13),
('1-173.04', 'DOROMAS', 'ball', 20, 60000, 'doromas1.jpg', 189);

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
  `status` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_order`, `nama`, `alamat`, `telp`, `tgl_pesan`, `batas_bayar`, `status`) VALUES
(1, 'Aprilian Putra Ahmadi A', 'mojokerto', '087742133237', '2020-09-17 09:37:49', '2020-09-19 09:37:49', '3'),
(2, 'M Iwan Ardiansyah', 'Mojokerto', '087742133237', '2020-09-17 09:56:22', '2020-09-19 09:56:22', '1'),
(3, 'abdullah', 'mmmm', '087742133237', '2020-09-17 10:02:25', '2020-09-19 10:02:25', '3'),
(4, 'abdullah', 'mkmm', '087742133237', '2020-09-17 10:19:23', '2020-09-19 10:19:23', '1'),
(5, 'ineke', 'bbhgg', '088977879', '2020-09-17 10:32:19', '2020-09-19 10:32:19', '1'),
(6, 'Yunita Setianingsih', 'mojokerto', '0892387732', '2020-09-23 16:48:31', '2020-09-25 16:48:31', '2'),
(7, 'fanani', 'msjjandn kajsdano\\\r\n as;dadma', '0899282827', '2020-09-30 23:07:25', '2020-10-30 23:07:25', '1'),
(8, 'Yunita Setianingsih', 'dadasda', '992828', '2020-09-30 23:14:12', '2020-10-30 23:14:12', '1'),
(10, 'agustin', 'jdakndakn jandadha', '98323929', '2020-09-30 23:14:53', '2020-10-30 23:14:53', '1'),
(11, 'ahmad fanani', 'ssas', '087742133237', '2020-09-30 23:18:52', '2020-10-30 23:18:52', '1'),
(12, 'agustin', 'djanda', '9831721u9', '2020-09-30 23:24:11', '2020-10-30 23:24:11', '1'),
(13, 'hdhshah', 'kjnkanca adnajn', '00391828', '2020-09-30 23:27:33', '2020-10-30 23:27:33', '1'),
(14, 'hdhshah', 'kjnkanca adnajn', '00391828', '2020-09-30 23:29:18', '2020-10-30 23:29:18', '1'),
(15, 'Achsa', 'Kediri', '08577654332', '2021-01-27 08:31:29', '2021-02-27 08:31:29', '1'),
(16, 'fsnsni', 'nmfksndf', '98928928', '2021-02-08 18:21:26', '2021-03-08 18:21:26', '1');

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
(1, 1, '1-173.02', 'BD Urai Pipih', NULL, 3, 50000),
(2, 2, '1-173.04', 'DOROMAS', NULL, 1, 60000),
(3, 3, '1-173.04', 'DOROMAS', NULL, 1, 60000),
(4, 4, '1-173.04', 'DOROMAS', NULL, 2, 60000),
(5, 4, '1-173.03', 'BD Mie Kering Pipih', NULL, 3, 50000),
(6, 4, '1-173.02', 'BD Urai Pipih', NULL, 1, 50000),
(7, 5, '1-173.04', 'DOROMAS', NULL, 1, 60000),
(8, 6, '1-173.01', 'DOROKU', NULL, 1, 30000),
(9, 6, '1-173.02', 'BD Urai Pipih', NULL, 1, 50000),
(10, 6, '1-173.03', 'BD Mie Kering Pipih', NULL, 1, 50000),
(11, 7, '1-173.03', 'BD Mie Kering Pipih', NULL, 1, 50000),
(12, 7, '1-173.04', 'DOROMAS', NULL, 1, 60000),
(13, 8, '1-173.02', 'BD Urai Pipih', NULL, 1, 50000),
(14, 8, '1-173.03', 'BD Mie Kering Pipih', NULL, 1, 50000),
(15, 10, '1-173.02', 'BD Urai Pipih', NULL, 1, 50000),
(16, 10, '1-173.04', 'DOROMAS', NULL, 1, 60000),
(17, 11, '1-173.04', 'DOROMAS', NULL, 1, 60000),
(18, 11, '1-173.02', 'BD Urai Pipih', NULL, 1, 50000),
(19, 12, '1-173.03', 'BD Mie Kering Pipih', NULL, 1, 50000),
(20, 12, '1-173.04', 'DOROMAS', NULL, 1, 60000),
(21, 13, '1-173.01', 'DOROKU', NULL, 1, 30000),
(22, 15, '1-173.04', 'DOROMAS', NULL, 2, 60000),
(23, 16, '1-173.04', 'DOROMAS', NULL, 1, 60000),
(24, 16, '1-173.01', 'DOROKU', NULL, 1, 30000);

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
  MODIFY `id_order` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
