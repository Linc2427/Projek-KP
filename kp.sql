-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2023 at 05:28 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kp`
--

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `id` int(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masuk`
--

INSERT INTO `masuk` (`id`, `user`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbarang`
--

CREATE TABLE `tbarang` (
  `id_barang` int(11) NOT NULL,
  `nama_penerbangan` varchar(100) NOT NULL,
  `nama_penumpang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `kategori_barang` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_simpan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbarang`
--

INSERT INTO `tbarang` (`id_barang`, `nama_penerbangan`, `nama_penumpang`, `nama_barang`, `kategori_barang`, `jumlah`, `satuan`, `tanggal`, `tanggal_simpan`) VALUES
(1, 'GDI DN-898', 'Alshad Ahmad', 'Pisau', 'Senjata Tajam', 2, 'Unit ', '2023-03-24', '2023-03-30 03:08:08'),
(2, 'CNK JT-743', 'Assyifaul Ummah', 'Baygon', 'Zat Beracun', 1, 'Unit', '2023-03-29', '2023-03-30 03:16:57'),
(6, 'PLT KL-745', 'Sarifah Anita', 'Korek Batang', 'Benda Padat Mudah Terbakar', 5, 'Box', '2023-03-30', '2023-03-30 04:09:43'),
(9, 'Lion', 'bamb', 'silet', '1', 1, 'Pcs', '2023-04-03', '2023-04-03 02:55:59'),
(10, 'Lion', 'bambang', 'embo', 'Benda Tajam', 1, 'Unit', '2023-04-03', '2023-04-03 02:56:55'),
(11, 'Lion', 'Hadid', 'Bom', 'Bahan Peledak', 1, 'Box', '2023-04-03', '2023-04-03 03:07:16');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(255) NOT NULL,
  `kategori_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori_barang`) VALUES
(1, 'Benda Tajam'),
(2, 'Material Korosif'),
(3, 'Bahan Peledak'),
(4, 'Gas Bertekanan'),
(5, 'Cairan Mudah Terbakar'),
(6, 'Benda Padat Mudah Terbakar'),
(7, 'Material yang Teroksidasi'),
(8, 'Zat Radioaktif'),
(9, 'Zat Beracun'),
(10, 'Agen Etiologis'),
(11, 'Gas Padat'),
(12, 'Senjata Tajam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbarang`
--
ALTER TABLE `tbarang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbarang`
--
ALTER TABLE `tbarang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
