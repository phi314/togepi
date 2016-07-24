-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2016 at 11:58 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nusantec`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(3) NOT NULL AUTO_INCREMENT,
  `id_user` int(3) NOT NULL,
  `nama_client` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `instansi` varchar(30) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `id_user`, `nama_client`, `email`, `instansi`) VALUES
(1, 0, 'Aang Ardam', 'aang.ardam@ymail.com', 'PT Inti');

-- --------------------------------------------------------

--
-- Table structure for table `gsc`
--

CREATE TABLE IF NOT EXISTS `gsc` (
  `id_gsc` int(3) NOT NULL AUTO_INCREMENT,
  `id_proyek` varchar(15) NOT NULL,
  `nama_gsc` varchar(30) NOT NULL,
  `nilai_gsc` int(3) NOT NULL,
  PRIMARY KEY (`id_gsc`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `gsc`
--

INSERT INTO `gsc` (`id_gsc`, `id_proyek`, `nama_gsc`, `nilai_gsc`) VALUES
(1, '', 'Data Communication', 2),
(2, '', 'Distributed Data Processing', 5),
(3, '', 'Performance', 2),
(4, '', 'Heavily Used Configuration', 3),
(5, '', 'Transaction Rate', 4),
(6, '', 'Online Data Entry', 3),
(7, '', 'End-User Efficiency', 3),
(8, '', 'Online Update', 4),
(9, '', 'Complex Process', 4),
(10, '', 'Reusabulity', 5),
(11, '', 'Instalation Ease', 2),
(12, '', 'Operational Ease', 3),
(13, '', 'Multiple Sites', 3),
(14, '', 'Faciliate Change', 2);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `id_jadwal` int(3) NOT NULL AUTO_INCREMENT,
  `id_user` int(3) NOT NULL,
  `id_proyek` varchar(15) NOT NULL,
  `nama_pekerjaan` varchar(50) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_user`, `id_proyek`, `nama_pekerjaan`, `tanggal_mulai`, `tanggal_selesai`) VALUES
(4, 25, 'W020007', 'Desain', '2015-07-14', '2015-08-14'),
(5, 29, 'W020006', 'DB', '2015-04-14', '2015-12-14');

-- --------------------------------------------------------

--
-- Table structure for table `kompleksitas`
--

CREATE TABLE IF NOT EXISTS `kompleksitas` (
  `id_kompleksitas` int(3) NOT NULL AUTO_INCREMENT,
  `id_proyek` varchar(15) NOT NULL,
  `komponen_sistem` varchar(30) NOT NULL,
  `nama_kegiatan` varchar(50) NOT NULL,
  `sederhana` int(5) NOT NULL,
  `menengah` int(5) NOT NULL,
  `komplek` int(5) NOT NULL,
  `total` int(5) NOT NULL,
  PRIMARY KEY (`id_kompleksitas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `kompleksitas`
--

INSERT INTO `kompleksitas` (`id_kompleksitas`, `id_proyek`, `komponen_sistem`, `nama_kegiatan`, `sederhana`, `menengah`, `komplek`, `total`) VALUES
(1, 'W020006', 'INPUT', 'tambah akun', 6, 2, 3, 44);

-- --------------------------------------------------------

--
-- Table structure for table `mitigasi`
--

CREATE TABLE IF NOT EXISTS `mitigasi` (
  `id_mitigasi` int(3) NOT NULL AUTO_INCREMENT,
  `id_resiko` int(3) NOT NULL,
  `id_proyek` varchar(15) NOT NULL,
  `tindakan` text NOT NULL,
  PRIMARY KEY (`id_mitigasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mitigasi`
--

INSERT INTO `mitigasi` (`id_mitigasi`, `id_resiko`, `id_proyek`, `tindakan`) VALUES
(1, 2, '', 'Menambahkan ke pegawai bagian sistem yang pekerjaannya hampir selesai'),
(2, 3, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE IF NOT EXISTS `proyek` (
  `id_proyek` varchar(15) NOT NULL,
  `id_client` int(3) NOT NULL,
  `nama_proyek` varchar(300) NOT NULL,
  `biaya` int(30) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `status` varchar(30) NOT NULL,
  `tgl` date NOT NULL,
  PRIMARY KEY (`id_proyek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`id_proyek`, `id_client`, `nama_proyek`, `biaya`, `tanggal_mulai`, `tanggal_selesai`, `status`, `tgl`) VALUES
('W020006', 1, 'Pembuatan WEB Toko Online', 5000000, '2015-04-14', '2015-12-14', 'Proses', '2016-07-02'),
('W020007', 1, 'Pembuatan WEBSITE', 30000000, '2016-07-05', '2016-07-21', 'Proses', '2016-07-03');

-- --------------------------------------------------------

--
-- Table structure for table `resiko`
--

CREATE TABLE IF NOT EXISTS `resiko` (
  `id_resiko` int(3) NOT NULL AUTO_INCREMENT,
  `id_proyek` varchar(15) NOT NULL,
  `kode_resiko` varchar(10) NOT NULL,
  `jenis_resiko` varchar(30) NOT NULL,
  `deskripsi_resiko` text NOT NULL,
  `porbalitas` float NOT NULL,
  `dampak` float NOT NULL,
  `tinkat_kepentingan` float NOT NULL,
  PRIMARY KEY (`id_resiko`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `resiko`
--

INSERT INTO `resiko` (`id_resiko`, `id_proyek`, `kode_resiko`, `jenis_resiko`, `deskripsi_resiko`, `porbalitas`, `dampak`, `tinkat_kepentingan`) VALUES
(1, 'W020006', 'R1', 'KEBUTUHAN', 'Bisnis model yang dibuat belum fix', 0.5, 0.6, 0.3),
(2, 'W020006', 'R2', 'KEBUTUHAN', 'Penambahan Akun', 0.3, 0.5, 0.15),
(3, 'W020007', 'R1', 'KEBUTUHAN', 'Bisnis model yang dibuat belum fix', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tingkat_kepentingan`
--

CREATE TABLE IF NOT EXISTS `tingkat_kepentingan` (
  `noindex` int(5) NOT NULL AUTO_INCREMENT,
  `id_resiko` int(5) NOT NULL,
  `id_proyek` varchar(15) NOT NULL,
  `porbalitas` float NOT NULL,
  `dampak` float NOT NULL,
  `tingkat_kepentingan` float NOT NULL,
  PRIMARY KEY (`noindex`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tkr`
--

CREATE TABLE IF NOT EXISTS `tkr` (
  `id_tkr` int(3) NOT NULL AUTO_INCREMENT,
  `id_resiko` int(3) NOT NULL,
  `probabilitas` float NOT NULL,
  `dampak` float NOT NULL,
  `tkr` float NOT NULL,
  PRIMARY KEY (`id_tkr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(3) NOT NULL AUTO_INCREMENT,
  `username` char(30) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `status`) VALUES
(25, 'a', '0cc175b9c0f1b6a831c399e269772661', 'admin@gmail.com', 'MANAGER'),
(29, 'artha', '827ccb0eea8a706c4c34a16891f84e7b', 'utha.simarmata@gmail.com', 'MANAGER'),
(30, 'b', '92eb5ffee6ae2fec3ad71c777531578f', 'aang.ardam@ymail.com', 'CEO');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
