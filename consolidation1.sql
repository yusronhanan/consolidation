-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23 Apr 2019 pada 06.56
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `consolidation1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akuisisi`
--

CREATE TABLE `akuisisi` (
  `id_akuisisi` int(11) NOT NULL,
  `pt_induk` varchar(50) NOT NULL,
  `pt_anak` varchar(50) NOT NULL,
  `tgl_akuisisi` date NOT NULL,
  `persen_akuisisi` double NOT NULL,
  `kas_metode` double NOT NULL,
  `lembar_saham` double NOT NULL,
  `nilai_par` double NOT NULL,
  `nilai_pasar` double NOT NULL,
  `beban_invest` double NOT NULL,
  `agio_saham` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akuisisi`
--

INSERT INTO `akuisisi` (`id_akuisisi`, `pt_induk`, `pt_anak`, `tgl_akuisisi`, `persen_akuisisi`, `kas_metode`, `lembar_saham`, `nilai_par`, `nilai_pasar`, `beban_invest`, `agio_saham`) VALUES
(1, 'PT Induk', 'PT Anak', '2019-04-24', 60, 5200000, 100000, 10, 50, 200000, 500000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akuisisi`
--
ALTER TABLE `akuisisi`
  ADD PRIMARY KEY (`id_akuisisi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akuisisi`
--
ALTER TABLE `akuisisi`
  MODIFY `id_akuisisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
