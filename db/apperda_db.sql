-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2022 at 07:38 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
-- Table structure for table `mod_anggota`
--

CREATE TABLE `mod_anggota` (
  `id` int(11) NOT NULL,
  `id_fraksi` int(11) NOT NULL,
  `fraksi` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mod_anggota`
--

INSERT INTO `mod_anggota` (`id`, `id_fraksi`, `fraksi`, `nama`, `jabatan`, `foto`, `created_at`, `updated_at`) VALUES
(7, 10, '', 'aaa', 'aaa', 'blank.png', '2022-10-14 16:46:41', '2022-10-14 16:46:41'),
(8, 13, '', 'sdsd', 'asdsadsa', 'blank.png', '2022-10-14 17:11:25', '2022-10-14 17:11:25');

-- --------------------------------------------------------

--
-- Table structure for table `mod_fraksi`
--

CREATE TABLE `mod_fraksi` (
  `id` int(11) NOT NULL,
  `fraksi` varchar(255) NOT NULL,
  `userentry` varchar(100) NOT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mod_fraksi`
--

INSERT INTO `mod_fraksi` (`id`, `fraksi`, `userentry`, `created_at`, `updated_at`) VALUES
(9, 'FRAKSI DEMOKRAT1', 'Abii Hutabarat', '2022-10-14 06:42:14', '2022-10-14 16:35:05'),
(10, 'PDI-P', 'Abii Hutabarat', '2022-10-14 07:11:46', '2022-10-14 07:11:46'),
(11, 'GOLKAR', 'Abii Hutabarat', '2022-10-14 07:31:24', '2022-10-14 07:31:24'),
(13, 'FRAKSI PKS', 'Abii Hutabarat', '2022-10-14 15:34:20', '2022-10-14 15:34:20'),
(14, 'sadsds', 'Abii Hutabarat', '2022-10-14 17:01:47', '2022-10-14 17:01:47');

-- --------------------------------------------------------

--
-- Table structure for table `mod_instansi`
--

CREATE TABLE `mod_instansi` (
  `id` int(11) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `userentry` varchar(155) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mod_instansi`
--

INSERT INTO `mod_instansi` (`id`, `instansi`, `userentry`, `created_at`, `updated_at`) VALUES
(2, 'BAGIAN PROTOKOL', 'Abii Hutabarat', '2022-09-22 23:23:53', '2022-10-14'),
(3, 'Bagian Pemerintahan', 'Abii Hutabarat', '2022-09-22 23:30:40', '2022-09-22'),
(4, 'Bagian Pembangunan', 'Abii Hutabarat', '2022-09-22 23:30:49', '2022-09-22'),
(5, 'Bagian Hukum', 'Abii Hutabarat', '2022-09-22 23:30:58', '2022-09-22'),
(6, 'Bagian Ekonomi', 'Abii Hutabarat', '2022-09-22 23:31:11', '2022-09-22'),
(7, 'Bagian Organisasi', 'Abii Hutabarat', '2022-09-22 23:32:12', '2022-09-22'),
(10, 'Dinas Komunikasi dan Informatika', 'Abii Hutabarat', '2022-10-08 12:08:42', '2022-10-08');

-- --------------------------------------------------------

--
-- Table structure for table `mod_perda`
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
  `status` int(11) NOT NULL,
  `userentry` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mod_perda`
--

INSERT INTO `mod_perda` (`id`, `id_instansi`, `instansi`, `judul_perda`, `dasar_hukum`, `draf_perda`, `naskah_akademik`, `dokumen`, `jenis_perda`, `status`, `userentry`, `created_at`, `updated_at`) VALUES
(2, 10, 'Dinas Komunikasi dan Informatika', 'Peraturan Testing hhhhhhhssdshjgjghjghjhg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout hhhhhhhhdsdsdghjgj', '1665230958_575e342476be5ea4f5aa.pdf', '1665230256_b5f230cfaa5b9a5b5983.pdf', '1665230256_4a58ee7676c2e75d19f2.pdf', 'Propemperda', 1, 'Putri', '2022-10-08 18:23:46', '2022-10-10 18:59:01'),
(3, 10, 'Dinas Komunikasi dan Informatika', 'Judul test', 'asdasdasd', '1665564365_d0abc0526ffef2af3a5c.pdf', '1665564365_b527427fcda98bec8f7d.pdf', '1665564365_9618ef10dc6409c4e515.pdf', 'Non-Propemperda', 1, 'Putri', '2022-10-12 15:46:05', '2022-10-12 15:48:45'),
(4, 10, 'Dinas Komunikasi dan Informatika', 'testes', 'testes', '1665639316_e543ee757dd5740cd2b5.pdf', '1665639316_aa46ff210cc89e9f52a8.pdf', '1665639316_2efd0a2be994291eb5b9.pdf', NULL, 0, 'Putri', '2022-10-13 12:35:16', '2022-10-13 12:35:16');

-- --------------------------------------------------------

--
-- Table structure for table `mod_slideshow`
--

CREATE TABLE `mod_slideshow` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mod_user`
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
-- Dumping data for table `mod_user`
--

INSERT INTO `mod_user` (`id`, `id_instansi`, `instansi`, `nik`, `nama`, `nohp`, `email`, `username`, `password`, `foto`, `level`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'DPR', '1209152911970001', 'Abii Hutabarat', '082274884828', 'abiihutabarat29@gmail.com', 'abiihtb29', '$2y$10$eqOk60S8kJYTT.eB84LbD.o2lufAAVV/Vdypvzi5TmxNMI9S3ZpGe', 'blank.png', 1, 1, '2022-09-22 10:12:46', '2022-10-02 01:47:48'),
(4, 10, 'Dinas Komunikasi dan Informatika', '1209151223343434', 'Putri', '082275678998', 'putri@gmail.com', 'putri2022', '$2y$10$EL/5TpLQqd.Xh1VUoiujneuZuDnTH7OS2q9I0szgppu4A7MYUq1QK', 'blank.png', 2, 1, '2022-10-08 12:10:06', '2022-10-08 12:10:06'),
(5, 5, 'Bagian Hukum', '1212141445454545', 'Sonia', '082265789898', 'sonia@gmail.com', 'sonia2022', '$2y$10$61cW0P0HHjKlujbJrbTyOux3cbyClASQeKlRtzlqYXTwLJvjF5pX6', 'blank.png', 3, 1, '2022-10-10 14:02:34', '2022-10-10 14:02:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mod_anggota`
--
ALTER TABLE `mod_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mod_fraksi`
--
ALTER TABLE `mod_fraksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mod_instansi`
--
ALTER TABLE `mod_instansi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mod_perda`
--
ALTER TABLE `mod_perda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mod_slideshow`
--
ALTER TABLE `mod_slideshow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mod_user`
--
ALTER TABLE `mod_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mod_anggota`
--
ALTER TABLE `mod_anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mod_fraksi`
--
ALTER TABLE `mod_fraksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mod_instansi`
--
ALTER TABLE `mod_instansi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mod_perda`
--
ALTER TABLE `mod_perda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mod_slideshow`
--
ALTER TABLE `mod_slideshow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `mod_user`
--
ALTER TABLE `mod_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
