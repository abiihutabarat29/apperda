-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Okt 2022 pada 18.12
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
-- Database: `sipeka_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_anggaran`
--

CREATE TABLE `mod_anggaran` (
  `id` int(11) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `nama_bagian` varchar(255) NOT NULL,
  `jumlah_anggaran` int(12) NOT NULL,
  `pakai_anggaran` int(12) DEFAULT NULL,
  `sisa_anggaran` int(12) DEFAULT NULL,
  `thn_anggaran` varchar(25) NOT NULL,
  `userentry` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mod_anggaran`
--

INSERT INTO `mod_anggaran` (`id`, `id_bagian`, `nama_bagian`, `jumlah_anggaran`, `pakai_anggaran`, `sisa_anggaran`, `thn_anggaran`, `userentry`, `created_at`, `updated_at`) VALUES
(5, 3, 'Bagian Pemerintahan', 200000000, 33000000, 167000000, '2022', 'Abii Hutabarat', '2022-09-28 01:55:38', '2022-10-04 21:41:19'),
(6, 2, 'Bagian Protokol', 300000000, NULL, 300000000, '2022', 'Abii Hutabarat', '2022-10-02 02:16:12', '2022-10-04 21:16:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_bagian`
--

CREATE TABLE `mod_bagian` (
  `id` int(11) NOT NULL,
  `nama_bagian` varchar(255) NOT NULL,
  `userentry` varchar(155) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mod_bagian`
--

INSERT INTO `mod_bagian` (`id`, `nama_bagian`, `userentry`, `created_at`, `updated_at`) VALUES
(1, 'Bagian Umum', 'Abii Hutabarat', '2022-09-22 23:02:09', '2022-09-22'),
(2, 'Bagian Protokol', 'Abii Hutabarat', '2022-09-22 23:23:53', '2022-09-22'),
(3, 'Bagian Pemerintahan', 'Abii Hutabarat', '2022-09-22 23:30:40', '2022-09-22'),
(4, 'Bagian Pembangunan', 'Abii Hutabarat', '2022-09-22 23:30:49', '2022-09-22'),
(5, 'Bagian Hukum', 'Abii Hutabarat', '2022-09-22 23:30:58', '2022-09-22'),
(6, 'Bagian Ekonomi', 'Abii Hutabarat', '2022-09-22 23:31:11', '2022-09-22'),
(7, 'Bagian Organisasi', 'Abii Hutabarat', '2022-09-22 23:32:12', '2022-09-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_file_kegiatan`
--

CREATE TABLE `mod_file_kegiatan` (
  `id` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `kwitansi` varchar(255) NOT NULL,
  `berita_acara` varchar(255) NOT NULL,
  `pesanan_brg` varchar(255) NOT NULL,
  `bon_faktur` varchar(255) NOT NULL,
  `bagian` varchar(255) NOT NULL,
  `userentry` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_file_sppd`
--

CREATE TABLE `mod_file_sppd` (
  `id` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `kwitansi` varchar(225) NOT NULL,
  `lumsum` varchar(225) NOT NULL,
  `spt` varchar(225) NOT NULL,
  `lpd` varchar(225) NOT NULL,
  `bagian` varchar(225) NOT NULL,
  `userentry` varchar(225) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_gu`
--

CREATE TABLE `mod_gu` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `jam_mulai` time DEFAULT NULL,
  `tgl_selesai` date NOT NULL,
  `jam_selesai` time DEFAULT NULL,
  `bulan` varchar(25) NOT NULL,
  `tahun` varchar(25) NOT NULL,
  `userentry` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mod_gu`
--

INSERT INTO `mod_gu` (`id`, `judul`, `tgl_mulai`, `jam_mulai`, `tgl_selesai`, `jam_selesai`, `bulan`, `tahun`, `userentry`, `created_at`, `updated_at`) VALUES
(6, 'GU 1', '2022-10-10', '00:00:00', '2022-10-17', '17:00:00', 'Oktober', '2022', 'Abii Hutabarat', '2022-10-03 11:10:45', '2022-10-03 11:10:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_kegiatan`
--

CREATE TABLE `mod_kegiatan` (
  `id` int(11) NOT NULL,
  `kode_kegiatan` varchar(255) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `userentry` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mod_kegiatan`
--

INSERT INTO `mod_kegiatan` (`id`, `kode_kegiatan`, `nama_kegiatan`, `userentry`, `created_at`, `updated_at`) VALUES
(2, '3.4.5.4.5', 'Kegiatan A', 'Abii Hutabarat', '2022-09-27 04:27:32', '2022-09-27 04:27:32'),
(3, '4.6.8.9.0', 'Kegiatan B', 'Abii Hutabarat', '2022-09-27 04:50:39', '2022-09-27 04:50:39'),
(4, '8.8.8.88', 'Kegiatan AA', 'Abii Hutabarat', '2022-09-28 11:33:14', '2022-09-28 11:34:14'),
(5, '9.0.9.0', 'Kegiatan BB', 'Abii Hutabarat', '2022-09-28 11:33:25', '2022-09-28 11:33:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_rekening_belanja`
--

CREATE TABLE `mod_rekening_belanja` (
  `id` int(11) NOT NULL,
  `kode_rek` varchar(255) NOT NULL,
  `nama_rek` varchar(255) NOT NULL,
  `kode_rek_simda` varchar(255) NOT NULL,
  `userentry` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mod_rekening_belanja`
--

INSERT INTO `mod_rekening_belanja` (`id`, `kode_rek`, `nama_rek`, `kode_rek_simda`, `userentry`, `created_at`, `updated_at`) VALUES
(79, '4.5.6.7.8.0', 'Test Rekening', '4.5.6.7.87.8.0', 'Abii Hutabarat', '2022-09-28 00:04:20', '2022-09-28 00:04:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_spj_kegiatan`
--

CREATE TABLE `mod_spj_kegiatan` (
  `id` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `id_rek` int(11) NOT NULL,
  `kode_kegiatan` varchar(255) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `kode_rek` varchar(255) NOT NULL,
  `nama_rek` varchar(255) NOT NULL,
  `kode_rek_simda` varchar(255) NOT NULL,
  `bagian` varchar(255) NOT NULL,
  `uraian` longtext DEFAULT NULL,
  `nilai_kwitansi` varchar(255) NOT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `alamat_penerima` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `alasan` longtext DEFAULT NULL,
  `userentry` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_spj_kegiatansub`
--

CREATE TABLE `mod_spj_kegiatansub` (
  `id` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_subkegiatan` int(11) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `kode_sub` varchar(255) NOT NULL,
  `nama_sub` varchar(255) NOT NULL,
  `bagian` varchar(255) NOT NULL,
  `userentry` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_spj_sppd`
--

CREATE TABLE `mod_spj_sppd` (
  `id` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `id_rek` int(11) NOT NULL,
  `kode_kegiatan` varchar(255) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `kode_rek` varchar(255) NOT NULL,
  `nama_rek` varchar(255) NOT NULL,
  `kode_rek_simda` varchar(255) NOT NULL,
  `bagian` varchar(255) NOT NULL,
  `uraian` longtext NOT NULL,
  `nilai_kwitansi` varchar(255) NOT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `alamat_penerima` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `alasan` longtext DEFAULT NULL,
  `userentry` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_spj_subkegiatan`
--

CREATE TABLE `mod_spj_subkegiatan` (
  `id` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_subkegiatan` int(11) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `kode_sub` varchar(255) NOT NULL,
  `nama_sub` varchar(255) NOT NULL,
  `bagian` varchar(255) NOT NULL,
  `userentry` varchar(225) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_sub_kegiatan`
--

CREATE TABLE `mod_sub_kegiatan` (
  `id` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `kode_kegiatan` varchar(255) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `kode_sub` varchar(255) NOT NULL,
  `nama_sub` varchar(255) NOT NULL,
  `bagian` varchar(255) NOT NULL,
  `userentry` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mod_sub_kegiatan`
--

INSERT INTO `mod_sub_kegiatan` (`id`, `id_kegiatan`, `id_bagian`, `kode_kegiatan`, `nama_kegiatan`, `kode_sub`, `nama_sub`, `bagian`, `userentry`, `created_at`, `updated_at`) VALUES
(16, 2, 1, '3.4.5.4.5', 'Kegiatan A', '4.5.6.7.8.0', 'Sub Kegiatan A', 'Bagian Umum', 'Abii Hutabarat', '2022-09-28 10:22:49', '2022-10-03 11:38:36'),
(17, 3, 1, '4.6.8.9.0', 'Kegiatan B', '3.2.1.5.6.7', 'Sub Kegiatan B', 'Bagian Umum', 'Abii Hutabarat', '2022-09-28 10:23:14', '2022-09-28 10:29:22'),
(18, 4, 3, '8.8.8.88', 'Kegiatan AA', '5.4.5.6.5.0', 'Sub Kegiatan AA', 'Bagian Pemerintahan', 'Abii Hutabarat', '2022-09-28 11:33:51', '2022-09-28 11:39:50'),
(19, 5, 2, '9.0.9.0', 'Kegiatan BB', '9.0.9.0.9', 'Sub Kegiatan BB', 'Bagian Protokol', 'Abii Hutabarat', '2022-09-28 11:41:31', '2022-09-30 11:54:35'),
(20, 3, 2, '4.6.8.9.0', 'Kegiatan B', '2.1.2.3.4', 'Sub Kegiatan B Lagi', 'Bagian Protokol', 'Abii Hutabarat', '2022-09-29 10:40:02', '2022-09-30 11:54:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mod_user`
--

CREATE TABLE `mod_user` (
  `id` int(11) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `nama_bagian` varchar(255) NOT NULL,
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

INSERT INTO `mod_user` (`id`, `id_bagian`, `nama_bagian`, `nik`, `nama`, `nohp`, `email`, `username`, `password`, `foto`, `level`, `status`, `created_at`, `updated_at`) VALUES
(1, 10, 'Sekretariat Daerah', '1209152911970001', 'Abii Hutabarat', '082274884828', 'abiihutabarat29@gmail.com', 'abiihtb29', '$2y$10$eqOk60S8kJYTT.eB84LbD.o2lufAAVV/Vdypvzi5TmxNMI9S3ZpGe', 'blank.png', 1, 1, '2022-09-22 10:12:46', '2022-10-02 01:47:48'),
(2, 2, 'Bagian Protokol', '3131313232323999', 'Fatmah', '082234455659', 'fatma@gmail.com', 'fatma2022', '$2y$10$9ZEkyPraYV0jmWwABxP1EOpgowyjnC1ddPYMzq2s7XSGx7l3kKr1G', '1664693173_20a614b4cdfa0537e72c.png', 2, 1, '2022-09-23 00:17:51', '2022-10-02 01:46:13'),
(3, 3, 'Bagian Pemerintahan', '1313132323232323', 'Dina', '081345566787', 'dina@gmail.com', 'dina2022', '$2y$10$BMXvBGhKHFcq93GnmRBdMuUV6k8pUofo.ABre7L1GuLJNWLPCqdLC', '1664766282_af9fdd22e369180412f3.png', 2, 1, '2022-10-02 22:03:39', '2022-10-02 22:04:42');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mod_anggaran`
--
ALTER TABLE `mod_anggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_bagian`
--
ALTER TABLE `mod_bagian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_file_kegiatan`
--
ALTER TABLE `mod_file_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_file_sppd`
--
ALTER TABLE `mod_file_sppd`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_gu`
--
ALTER TABLE `mod_gu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_kegiatan`
--
ALTER TABLE `mod_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_rekening_belanja`
--
ALTER TABLE `mod_rekening_belanja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_spj_kegiatan`
--
ALTER TABLE `mod_spj_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_spj_kegiatansub`
--
ALTER TABLE `mod_spj_kegiatansub`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_spj_sppd`
--
ALTER TABLE `mod_spj_sppd`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_spj_subkegiatan`
--
ALTER TABLE `mod_spj_subkegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mod_sub_kegiatan`
--
ALTER TABLE `mod_sub_kegiatan`
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
-- AUTO_INCREMENT untuk tabel `mod_anggaran`
--
ALTER TABLE `mod_anggaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `mod_bagian`
--
ALTER TABLE `mod_bagian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `mod_file_kegiatan`
--
ALTER TABLE `mod_file_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `mod_file_sppd`
--
ALTER TABLE `mod_file_sppd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `mod_gu`
--
ALTER TABLE `mod_gu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `mod_kegiatan`
--
ALTER TABLE `mod_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mod_rekening_belanja`
--
ALTER TABLE `mod_rekening_belanja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT untuk tabel `mod_spj_kegiatan`
--
ALTER TABLE `mod_spj_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `mod_spj_kegiatansub`
--
ALTER TABLE `mod_spj_kegiatansub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `mod_spj_sppd`
--
ALTER TABLE `mod_spj_sppd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `mod_spj_subkegiatan`
--
ALTER TABLE `mod_spj_subkegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `mod_sub_kegiatan`
--
ALTER TABLE `mod_sub_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `mod_user`
--
ALTER TABLE `mod_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
