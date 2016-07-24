-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 02, 2014 at 12:33 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tiket`
--

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `id_kota` varchar(10) NOT NULL,
  `nama_kota` varchar(30) NOT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`) VALUES
('BDO', 'BANDUNG'),
('BPN', 'BALIKPAPAN'),
('BTH', 'BATAM'),
('BTJ', 'BANDA ACEH'),
('CGK', 'JAKARTA'),
('DPS', 'BALI'),
('KNO', 'MEDAN'),
('LOP', 'LOMBOK'),
('MDC', 'MANADO'),
('PKU', 'PEKANBARU'),
('PLM', 'PALEMBANG'),
('SOC', 'SOLO'),
('SRG', 'SEMARANG'),
('SUB', 'SURABAYA'),
('UPG', 'MAKASSAR');

-- --------------------------------------------------------

--
-- Table structure for table `maskapai`
--

CREATE TABLE IF NOT EXISTS `maskapai` (
  `id_maskapai` varchar(10) NOT NULL,
  `nama_maskapai` varchar(30) NOT NULL,
  PRIMARY KEY (`id_maskapai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maskapai`
--

INSERT INTO `maskapai` (`id_maskapai`, `nama_maskapai`) VALUES
('1', 'GARUDA INDONESIA'),
('2', 'LION AIR'),
('3', 'MERPATI NUSANTARA AIRLINES'),
('4', 'SRIWIJAYA AIR'),
('5', 'CITILINK'),
('6', 'BATAVIA');

-- --------------------------------------------------------

--
-- Table structure for table `tikett`
--

CREATE TABLE IF NOT EXISTS `tikett` (
  `penerbangan` varchar(10) NOT NULL,
  `waktu_berangkat` varchar(30) NOT NULL,
  `waktu_tiba` varchar(30) NOT NULL,
  `durasi` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `harga_tiket` varchar(30) NOT NULL,
  PRIMARY KEY (`penerbangan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tikett`
--

INSERT INTO `tikett` (`penerbangan`, `waktu_berangkat`, `waktu_tiba`, `durasi`, `tanggal`, `harga_tiket`) VALUES
('JT-200', '11:00 ', '13:20', '2 JAM 20 MENIT', '0000-00-00', 'Rp 560.000,-'),
('JT-201', '11:00 ', '15:00', '2 JAM 20 MENIT', '0000-00-00', 'Rp 600.000,-'),
('JT-299', '11:00 ', '13:20', '2 JAM 20 MENIT', '0000-00-00', 'Rp 1.100.000,-');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `status`) VALUES
('felix', 'felix', 'admin');
