-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2016 at 01:37 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `id_anggota` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `ktp` varchar(20) NOT NULL,
  `tmpt_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kordinator` varchar(20) NOT NULL,
  `telpon` varchar(14) NOT NULL,
  `date_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `ktp`, `tmpt_lahir`, `tgl_lahir`, `alamat`, `kordinator`, `telpon`, `date_input`) VALUES
('9205000001', 'Wanto', '-', '-', '0000-00-00', '-', 'Lasiman', '-', '2016-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE IF NOT EXISTS `angsuran` (
  `id_ang` varchar(5) NOT NULL,
  `id_pin` varchar(10) NOT NULL,
  `tgl_ang` date NOT NULL,
  `jum_ang` double NOT NULL,
  `ket` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(4) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `folder` varchar(30) DEFAULT NULL,
  `link` varchar(45) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `parent` int(4) DEFAULT NULL,
  `icon` varchar(45) DEFAULT NULL,
  `urut` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `title`, `folder`, `link`, `level`, `parent`, `icon`, `urut`) VALUES
(1, 'Koperasi', '#', '#', 'HRD', 0, 'glyphicon glyphicon-shopping-cart', 1),
(3, 'anggota', 'anggota', 'anggota', 'HRD', 7, 'glyphicon glyphicon-user', 2),
(4, 'Data Pinjaman', 'pinjaman', 'pinjaman', 'DIVISI', 1, 'glyphicon glyphicon-send', 2),
(7, 'Master', 'Master', '#', 'HRD', 0, 'glyphicon glyphicon-link', 1),
(8, 'menu', 'menu', 'menu', 'HRD', 7, 'glyphicon glyphicon-paperclip', 0),
(9, 'Data Angusran', 'angsuran', 'angsuran', 'HRD', 11, 'glyphicon glyphicon-shopping-cart', 3),
(10, 'Data Pengajuan', 'pinjaman', 'pengajuan', 'HRD', 1, 'glyphicon glyphicon-link', 1),
(11, 'Report', '#', '#', 'HRD', 0, 'glyphicon glyphicon-print', 3),
(12, 'Mutasi Koperasi', 'laporan', 'mutasi', 'HRD', 11, 'glyphicon glyphicon-stats', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE IF NOT EXISTS `pinjaman` (
  `id_pin` varchar(10) NOT NULL,
  `id_anggota` varchar(10) NOT NULL,
  `tgl_pin` date NOT NULL,
  `tgl_acc` date NOT NULL,
  `jumlah` double NOT NULL,
  `jumlah_acc` double NOT NULL,
  `jumlah_pot` double NOT NULL,
  `jumlah_adm` double NOT NULL,
  `ket` varchar(100) NOT NULL,
  `acc` varchar(5) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`id_pin`, `id_anggota`, `tgl_pin`, `tgl_acc`, `jumlah`, `jumlah_acc`, `jumlah_pot`, `jumlah_adm`, `ket`, `acc`, `status`) VALUES
('0514000001', '9205000001', '2016-12-03', '0000-00-00', 300000, 300000, 100000, 15000, '-', 'N', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(9) NOT NULL,
  `nm_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `telp` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `date_reg` date NOT NULL,
  `password` varchar(150) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nm_lengkap`, `email`, `telp`, `level`, `date_reg`, `password`) VALUES
(201383087, 'Hendri Y', 'hendrimamang@gmail.com3', '085715887703', 'ADMIN', '2014-05-01', '202cb962ac59075b964b07152d234b70'),
(201383088, 'Richard', 'admin@ivendor.co.id', '0215902758', 'DIVISI', '2015-07-24', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
 ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
 ADD PRIMARY KEY (`id_ang`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
 ADD PRIMARY KEY (`id_pin`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
