-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17 Jan 2021 pada 13.50
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbeksten`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbjadwal`
--

CREATE TABLE `tbjadwal` (
  `id` int(11) NOT NULL,
  `noJadwal` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `namaPerusahaan` varchar(100) NOT NULL,
  `idKaryawan` varchar(100) NOT NULL,
  `waktu` time NOT NULL,
  `jumlahPeserta` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `buktiUpload` text NOT NULL,
  `status` enum('BELUM','PROSES','SUDAH') NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbjadwal`
--

INSERT INTO `tbjadwal` (`id`, `noJadwal`, `tanggal`, `namaPerusahaan`, `idKaryawan`, `waktu`, `jumlahPeserta`, `keterangan`, `buktiUpload`, `status`, `create_date`, `update_date`) VALUES
(1, '0001-JDWL/2021', '2021-01-17', 'PT Telkom', '2010456897', '15:00:00', 100, 'Sosialisasi ', 'button_runny_nose_sneeze_tissue_coronavirus_symptom_icon_143123.png', 'SUDAH', '2021-01-17 18:58:03', '2021-01-17 19:50:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbkaryawan`
--

CREATE TABLE `tbkaryawan` (
  `id` int(11) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `notelp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbkaryawan`
--

INSERT INTO `tbkaryawan` (`id`, `nik`, `nama`, `email`, `notelp`, `alamat`, `create_date`, `update_date`) VALUES
(1, '2010456897', 'Rian Fadilla', 'rian@gmail.com', '08975689123', 'Lampung', '2020-09-14 12:16:17', '0000-00-00 00:00:00'),
(2, '2015456880', 'Ridho Kurniawan', 'ridho@gmail.com', '08992780990', 'Kemiling, Bandar Lampung', '2020-10-18 19:15:03', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbuser`
--

CREATE TABLE `tbuser` (
  `id` int(11) NOT NULL,
  `idUser` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `userLevel` enum('Admin','Guest') NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbuser`
--

INSERT INTO `tbuser` (`id`, `idUser`, `username`, `password`, `userLevel`, `create_date`, `update_date`) VALUES
(1, '0001/USR', 'admin', '12345', 'Admin', '2021-01-17 00:00:00', '2021-01-17 00:00:00'),
(2, '0002/USR', '2010456897', '123456', 'Guest', '2021-01-17 19:20:08', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbjadwal`
--
ALTER TABLE `tbjadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbkaryawan`
--
ALTER TABLE `tbkaryawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbjadwal`
--
ALTER TABLE `tbjadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbkaryawan`
--
ALTER TABLE `tbkaryawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
