-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jun 2025 pada 17.03
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

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
-- Struktur dari tabel `jawaban_siswa`
--

CREATE TABLE `jawaban_siswa` (
  `id` int(11) NOT NULL,
  `id_quiz` int(11) DEFAULT NULL,
  `id_soal` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `jawaban` varchar(1) DEFAULT NULL,
  `benar` tinyint(1) DEFAULT NULL,
  `waktu_submit` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `mata_pelajaran` varchar(100) NOT NULL,
  `tanggal_dibuat` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `quiz`
--

INSERT INTO `quiz` (`id`, `judul`, `mata_pelajaran`, `tanggal_dibuat`) VALUES
(1, 'UAS', 'sejarah', '2025-06-22'),
(2, 'UAS', 'IPA', '2025-06-22'),
(3, 'UAS', 'IPA', '2025-06-22'),
(4, 'UAS', 'IPA', '2025-06-22'),
(5, 'UAS', 'IPA', '2025-06-22'),
(6, 'UAS', 'sejarah', '2025-06-22'),
(7, 'UAS', 'sejarah', '2025-06-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `id` int(11) NOT NULL,
  `id_quiz` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `opsi_a` varchar(255) DEFAULT NULL,
  `opsi_b` varchar(255) DEFAULT NULL,
  `opsi_c` varchar(255) DEFAULT NULL,
  `opsi_d` varchar(255) DEFAULT NULL,
  `jawaban_benar` enum('A','B','C','D') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`id`, `id_quiz`, `pertanyaan`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `jawaban_benar`) VALUES
(1, 1, 'siapa penemu komputer', 'asep gordon', 'hj.udin', 'charles babbage', 'tukang servis galon', 'C'),
(2, 1, 'siapa ketua prodi informatika unper', 'pa agus', 'pa teguh', 'bu evi', 'pa aso', 'D'),
(3, 2, 'Burung Betet Macaw memiliki paruh dengan bentuk yang khas. Fungsi paruh tersebut adalah untuk...', 'Merobek mangsanya/', 'menghisap makanannya', 'mengorek makanannya', 'mencengkram makananya', 'A'),
(4, 3, 'Burung Betet Macaw memiliki paruh dengan bentuk yang khas. Fungsi paruh tersebut adalah untuk...', 'Merobek mangsanya/', 'menghisap makanannya', 'mengorek makanannya', 'mencengkram makananya', 'A'),
(5, 4, 'Burung Betet Macaw memiliki paruh dengan bentuk yang khas. Fungsi paruh tersebut adalah untuk...', 'Merobek mangsanya/', 'menghisap makanannya', 'mengorek makanannya', 'mencengkram makananya', 'A'),
(6, 5, 'belalang bernapas menggunakan', 'paru-paru', 'insang', 'permukaan kulit', 'trakea', 'D'),
(7, 6, 'siapa yang akan menang antara israel dan iran', 'israel', 'iran', 'amerika', 'UNPER', 'D'),
(8, 7, 'mana yang benar', 'saya', 'kamu ', 'cewe', 'laki - laki', 'D');

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
-- Indeks untuk tabel `jawaban_siswa`
--
ALTER TABLE `jawaban_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_quiz` (`id_quiz`);

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
-- AUTO_INCREMENT untuk tabel `jawaban_siswa`
--
ALTER TABLE `jawaban_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `soal`
--
ALTER TABLE `soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `soal_ibfk_1` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
