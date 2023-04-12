-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2023 at 09:05 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kpkp`
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

-- --------------------------------------------------------

--
-- Table structure for table `tb_penumpang`
--

CREATE TABLE `tb_penumpang` (
  `id_penumpang` int(255) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `nama_penumpang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penumpang`
--

INSERT INTO `tb_penumpang` (`id_penumpang`, `nomor`, `nama_penumpang`) VALUES
(1, '020Y004B0094', 'Dapit'),
(2, '8179481734', 'Jarjit'),
(3, '0981823kjjkha', 'Messi'),
(4, 'kjshd909012', 'orang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `id_status` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`id_status`, `status`) VALUES
(1, 'Tidak Aktif'),
(2, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_suspek`
--

CREATE TABLE `tb_suspek` (
  `id_suspek` int(11) NOT NULL,
  `nomor_penerbangan` varchar(100) NOT NULL,
  `nama_penumpang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `kategori_barang` varchar(100) NOT NULL,
  `jumlah` varchar(11) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `tanggal_simpan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_suspek`
--

INSERT INTO `tb_suspek` (`id_suspek`, `nomor_penerbangan`, `nama_penumpang`, `nama_barang`, `kategori_barang`, `jumlah`, `satuan`, `tanggal`, `tanggal_simpan`, `status`) VALUES
(1, 'GDI DN-898', 'Alshad Ahmad', 'Pisau', 'Senjata Tajam', '2', 'Unit ', '2023-03-24', '2023-03-30 03:08:08', ''),
(2, 'shdjfksdf', 'aldrik', 'embo', 'Material yang Teroksidasi', '1', 'Kotak', '2023-04-04', '2023-04-04 05:09:48', ''),
(3, '020Y004B0094', 'Dapit', 'askld', 'Bahan Peledak', '4', 'Kotak', '2023-04-29', '2023-04-12 04:44:56', 'Aktif'),
(21, '8179481734', 'Jarjit', 'bom', 'Bahan Peledak', '3', 'Kotak', '2023-04-12', '2023-04-12 04:44:11', 'Aktif'),
(24, 'kjshd909012', 'caca', '', '', '', '', '2023-04-12', '2023-04-12 04:41:38', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_penumpang`
--
ALTER TABLE `tb_penumpang`
  ADD PRIMARY KEY (`id_penumpang`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tb_suspek`
--
ALTER TABLE `tb_suspek`
  ADD PRIMARY KEY (`id_suspek`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_penumpang`
--
ALTER TABLE `tb_penumpang`
  MODIFY `id_penumpang` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id_status` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_suspek`
--
ALTER TABLE `tb_suspek`
  MODIFY `id_suspek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
