-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23 Apr 2019 pada 21.13
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
(1, 'PT Indukk', 'PT Anakk', '2019-04-23', 60, 5200000, 100000, 10, 50, 200000, 500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `neraca1`
--

CREATE TABLE `neraca1` (
  `id_neraca1` int(11) NOT NULL,
  `id_akuisisi` int(11) NOT NULL,
  `tipe_pt` varchar(50) NOT NULL,
  `tipe_nilai` varchar(100) NOT NULL,
  `kas_n1` double NOT NULL,
  `piutang_n1` double NOT NULL,
  `persediaan_n1` double NOT NULL,
  `perlengkapan_n1` double NOT NULL,
  `bangunan_n1` double NOT NULL,
  `tanah_n1` double NOT NULL,
  `hutang_dagang_n1` double NOT NULL,
  `hutang_obligasi_n1` double NOT NULL,
  `saham_n1` double NOT NULL,
  `agio_saham_n1` double NOT NULL,
  `laba_ditahan_n1` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `neraca1`
--

INSERT INTO `neraca1` (`id_neraca1`, `id_akuisisi`, `tipe_pt`, `tipe_nilai`, `kas_n1`, `piutang_n1`, `persediaan_n1`, `perlengkapan_n1`, `bangunan_n1`, `tanah_n1`, `hutang_dagang_n1`, `hutang_obligasi_n1`, `saham_n1`, `agio_saham_n1`, `laba_ditahan_n1`) VALUES
(1, 1, 'pt_induk', 'nilai_buku', 6600000, 700000, 900000, 7600000, 8000000, 1200000, 2000000, 3700000, 10000000, 5000000, 4300000),
(2, 1, 'pt_induk', 'nilai_pasar', 0, 700000, 1200000, 9800000, 15000000, 11200000, 2000000, 3500000, 0, 0, 0),
(3, 1, 'pt_anak', 'nilai_buku', 200000, 300000, 500000, 2400000, 4000000, 600000, 700000, 1400000, 4000000, 1000000, 900000),
(4, 1, 'pt_anak', 'nilai_pasar', 0, 600000, 600000, 2100000, 5000000, 800000, 1500000, 2000000, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akuisisi`
--
ALTER TABLE `akuisisi`
  ADD PRIMARY KEY (`id_akuisisi`);

--
-- Indexes for table `neraca1`
--
ALTER TABLE `neraca1`
  ADD PRIMARY KEY (`id_neraca1`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akuisisi`
--
ALTER TABLE `akuisisi`
  MODIFY `id_akuisisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `neraca1`
--
ALTER TABLE `neraca1`
  MODIFY `id_neraca1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
