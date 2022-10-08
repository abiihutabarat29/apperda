-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Okt 2022 pada 07.05
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apperda_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_user`
--

CREATE TABLE `mod_user` (
  `id` int(11) NOT NULL,
  `id_instansi` int(11) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `nik` varchar(25) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nohp` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mod_user`
--

INSERT INTO `mod_user` (`id`, `id_instansi`, `instansi`, `nik`, `nama`, `nohp`, `email`, `username`, `password`, `foto`, `level`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'DPR', '1209152911970001', 'Abii Hutabarat', '082274884828', 'abiihutabarat29@gmail.com', 'abiihtb29', '$2y$10$eqOk60S8kJYTT.eB84LbD.o2lufAAVV/Vdypvzi5TmxNMI9S3ZpGe', 'blank.png', 1, 1, '2022-09-22 10:12:46', '2022-10-02 01:47:48');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mod_user`
--
ALTER TABLE `mod_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mod_user`
--
ALTER TABLE `mod_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
