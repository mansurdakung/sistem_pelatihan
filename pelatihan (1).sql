-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jul 2024 pada 03.43
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pelatihan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_pelatihan`
--

CREATE TABLE `jadwal_pelatihan` (
  `id` int(11) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `sls_daftar` date NOT NULL,
  `tgl_pelatihan` date NOT NULL,
  `sls_pelatihan` date NOT NULL,
  `tutor` varchar(10) NOT NULL,
  `status_jadwal` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `jadwal_pelatihan`
--

INSERT INTO `jadwal_pelatihan` (`id`, `tgl_daftar`, `sls_daftar`, `tgl_pelatihan`, `sls_pelatihan`, `tutor`, `status_jadwal`) VALUES
(13, '2024-07-26', '2024-07-26', '2024-07-05', '2024-07-05', 'laili', 'Non-Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelatihan`
--

CREATE TABLE `pelatihan` (
  `id_jenis_pelatihan` int(11) NOT NULL,
  `nama_pelatihan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pelatihan`
--

INSERT INTO `pelatihan` (`id_jenis_pelatihan`, `nama_pelatihan`) VALUES
(32, 'mansu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_jadwal` int(20) NOT NULL,
  `tanggal_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `id_user`, `id_jadwal`, `tanggal_daftar`) VALUES
(4, 5, 5, '2024-07-04'),
(6, 6, 6, '2024-07-05'),
(8, 8, 8, '2024-07-13'),
(12, 34, 45, '2024-07-26'),
(13, 11, 14, '2024-07-24'),
(15, 15, 15, '2024-07-15'),
(90, 4, 4, '2024-07-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nim` varchar(32) NOT NULL,
  `prodi` varchar(32) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `nim`, `prodi`, `password`, `role`) VALUES
(65, 'mansur', 'dia@gmail.com', 'si17200026', 'sistem informasi', '465b1f70b50166b6d05397fca8d600b0', 'admin'),
(66, 'isti', 'isti@gmail.com', 'si17200026', 'sistem informasi', 'b518d60581cfcd1c861145739d4666d6', 'siswa'),
(67, 'mansur', 'isti@gmail.com', 'si17200026', 'sistem informasi', 'b518d60581cfcd1c861145739d4666d6', 'admin'),
(68, 'mansur', 'isti@gmail.com', 'si17200026', 'sistem informasi', 'b518d60581cfcd1c861145739d4666d6', 'admin'),
(69, 'isti', 'isti@gmail.com', 'admin', 'sistem informasi', 'b518d60581cfcd1c861145739d4666d6', 'admin'),
(70, 'mansur', 'isti@gmail.com', 'si17200026', 'sistem informasi', 'b518d60581cfcd1c861145739d4666d6', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jadwal_pelatihan`
--
ALTER TABLE `jadwal_pelatihan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD PRIMARY KEY (`id_jenis_pelatihan`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal_pelatihan`
--
ALTER TABLE `jadwal_pelatihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pelatihan`
--
ALTER TABLE `pelatihan`
  MODIFY `id_jenis_pelatihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
