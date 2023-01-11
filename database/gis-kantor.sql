-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 11 Jan 2023 pada 17.51
-- Versi server: 10.8.3-MariaDB-log
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gis-kantor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kantor`
--

CREATE TABLE `tb_kantor` (
  `id_kantor` int(11) NOT NULL,
  `nama_kantor` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `lat` varchar(20) NOT NULL,
  `long` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kantor`
--

INSERT INTO `tb_kantor` (`id_kantor`, `nama_kantor`, `no_telp`, `alamat`, `lat`, `long`, `deskripsi`, `foto`) VALUES
(1, 'Kantor Aceh', '089673817381', 'AAA', '5.114098616372524', '97.16691901811473', 'Merupakan kantor untuk menyeleksi berkas masyarakat', '1673433404_dc3a28c7dcecb8cf704c.jpg'),
(2, 'Kantor Indonesia', '0836182769', '  Jalan Kuburan No.10  ', '5.115020997204134', '97.16834256029442', 'Merupakan kantor untuk menyeleksi kuburan masyarakat', '1673433832_7e547592925cf8b93abf.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_kantor`
--
ALTER TABLE `tb_kantor`
  ADD PRIMARY KEY (`id_kantor`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_kantor`
--
ALTER TABLE `tb_kantor`
  MODIFY `id_kantor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
