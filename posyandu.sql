-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Nov 2022 pada 11.16
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posyandu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_admin`
--

CREATE TABLE `akun_admin` (
  `ID` int(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `psw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_user`
--

CREATE TABLE `akun_user` (
  `ID` int(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `psw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun_user`
--

INSERT INTO `akun_user` (`ID`, `email`, `username`, `psw`) VALUES
(2, 'benabana78b@gmail.com', 'user1', '$2y$10$6wr/9znq8YVVQHvOcPOna.4YEx/VtHFIwodTRxFyv.6FK4Qhoygd.'),
(3, 'ilhamrmdluy@gmail.com', 'user2', '$2y$10$cbjT3O3OZnIlJPmWHYgSheBTDO5WO.F81n.xpVIWp0X0tiG/Cc2Le'),
(4, 'benabana78b@gmail.com', 'Rmdluy', '$2y$10$uZa5B6vGhngkec9/HaKbsuvu02wr532DIs0gqza0eEZghqegYRTLG'),
(5, 'ilhamrmdluy@gmail.com', 'BuahDada', '$2y$10$0iLdG5lI6yBceC6wVFSl..B0UvSdarMi73J40RLvjDo66t5MU7U8C'),
(6, 'ilhamrmdluy@gmail.com', 'user11', '$2y$10$BifLPUOC2eb00jt0B7614uBoiuGFjMqbykCP4jLIE1ZEnfU/vCyui');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun_admin`
--
ALTER TABLE `akun_admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `akun_user`
--
ALTER TABLE `akun_user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun_admin`
--
ALTER TABLE `akun_admin`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `akun_user`
--
ALTER TABLE `akun_user`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
