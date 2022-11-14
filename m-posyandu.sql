-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Nov 2022 pada 10.35
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
-- Database: `m-posyandu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_admin`
--

CREATE TABLE `akun_admin` (
  `ID_admin` int(10) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `psw` varchar(255) NOT NULL,
  `tanggal_regis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun_admin`
--

INSERT INTO `akun_admin` (`ID_admin`, `kode`, `email`, `username`, `psw`, `tanggal_regis`) VALUES
(1, 'A1K802', 'alfiananp21803@gmail.com', 'alfiananur3021', '$2y$10$ZyDVqATHFPgpXasms5UNbe3/Y3Q6NfAgAbfuAYFdWG5BBSPKCj03.', 'Mon 14/11/2022 15:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_user`
--

CREATE TABLE `akun_user` (
  `ID_user` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `psw` varchar(255) NOT NULL,
  `tanggal_regis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun_user`
--

INSERT INTO `akun_user` (`ID_user`, `email`, `username`, `psw`, `tanggal_regis`) VALUES
(2, 'fiana@gmail.com', 'alfiana', '$2y$10$QgUU9dsr740/k6ltBKB0f.phy4hWATjkMhB6SDJ0LlHcGMgk7wE9O', 'Mon 14/11/2022 15:03'),
(3, 'jenita@gmail.com', 'jeni', '$2y$10$.ehtVPPCtgtAXt0imZoO4.z5BKSvrNPsm5aMWCbbdPS9XLScVLs7.', 'Mon 14/11/2022 15:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_admin`
--

CREATE TABLE `data_admin` (
  `Id_kode` int(10) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_admin`
--

INSERT INTO `data_admin` (`Id_kode`, `kode`, `nama`, `gender`) VALUES
(1, 'A1K801', 'Ilham Ramadhan', 'Laki-Laki'),
(2, 'A1K802', 'Al Fiana Nur', 'Perempuan'),
(3, 'A1K803', 'Shafira Octafia', 'Perempuan'),
(4, 'A1K804', 'Ramadhani', 'Laki-Laki'),
(5, 'A1K805', 'Oktavianur', 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_anak`
--

CREATE TABLE `data_anak` (
  `ID` int(10) NOT NULL,
  `ID_user` int(10) NOT NULL,
  `nama_anak` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tinggi` int(255) NOT NULL,
  `berat` int(255) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `foto_anak` varchar(100) NOT NULL,
  `tanggal_isi` varchar(100) NOT NULL,
  `imunisasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_anak`
--

INSERT INTO `data_anak` (`ID`, `ID_user`, `nama_anak`, `jenis_kelamin`, `tanggal_lahir`, `tinggi`, `berat`, `nama_ibu`, `nama_ayah`, `foto_anak`, `tanggal_isi`, `imunisasi`) VALUES
(5, 2, 'Fina', 'Perempuan', '2018-08-21', 102, 13, 'Safa', 'Galih', 'Fina.jpg', 'Mon 14/11/2022 15:24', 'DPT'),
(6, 2, 'Akbar', 'Laki-Laki', '2020-02-17', 89, 9, 'Nur', 'Andi', 'Akbar.jpg', 'Mon 14/11/2022 15:44', 'PVC'),
(7, 3, 'Kalia', 'Perempuan', '2021-01-09', 83, 8, 'Safira', 'Saka', 'Kalia.jpg', 'Mon 14/11/2022 15:50', 'Polio');

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedback_table`
--

CREATE TABLE `feedback_table` (
  `ID` int(11) NOT NULL,
  `ID_user` int(10) NOT NULL,
  `feedback` text NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `feedback_table`
--

INSERT INTO `feedback_table` (`ID`, `ID_user`, `feedback`, `tanggal`) VALUES
(2, 2, 'Terimakasih Banyak', 'Mon 14/11/2022 15:26');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun_admin`
--
ALTER TABLE `akun_admin`
  ADD PRIMARY KEY (`ID_admin`);

--
-- Indeks untuk tabel `akun_user`
--
ALTER TABLE `akun_user`
  ADD PRIMARY KEY (`ID_user`);

--
-- Indeks untuk tabel `data_admin`
--
ALTER TABLE `data_admin`
  ADD PRIMARY KEY (`Id_kode`);

--
-- Indeks untuk tabel `data_anak`
--
ALTER TABLE `data_anak`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `feedback_table`
--
ALTER TABLE `feedback_table`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun_admin`
--
ALTER TABLE `akun_admin`
  MODIFY `ID_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `akun_user`
--
ALTER TABLE `akun_user`
  MODIFY `ID_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_admin`
--
ALTER TABLE `data_admin`
  MODIFY `Id_kode` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `data_anak`
--
ALTER TABLE `data_anak`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `feedback_table`
--
ALTER TABLE `feedback_table`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
