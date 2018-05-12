-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 04, 2018 at 04:54 PM
-- Server version: 10.1.30-MariaDB-0ubuntu0.17.10.1
-- PHP Version: 7.1.11-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ar_pekanbaru`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_notifikasi_kegiatan`
--

CREATE TABLE `tb_notifikasi_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `sudah_dibaca` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_notifikasi_kegiatan`
--

INSERT INTO `tb_notifikasi_kegiatan` (`id_kegiatan`, `sudah_dibaca`, `kategori`) VALUES
(4, 1, ''),
(4, 1, ''),
(8, 1, ''),
(9, 1, ''),
(10, 1, ''),
(12, 1, ''),
(13, 1, ''),
(14, 1, ''),
(15, 1, ''),
(15, 0, ''),
(8, 0, 'Provinsi'),
(20, 0, 'Kabkota'),
(20, 0, 'Kabkota'),
(20, 0, 'Kabkota'),
(20, 0, 'Kabkota'),
(20, 0, 'Kabkota'),
(26, 0, 'Kabkota'),
(27, 0, 'Kabkota'),
(28, 0, 'Kabkota'),
(8, 0, 'Provinsi'),
(9, 0, 'Provinsi'),
(10, 0, 'Provinsi'),
(10, 0, 'Provinsi'),
(10, 0, 'Provinsi'),
(10, 0, 'Provinsi'),
(10, 0, 'Provinsi'),
(10, 0, 'Provinsi'),
(28, 0, 'Kabkota'),
(10, 0, 'Provinsi'),
(28, 0, 'Kabkota'),
(29, 0, 'Kabkota'),
(29, 0, 'Kabkota'),
(29, 0, 'Kabkota'),
(10, 0, 'Provinsi'),
(10, 0, 'Provinsi'),
(10, 0, 'Provinsi'),
(10, 0, 'Provinsi'),
(12, 0, 'Provinsi'),
(13, 0, 'Provinsi'),
(13, 0, 'Provinsi'),
(14, 0, 'Provinsi'),
(15, 0, 'Provinsi'),
(15, 0, 'Provinsi'),
(26, 0, 'Provinsi'),
(27, 0, 'Provinsi'),
(27, 0, 'Provinsi'),
(27, 0, 'Provinsi'),
(29, 0, 'Provinsi'),
(29, 0, 'Provinsi'),
(30, 0, 'Kabkota'),
(31, 0, 'Kabkota');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_notifikasi_kegiatan`
--
ALTER TABLE `tb_notifikasi_kegiatan`
  ADD KEY `FK_notifKegiatan` (`id_kegiatan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_notifikasi_kegiatan`
--
ALTER TABLE `tb_notifikasi_kegiatan`
  ADD CONSTRAINT `FK_notifKegiatan` FOREIGN KEY (`id_kegiatan`) REFERENCES `tb_kegiatan_kabkota` (`id_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
