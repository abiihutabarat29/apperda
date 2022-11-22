-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Nov 2022 pada 07.26
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
-- Struktur dari tabel `mod_instansi`
--

CREATE TABLE `mod_instansi` (
  `id` int(11) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `userentry` varchar(155) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mod_instansi`
--

INSERT INTO `mod_instansi` (`id`, `instansi`, `userentry`, `created_at`, `updated_at`) VALUES
(1, 'Bagian Umum', 'Abii Hutabarat', '2022-09-22 23:02:09', '2022-09-22'),
(2, 'Bagian Protokol', 'Abii Hutabarat', '2022-09-22 23:23:53', '2022-09-22'),
(3, 'Bagian Pemerintahan', 'Abii Hutabarat', '2022-09-22 23:30:40', '2022-09-22'),
(4, 'Bagian Pembangunan', 'Abii Hutabarat', '2022-09-22 23:30:49', '2022-09-22'),
(5, 'Bagian Hukum', 'Abii Hutabarat', '2022-09-22 23:30:58', '2022-09-22'),
(6, 'Bagian Ekonomi', 'Abii Hutabarat', '2022-09-22 23:31:11', '2022-09-22'),
(7, 'Bagian Organisasi', 'Abii Hutabarat', '2022-09-22 23:32:12', '2022-09-22'),
(10, 'Dinas Komunikasi dan Informatika', 'Abii Hutabarat', '2022-10-08 12:08:42', '2022-10-08'),
(11, 'Sekretariat Dewan', 'Abii Hutabarat', '2022-10-12 16:29:26', '2022-10-12'),
(12, 'Dinas Pekerjaan Umum dan Tata Ruang', 'Abii Hutabarat', '2022-11-21 14:37:03', '2022-11-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_perda`
--

CREATE TABLE `mod_perda` (
  `id` int(11) NOT NULL,
  `id_instansi` int(11) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `judul_perda` varchar(255) NOT NULL,
  `dasar_hukum` longtext NOT NULL,
  `draf_perda` varchar(255) NOT NULL,
  `naskah_akademik` varchar(255) NOT NULL,
  `dokumen` varchar(255) NOT NULL,
  `jenis_perda` varchar(255) DEFAULT NULL,
  `surat` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `userentry` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mod_perda`
--

INSERT INTO `mod_perda` (`id`, `id_instansi`, `instansi`, `judul_perda`, `dasar_hukum`, `draf_perda`, `naskah_akademik`, `dokumen`, `jenis_perda`, `surat`, `status`, `userentry`, `created_at`, `updated_at`) VALUES
(7, 10, 'Dinas Komunikasi dan Informatika', 'Test', 'Test', '1669094451_6435b22da144532a97f6.pdf', '1669094451_2b7cdffe1be53bc05798.pdf', '1669094451_01944fca070bbc2c5785.pdf', 'Propemperda', '1669095898_2f78860332585b26b00e.pdf', 1, 'Putri', '2022-11-22 12:20:51', '2022-11-22 12:44:58'),
(8, 10, 'Dinas Komunikasi dan Informatika', 'Test 2', 'Test 2', '1669094544_039fced50ce626bf3965.pdf', '1669094544_24ce728b2b5deca7eeef.pdf', '1669094544_f49da66d40c1c2ae6701.pdf', 'Non-Propemperda', '1669095905_b2c9fa54d03cc57b9202.pdf', 1, 'Putri', '2022-11-22 12:22:24', '2022-11-22 12:45:05');

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
(1, 11, 'Sekretariat Dewan', '1209152911970001', 'Abii Hutabarat', '082274884828', 'abiihutabarat29@gmail.com', 'abiihtb29', '$2y$10$q5SR/bgb8n9kekESBM/yQO9B1vgK6zQqsiPWIY715PZrI9lyO1/iC', '1669095205_91effdfcf8a8578e9caf.png', 1, 1, '2022-09-22 10:12:46', '2022-11-22 12:33:25'),
(4, 10, 'Dinas Komunikasi dan Informatika', '1209151223343434', 'Putri', '082275678998', 'putri@gmail.com', 'putri2022', '$2y$10$TODKOJuFYOBHxrfNaMHtr.IOHJWuLD1RyfnZohmkCNWdpSGGJ6ddm', '1669094410_f0e8a9f12c7d7dd1cb5c.png', 2, 1, '2022-10-08 12:10:06', '2022-11-22 12:20:10'),
(5, 5, 'Bagian Hukum', '1212141445454545', 'Sonia', '082265789898', 'sonia@gmail.com', 'sonia2022', '$2y$10$RY2qtcCTsHznqCKFZSaHYuT8/Qw2WnY2v.ersZWqzKioWtfeUDkNO', '1669090104_73d908a4802a4d367786.png', 3, 1, '2022-10-10 14:02:34', '2022-11-22 11:08:24'),
(7, 11, 'Sekretariat Dewan', '1212121212191919', 'Ketua Bapemperda', '082676676534', 'ketua@gmail.com', 'ketua2022', '$2y$10$W46IiqIj8za4OOcFHXa04.ThQ.U9/kBioF5rGIf3lKCv4.zgNC3ri', '1669095652_ec0ff3312cd803747a39.png', 4, 1, '2022-11-21 14:32:15', '2022-11-22 12:40:52');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mod_instansi`
--
ALTER TABLE `mod_instansi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_perda`
--
ALTER TABLE `mod_perda`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_user`
--
ALTER TABLE `mod_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mod_instansi`
--
ALTER TABLE `mod_instansi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `mod_perda`
--
ALTER TABLE `mod_perda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `mod_user`
--
ALTER TABLE `mod_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
