-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Apr 2023 pada 09.39
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

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
-- Struktur dari tabel `masuk`
--

CREATE TABLE `masuk` (
  `id` int(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `masuk`
--

INSERT INTO `masuk` (`id`, `user`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(255) NOT NULL,
  `kategori_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kategori`
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
-- Struktur dari tabel `tb_penumpang`
--

CREATE TABLE `tb_penumpang` (
  `id_penumpang` int(255) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `nama_penumpang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_penumpang`
--

INSERT INTO `tb_penumpang` (`id_penumpang`, `nomor`, `nama_penumpang`) VALUES
(1, '020Y004B0094', 'Dapit'),
(2, '8179481734', 'Jarjit'),
(3, '0981823kjjkha', 'Messi'),
(4, 'kjshd909012', 'orang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_status`
--

CREATE TABLE `tb_status` (
  `id_status` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_status`
--

INSERT INTO `tb_status` (`id_status`, `status`) VALUES
(1, 'Aktif'),
(2, 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_suspek`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_suspek`
--

INSERT INTO `tb_suspek` (`id_suspek`, `nomor_penerbangan`, `nama_penumpang`, `nama_barang`, `kategori_barang`, `jumlah`, `satuan`, `tanggal`, `tanggal_simpan`, `status`) VALUES
(1, 'GDI DN-898', 'Alshad Ahmad', 'Pisau', 'Senjata Tajam', '2', 'Unit ', '2023-03-24', '2023-03-30 03:08:08', ''),
(2, 'shdjfksdf', 'aldrik', 'embo', 'Material yang Teroksidasi', '1', 'Kotak', '2023-04-04', '2023-04-04 05:09:48', ''),
(3, '020Y004B0094', 'Dapit', '', '', '', '', '0000-00-00', '2023-04-06 06:31:43', 'Tidak Aktif'),
(4, 'Jarjit', 'Aktif', '', '', '', '', '2023-04-11', '2023-04-11 07:28:36', ''),
(6, 'kjshd909012', 'orang', '', '', '', '', '2023-04-11', '2023-04-11 07:33:39', 'Aktif'),
(7, 'kjshd909012', 'orang', '', '', '', '', '2023-04-11', '2023-04-11 07:33:54', 'Tidak Aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_penumpang`
--
ALTER TABLE `tb_penumpang`
  ADD PRIMARY KEY (`id_penumpang`);

--
-- Indeks untuk tabel `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `tb_suspek`
--
ALTER TABLE `tb_suspek`
  ADD PRIMARY KEY (`id_suspek`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `masuk`
--
ALTER TABLE `masuk`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_penumpang`
--
ALTER TABLE `tb_penumpang`
  MODIFY `id_penumpang` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id_status` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_suspek`
--
ALTER TABLE `tb_suspek`
  MODIFY `id_suspek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
