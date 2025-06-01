-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jun 2025 pada 17.06
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
-- Database: `edvanced`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_guru`
--

CREATE TABLE `login_guru` (
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nip` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `no_telp` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login_guru`
--

INSERT INTO `login_guru` (`username`, `pass`, `nip`, `nama_lengkap`, `jenis_kelamin`, `no_telp`) VALUES
('aji', '81dc9bdb52d04dc20036dbd8313ed055', 220301009, 'aji baehaki', 'perempuan', 878781744);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_siswa`
--

CREATE TABLE `login_siswa` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nis` int(10) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `no_telp` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kuis`
--

CREATE TABLE `tbl_kuis` (
  `judul` int(11) NOT NULL,
  `mata_pelajaran` int(11) NOT NULL,
  `aksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_materi`
--

CREATE TABLE `tbl_materi` (
  `judul_materi` varchar(255) NOT NULL,
  `materi_pdf` varchar(255) NOT NULL,
  `mata_pelajaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `nama_siswa` varchar(255) NOT NULL,
  `mata_pelajaran` varchar(255) NOT NULL,
  `nilai_siswa` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nip` int(255) NOT NULL,
  `nis` int(255) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `role` enum('siswa','guru','admin') NOT NULL DEFAULT 'siswa',
  `status` enum('aktif','nonaktif') DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `pass`, `nip`, `nis`, `jenis_kelamin`, `nama_lengkap`, `no_telp`, `foto`, `role`, `status`) VALUES
(1, 'rifan', '81dc9bdb52d04dc20036dbd8313ed055', 220301008, 0, 'Laki-laki', 'Rifansyah Iqramullah', '087878174468', 'uploads/rifan.jpg', 'guru', 'aktif'),
(2, 'rega', '81dc9bdb52d04dc20036dbd8313ed055', 0, 22030100, 'Laki-laki', 'rega nugraha', '087878174468', NULL, 'siswa', 'aktif'),
(3, 'andra', '202cb962ac59075b964b07152d234b70', 12345677, 0, 'Laki-laki', 'andra nugraha', '087878174490', 'uploads/tempatsampah.jpg', 'guru', 'aktif'),
(5, 'patarno', '81dc9bdb52d04dc20036dbd8313ed055', 0, 2147483647, 'Laki-laki', 'tarno', '087878174468', 'uploads/Picture12222.png', 'siswa', 'aktif'),
(6, 'rey123', '03b6c04a53d08b6c4f9b76e814c52137', 12345666, 0, 'Laki-laki', 'rey', '0899999999', 'uploads/logo ac.jpeg', 'guru', 'aktif'),
(7, 'ganteng', '81dc9bdb52d04dc20036dbd8313ed055', 0, 2147483647, 'Laki-laki', 'Rifansyah Iqramullah', '087878174490', 'uploads/gambar2333.png', 'siswa', 'aktif'),
(8, 'selma', '81dc9bdb52d04dc20036dbd8313ed055', 2147483647, 0, 'Perempuan', 'selma salsabila', '082117460335', 'uploads/logo ac.jpeg', 'guru', 'aktif'),
(9, 'husain', '81dc9bdb52d04dc20036dbd8313ed055', 12345678, 0, 'Laki-laki', 'husain muhammad nur', '087878174337', 'uploads/Picture12222.png', 'guru', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `login_guru`
--
ALTER TABLE `login_guru`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `login_siswa`
--
ALTER TABLE `login_siswa`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`nama_siswa`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
