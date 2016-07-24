-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 25, 2016 at 03:07 
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nusantec`
--
CREATE DATABASE IF NOT EXISTS `nusantec` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `nusantec`;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
`id_client` int(3) NOT NULL,
  `id_user` int(3) NOT NULL,
  `nama_client` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `instansi` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `id_user`, `nama_client`, `email`, `instansi`) VALUES
(1, 0, 'Aang Ardam', 'aang.ardam@ymail.com', 'PT Inti'),
(2, 0, 'Manager PT. Torche', 'torche.wood@gmail.com', 'PT. Torche');

-- --------------------------------------------------------

--
-- Table structure for table `gsc`
--

CREATE TABLE IF NOT EXISTS `gsc` (
`id` int(3) NOT NULL,
  `nama_gsc` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gsc`
--

INSERT INTO `gsc` (`id`, `nama_gsc`) VALUES
(1, 'Tingkat kompleksitas komunikasi data'),
(2, 'Tingkat kompleksitas pemrosesan data'),
(3, 'Tingkat kompleksitas performansi'),
(4, 'Tingkat kompleksitas konfigurasi'),
(5, 'Tingkat frekuensi pengguna software'),
(6, 'Tingkat frekuensi input data'),
(7, 'Tingkat kemudahan penggunaan bagi user'),
(8, 'Tingkat frekuensi update data'),
(9, 'Tingkat kompleksitas prosesing data'),
(10, 'Tingkat kemungkinan penggunaan kembali/reusable kode program'),
(11, 'Tingkat kemudahan dalam instalasi'),
(12, 'Tingkat kemudahan operasinal software(backup,recovery,dsb)'),
(13, 'Tingkat software dibuat untuk multi organisasi/perusahaan/klien'),
(14, 'Tingkat kompleksitas dalam mengikuti perubahan/fleksibel');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
`id_jadwal` int(3) NOT NULL,
  `id_user` int(3) NOT NULL,
  `id_proyek` varchar(15) NOT NULL,
  `nama_pekerjaan` varchar(50) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
`id_kompleksitas` int(3) NOT NULL,
  `id_proyek` varchar(15) NOT NULL,
  `komponen_sistem` varchar(30) NOT NULL,
  `nama_kegiatan` varchar(50) NOT NULL,
  `sederhana` int(5) NOT NULL,
  `menengah` int(5) NOT NULL,
  `komplek` int(5) NOT NULL,
  `total` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kompleksitas`
--

INSERT INTO `kompleksitas` (`id_kompleksitas`, `id_proyek`, `komponen_sistem`, `nama_kegiatan`, `sederhana`, `menengah`, `komplek`, `total`) VALUES
(1, 'W020006', 'INPUT', 'tambah akun', 6, 2, 3, 44),
(2, 'W020006', 'INPUT', 'CSS & JS', 0, 3, 0, 12);

-- --------------------------------------------------------

--
-- Table structure for table `mitigasi`
--

CREATE TABLE IF NOT EXISTS `mitigasi` (
`id_mitigasi` int(3) NOT NULL,
  `id_resiko` int(3) NOT NULL,
  `id_proyek` varchar(15) NOT NULL,
  `tindakan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
`id` int(11) NOT NULL,
  `kode_proyek` varchar(15) NOT NULL,
  `id_client` int(3) NOT NULL,
  `nama_proyek` varchar(300) NOT NULL,
  `tujuan` varchar(500) NOT NULL,
  `asal_muasal` varchar(1000) NOT NULL,
  `fase` varchar(500) NOT NULL,
  `biaya` int(30) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `status` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`id`, `kode_proyek`, `id_client`, `nama_proyek`, `tujuan`, `asal_muasal`, `fase`, `biaya`, `tanggal_mulai`, `tanggal_selesai`, `status`, `created_at`, `updated_at`) VALUES
(5, 'W240716001', 2, 'Sistem Informasi SIPENCATAR Kementrian Perhubungan Republik Indonesia', 'Membuat sistem informasi SIPENCATAR Kementrian Perhubungan Republik Indonesia', 'Kementrian Perhubungan Republik Indonesia membutuhkan sistem informasi ujian online SIPENCATAR (Seleksi Penerimaan Calon Taruna) untuk Kementrian Perhubungan RI. Untuk melakukan seleksi calon taruna secara nasional yang terdiri dari tahap pendaftaran, pembayaran, ujian hingga pengumuman', 'Desain, pengembangan, testing, review, revisi, implementasi, instalasi aplikasi, training penggunaan, serah terima.', 80000000, '2016-07-24', '2016-10-06', 'Proses', '2016-07-24 21:44:50', '2016-07-24 19:58:01');

-- --------------------------------------------------------

--
-- Table structure for table `proyek_cfp`
--

CREATE TABLE IF NOT EXISTS `proyek_cfp` (
`id` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `komponen_sistem` varchar(20) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `sederhana` int(11) NOT NULL,
  `menengah` int(11) NOT NULL,
  `komplek` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek_cfp`
--

INSERT INTO `proyek_cfp` (`id`, `id_proyek`, `komponen_sistem`, `nama_kegiatan`, `sederhana`, `menengah`, `komplek`, `total`) VALUES
(3, 5, 'Input', 'Input Pengelolaan Akun', 5, 0, 0, 15),
(4, 5, 'Input', 'Input Pengelolaan kepegawaian', 4, 0, 0, 12),
(5, 5, 'Input', 'Input Pengelolaan SDM', 3, 0, 0, 9),
(8, 5, 'output', 'Output Data Akun', 0, 0, 2, 14),
(9, 5, 'file logic', 'Entitas Class', 0, 10, 0, 100),
(10, 5, 'output', 'Output Data kepegawaian', 0, 0, 2, 14);

-- --------------------------------------------------------

--
-- Table structure for table `proyek_gsc`
--

CREATE TABLE IF NOT EXISTS `proyek_gsc` (
`id` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `id_gsc` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=166 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek_gsc`
--

INSERT INTO `proyek_gsc` (`id`, `id_proyek`, `id_gsc`, `nilai`) VALUES
(151, 5, 1, 5),
(152, 5, 2, 4),
(153, 5, 3, 4),
(154, 5, 4, 3),
(155, 5, 5, 3),
(156, 5, 6, 3),
(157, 5, 7, 4),
(158, 5, 8, 2),
(159, 5, 9, 4),
(160, 5, 10, 5),
(161, 5, 11, 3),
(162, 5, 12, 3),
(163, 5, 13, 5),
(164, 5, 14, 2);

-- --------------------------------------------------------

--
-- Table structure for table `proyek_stakeholders`
--

CREATE TABLE IF NOT EXISTS `proyek_stakeholders` (
`id` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tugas` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek_stakeholders`
--

INSERT INTO `proyek_stakeholders` (`id`, `id_proyek`, `id_user`, `tugas`, `updated_at`) VALUES
(4, 5, 31, 'CEO', '2016-07-24 15:48:26'),
(5, 5, 32, 'Project Manager', '2016-07-24 15:49:59'),
(7, 5, 33, 'Web Developer', '2016-07-24 15:52:52'),
(8, 5, 34, 'Front End', '2016-07-24 15:53:13'),
(9, 5, 35, 'Front End', '2016-07-24 15:54:41'),
(10, 5, 36, 'Front End', '2016-07-24 15:54:45'),
(11, 5, 37, 'Back End', '2016-07-24 15:54:58'),
(12, 5, 38, 'Back End', '2016-07-24 15:55:08'),
(13, 5, 39, 'Back End', '2016-07-24 15:55:21'),
(14, 5, 40, 'Lainnya', '2016-07-24 15:56:01'),
(15, 5, 41, 'Lainnya', '2016-07-24 15:56:05');

-- --------------------------------------------------------

--
-- Table structure for table `resiko`
--

CREATE TABLE IF NOT EXISTS `resiko` (
`id_resiko` int(3) NOT NULL,
  `id_proyek` varchar(15) NOT NULL,
  `kode_resiko` varchar(10) NOT NULL,
  `jenis_resiko` varchar(30) NOT NULL,
  `deskripsi_resiko` text NOT NULL,
  `porbalitas` float NOT NULL,
  `dampak` float NOT NULL,
  `tinkat_kepentingan` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
`noindex` int(5) NOT NULL,
  `id_resiko` int(5) NOT NULL,
  `id_proyek` varchar(15) NOT NULL,
  `porbalitas` float NOT NULL,
  `dampak` float NOT NULL,
  `tingkat_kepentingan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tkr`
--

CREATE TABLE IF NOT EXISTS `tkr` (
`id_tkr` int(3) NOT NULL,
  `id_resiko` int(3) NOT NULL,
  `probabilitas` float NOT NULL,
  `dampak` float NOT NULL,
  `tkr` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(3) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` char(30) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `email`, `status`) VALUES
(25, '', 'a', '0cc175b9c0f1b6a831c399e269772661', 'admin@gmail.com', 'MANAGER'),
(29, '', 'artha', 'f0975651f100c3dce5139e954fa4c010', 'utha.simarmata@gmail.com', 'MANAGER'),
(30, '', 'b', '92eb5ffee6ae2fec3ad71c777531578f', 'aang.ardam@ymail.com', 'CEO'),
(31, 'Nicolas Ruslim', 'nicolas', 'deb97a759ee7b8ba42e02dddf2b412fe', 'nicolas.ruslim@gmail.com', 'CEO'),
(32, 'Raosan Fikri', 'raosan', 'e3300dec5df451432dc6e2b92d60987c', 'raosan.fikri@gmail.com', 'MANAGER'),
(33, 'Sigit Nurhanafi', 'sigit', '223a0fa8f15933d622b3c7a13f186027', 'sigit.nurhanafi@gmail.com', 'DEVELOPER'),
(34, 'Supriadi', 'supriadi', 'eeaaed26b457c6348cc6728e3f065d9b', 'supriadi@gmail.com', 'DEVELOPER'),
(35, 'Muri', 'muri', 'd7e105f229977b191b020897a1255ae3', 'muri@gmail.com', 'DEVELOPER'),
(36, 'Rifki', 'rifki', '2a5c4c5a5ba1c332279685ddec507cd9', 'rifki@gmail.com', 'DEVELOPER'),
(37, 'Ahmad Karlam', 'ahmad', '61243c7b9a4022cb3f8dc3106767ed12', 'ahmad.karlam@gmail.com', 'DEVELOPER'),
(38, 'Wildan Angga', 'wildan', 'af6b3aa8c3fcd651674359f500814679', 'wildan.angga@gmail.com', 'DEVELOPER'),
(39, 'Habibie Faried', 'habibie', 'b78d1da50c76a50c0786d4ec5a0f5f86', 'habibie.farid@gmail.com', 'DEVELOPER'),
(40, 'Edi Rohaedi', 'edi', '8457dff5491b024de6b03e30b609f7e8', 'edi.rohaedi@gmail.com', 'DEVELOPER'),
(41, 'Antonio Sitorus', 'antonio', '4a181673429f0b6abbfd452f0f3b5950', 'antonio.sitorus@gmail.com', 'DEVELOPER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
 ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `gsc`
--
ALTER TABLE `gsc`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
 ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `kompleksitas`
--
ALTER TABLE `kompleksitas`
 ADD PRIMARY KEY (`id_kompleksitas`);

--
-- Indexes for table `mitigasi`
--
ALTER TABLE `mitigasi`
 ADD PRIMARY KEY (`id_mitigasi`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proyek_cfp`
--
ALTER TABLE `proyek_cfp`
 ADD PRIMARY KEY (`id`), ADD KEY `id_proyek` (`id_proyek`);

--
-- Indexes for table `proyek_gsc`
--
ALTER TABLE `proyek_gsc`
 ADD PRIMARY KEY (`id`), ADD KEY `id_proyek` (`id_proyek`,`id_gsc`);

--
-- Indexes for table `proyek_stakeholders`
--
ALTER TABLE `proyek_stakeholders`
 ADD PRIMARY KEY (`id`), ADD KEY `id_user` (`id_user`), ADD KEY `id_proyek` (`id_proyek`);

--
-- Indexes for table `resiko`
--
ALTER TABLE `resiko`
 ADD PRIMARY KEY (`id_resiko`);

--
-- Indexes for table `tingkat_kepentingan`
--
ALTER TABLE `tingkat_kepentingan`
 ADD PRIMARY KEY (`noindex`);

--
-- Indexes for table `tkr`
--
ALTER TABLE `tkr`
 ADD PRIMARY KEY (`id_tkr`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
MODIFY `id_client` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gsc`
--
ALTER TABLE `gsc`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
MODIFY `id_jadwal` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kompleksitas`
--
ALTER TABLE `kompleksitas`
MODIFY `id_kompleksitas` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mitigasi`
--
ALTER TABLE `mitigasi`
MODIFY `id_mitigasi` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `proyek_cfp`
--
ALTER TABLE `proyek_cfp`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `proyek_gsc`
--
ALTER TABLE `proyek_gsc`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=166;
--
-- AUTO_INCREMENT for table `proyek_stakeholders`
--
ALTER TABLE `proyek_stakeholders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `resiko`
--
ALTER TABLE `resiko`
MODIFY `id_resiko` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tingkat_kepentingan`
--
ALTER TABLE `tingkat_kepentingan`
MODIFY `noindex` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tkr`
--
ALTER TABLE `tkr`
MODIFY `id_tkr` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
