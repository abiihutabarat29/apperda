-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 23, 2022 at 08:49 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

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
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mod_anggota`
--

INSERT INTO `mod_anggota` (`id`, `nama`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Abii Hutabarat', '1671769270_94f3aeca7c292927ad0f.png', '2022-12-23 11:21:10', '2022-12-23 11:21:10'),
(2, 'Agung Surya Bahari', '1671769287_e78841c01584d8df6375.png', '2022-12-23 11:21:27', '2022-12-23 11:21:27'),
(3, 'Zulfahmi', '1671769297_0553f871324f3c6a85b9.png', '2022-12-23 11:21:37', '2022-12-23 11:21:37'),
(4, 'Kurnia Candra Wiguna', '1671769310_d42ba92e38d301703d78.png', '2022-12-23 11:21:50', '2022-12-23 11:21:50');

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
(1, 'Bagian Umum', 'Abii Hutabarat', '2022-09-22 23:02:09', '2022-09-22'),
(2, 'Bagian Protokol', 'Abii Hutabarat', '2022-09-22 23:23:53', '2022-09-22'),
(3, 'Bagian Pemerintahan', 'Abii Hutabarat', '2022-09-22 23:30:40', '2022-09-22'),
(4, 'Bagian Pembangunan', 'Abii Hutabarat', '2022-09-22 23:30:49', '2022-09-22'),
(5, 'Bagian Hukum', 'Abii Hutabarat', '2022-09-22 23:30:58', '2022-09-22'),
(6, 'Bagian Ekonomi', 'Abii Hutabarat', '2022-09-22 23:31:11', '2022-09-22'),
(7, 'Bagian Organisasi', 'Abii Hutabarat', '2022-09-22 23:32:12', '2022-09-22'),
(10, 'Dinas Komunikasi dan Informatika', 'Abii Hutabarat', '2022-10-08 12:08:42', '2022-12-01'),
(11, 'Sekretariat Dewan', 'Abii Hutabarat', '2022-10-12 16:29:26', '2022-10-12'),
(12, 'Dinas Pekerjaan Umum dan Tata Ruang', 'Abii Hutabarat', '2022-11-21 14:37:03', '2022-11-21');

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
  `surat` varchar(255) DEFAULT NULL,
  `tgl_banmus` date DEFAULT NULL,
  `nota` varchar(255) DEFAULT NULL,
  `pdg_nota` varchar(255) DEFAULT NULL,
  `jwb_bupati` varchar(255) DEFAULT NULL,
  `pbhs_ranperda` varchar(255) DEFAULT NULL,
  `pansus_bapemperda` varchar(255) DEFAULT NULL,
  `hsl_pembahasan` varchar(255) DEFAULT NULL,
  `lap_pembahasan` varchar(255) DEFAULT NULL,
  `pendapat_fraksi` varchar(255) DEFAULT NULL,
  `penandatangan` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `userentry` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mod_perda`
--

INSERT INTO `mod_perda` (`id`, `id_instansi`, `instansi`, `judul_perda`, `dasar_hukum`, `draf_perda`, `naskah_akademik`, `dokumen`, `jenis_perda`, `surat`, `tgl_banmus`, `nota`, `pdg_nota`, `jwb_bupati`, `pbhs_ranperda`, `pansus_bapemperda`, `hsl_pembahasan`, `lap_pembahasan`, `pendapat_fraksi`, `penandatangan`, `status`, `userentry`, `created_at`, `updated_at`) VALUES
(10, 10, 'Dinas Komunikasi dan Informatika', 'Test Perda', 'Test Perda', '1670477066_5bd6c297c216c7e1e2d1.pdf', '1670477066_aa588271f4b57793c127.pdf', '1670477066_ef5bcddae062bc03cc23.pdf', 'Propemperda', '1670477714_6e8497e6a2894a6bf98c.pdf', '2022-12-14', '1670927286_3e03c1f55f0e7333ffed.pdf', '1670927292_a7ce5a953b43f321810e.pdf', '1671676244_5b331a3f02bed9533c0d.pdf', '1671767954_12e36514895b3993bd12.pdf', '1671767962_b7803c6b1b7f8fd8b8e5.pdf', '1671767968_da80675be2e078837cd5.pdf', '1671767974_4ab48e742847a67dc928.pdf', '1671767979_96269257b4c0e31b394a.pdf', '1671775645_7fe99e4d676925b667cd.pdf', 4, 'Putri', '2022-12-08 12:24:26', '2022-12-23 13:07:25'),
(11, 10, 'Dinas Komunikasi dan Informatika', 'Test again', 'Test again', '1670477683_c7442889368c4ad49aac.pdf', '1670477683_da0cc19c6d12b84fa6cd.pdf', '1670477683_cff267539aa6c438d5bc.pdf', 'Non-Propemperda', '1670477726_23b9568c0ebb94494a9a.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Putri', '2022-12-08 12:34:43', '2022-12-08 12:35:26');

-- --------------------------------------------------------

--
-- Table structure for table `mod_profil`
--

CREATE TABLE `mod_profil` (
  `id` int(11) NOT NULL,
  `nama_app` varchar(255) NOT NULL,
  `link_app` varchar(255) NOT NULL,
  `deskripsi_app` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nohp` varchar(12) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mod_profil`
--

INSERT INTO `mod_profil` (`id`, `nama_app`, `link_app`, `deskripsi_app`, `icon`, `alamat`, `email`, `nohp`, `created_at`, `updated_at`) VALUES
(3, 'SIPENBARA', 'https://sipenbara.batubarakab.go.id', 'Aplikasi Pengajuan Peraturan Daerah', '1671784147_564cd7e323e881f510b5.png', 'Lima Puluh Kota', 'sipenbara@gmail.com', '082245548800', '2022-12-23 15:09:53', '2022-12-23 15:29:07');

-- --------------------------------------------------------

--
-- Table structure for table `mod_slideshow`
--

CREATE TABLE `mod_slideshow` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mod_slideshow`
--

INSERT INTO `mod_slideshow` (`id`, `keterangan`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'title', '1671769170_271f8c11a35e1e32e209.jpg', '2022-12-23 11:19:30', '2022-12-23 11:19:30'),
(2, 'title', '1671769179_dfd1b61d414f2f9baffc.jpg', '2022-12-23 11:19:39', '2022-12-23 11:19:39'),
(3, 'title', '1671769189_d673937dac21fc7c1095.jpg', '2022-12-23 11:19:49', '2022-12-23 11:19:49');

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
(1, 11, 'Sekretariat Dewan', '1209152911970001', 'Abii Hutabarat', '082274884828', 'abiihutabarat29@gmail.com', 'abiihtb29', '$2y$10$q5SR/bgb8n9kekESBM/yQO9B1vgK6zQqsiPWIY715PZrI9lyO1/iC', '1669095205_91effdfcf8a8578e9caf.png', 1, 1, '2022-09-22 10:12:46', '2022-11-22 12:33:25'),
(4, 10, 'Dinas Komunikasi dan Informatika', '1209151223343434', 'Putri', '082275678998', 'putri@gmail.com', 'putri2022', '$2y$10$TODKOJuFYOBHxrfNaMHtr.IOHJWuLD1RyfnZohmkCNWdpSGGJ6ddm', '1669094410_f0e8a9f12c7d7dd1cb5c.png', 2, 1, '2022-10-08 12:10:06', '2022-11-22 12:20:10'),
(5, 5, 'Bagian Hukum', '1212141445454545', 'Sonia', '082265789898', 'sonia@gmail.com', 'sonia2022', '$2y$10$RY2qtcCTsHznqCKFZSaHYuT8/Qw2WnY2v.ersZWqzKioWtfeUDkNO', '1669090104_73d908a4802a4d367786.png', 3, 1, '2022-10-10 14:02:34', '2022-11-22 11:08:24'),
(7, 11, 'Sekretariat Dewan', '1212121212191919', 'Ketua Bapemperda', '082676676534', 'ketua@gmail.com', 'ketua2022', '$2y$10$W46IiqIj8za4OOcFHXa04.ThQ.U9/kBioF5rGIf3lKCv4.zgNC3ri', '1669095652_ec0ff3312cd803747a39.png', 4, 1, '2022-11-21 14:32:15', '2022-11-22 12:40:52'),
(9, 11, 'Sekretariat Dewan', '1223322112122334', 'Andika', '082267877878', 'andika@gmail.com', 'andika2022', '$2y$10$xKEG5JlGKzvCJW4byDoXZu.cNTcHGXQQdKq6HZZJJEIFIAhYch4/O', '1670494796_867c896760ee7aa0369a.png', 5, 1, '2022-12-08 12:26:16', '2022-12-08 17:19:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mod_anggota`
--
ALTER TABLE `mod_anggota`
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
-- Indexes for table `mod_profil`
--
ALTER TABLE `mod_profil`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mod_instansi`
--
ALTER TABLE `mod_instansi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mod_perda`
--
ALTER TABLE `mod_perda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mod_profil`
--
ALTER TABLE `mod_profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mod_slideshow`
--
ALTER TABLE `mod_slideshow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mod_user`
--
ALTER TABLE `mod_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
