-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 16, 2016 at 11:25 
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
`id_client` int(11) NOT NULL,
  `nama_client` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `instansi` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `nama_client`, `email`, `instansi`) VALUES
(1, 'Aang Ardam', 'aang.ardam@ymail.com', 'PT Inti'),
(2, 'Manager PT. Torche', 'torche.wood@gmail.com', 'PT. Torche'),
(3, 'asdf', 'ahmad.karlam@gmail.com', 'asd');

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
  `tarif_tenaga_kerja` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`id`, `kode_proyek`, `id_client`, `nama_proyek`, `tujuan`, `asal_muasal`, `fase`, `biaya`, `tanggal_mulai`, `tanggal_selesai`, `status`, `tarif_tenaga_kerja`, `created_at`, `updated_at`) VALUES
(5, 'W240716001', 2, 'Sistem Informasi SIPENCATAR Kementrian Perhubungan Republik Indonesia', 'Membuat sistem informasi SIPENCATAR Kementrian Perhubungan Republik Indonesia', 'Kementrian Perhubungan Republik Indonesia membutuhkan sistem informasi ujian online SIPENCATAR (Seleksi Penerimaan Calon Taruna) untuk Kementrian Perhubungan RI. Untuk melakukan seleksi calon taruna secara nasional yang terdiri dari tahap pendaftaran, pembayaran, ujian hingga pengumuman', 'Desain, pengembangan, testing, review, revisi, implementasi, instalasi aplikasi, training penggunaan, serah terima.', 80000000, '2016-07-24', '2016-10-06', 'Proses', 6600000, '2016-07-24 21:44:50', '2016-08-07 15:08:35'),
(6, 'W110816002', 1, 'A', '', '', '', 10000000, '2016-08-17', '2016-08-31', 'Proses', 0, '2016-08-11 02:22:06', '2016-08-10 19:22:06');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek_cfp`
--

INSERT INTO `proyek_cfp` (`id`, `id_proyek`, `komponen_sistem`, `nama_kegiatan`, `sederhana`, `menengah`, `komplek`, `total`) VALUES
(3, 5, 'Input', 'Input Pengelolaan Akun', 5, 0, 0, 15),
(4, 5, 'Input', 'Input Pengelolaan kepegawaian', 4, 0, 0, 12),
(5, 5, 'Input', 'Input Pengelolaan SDM', 3, 0, 0, 9),
(8, 5, 'output', 'Output Data Akun', 0, 0, 2, 14),
(10, 5, 'output', 'Output Data kepegawaian', 0, 0, 2, 14),
(11, 5, 'file logic', 'Data base file', 0, 0, 1, 15),
(12, 5, 'file logic', 'Entitas Class', 0, 10, 0, 100);

-- --------------------------------------------------------

--
-- Table structure for table `proyek_evm`
--

CREATE TABLE IF NOT EXISTS `proyek_evm` (
`id` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `tipe` varchar(10) NOT NULL,
  `bobot` float NOT NULL,
  `cost` float NOT NULL,
  `minggu` int(11) NOT NULL,
  `periode_start` datetime NOT NULL,
  `periode_end` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek_evm`
--

INSERT INTO `proyek_evm` (`id`, `id_proyek`, `tipe`, `bobot`, `cost`, `minggu`, `periode_start`, `periode_end`) VALUES
(1, 5, 'bcws', 5, 4000000, 1, '2016-08-27 00:00:00', '2016-09-02 00:00:00'),
(2, 5, 'bcws', 8, 6400000, 2, '2016-09-03 00:00:00', '2016-09-09 00:00:00'),
(3, 5, 'bcws', 10, 8000000, 3, '2016-09-10 00:00:00', '2016-09-16 00:00:00'),
(4, 5, 'bcws', 10, 8000000, 4, '2016-09-17 00:00:00', '2016-09-23 00:00:00'),
(5, 5, 'bcws', 10, 8000000, 5, '2016-09-24 00:00:00', '2016-09-30 00:00:00'),
(6, 5, 'bcwp', 3, 2400000, 1, '2016-08-27 00:00:00', '2016-09-02 00:00:00'),
(7, 5, 'bcwp', 8, 6400000, 2, '2016-09-03 00:00:00', '2016-09-09 00:00:00'),
(8, 5, 'bcwp', 8, 6400000, 3, '2016-09-10 00:00:00', '2016-09-16 00:00:00'),
(9, 5, 'bcwp', 8, 6400000, 4, '2016-09-17 00:00:00', '2016-09-23 00:00:00'),
(10, 5, 'bcwp', 8, 6400000, 5, '2016-09-24 00:00:00', '2016-09-30 00:00:00'),
(11, 5, 'acwp', 0, 6600000, 1, '2016-08-27 00:00:00', '2016-09-02 00:00:00'),
(12, 5, 'acwp', 0, 7000000, 2, '2016-09-03 00:00:00', '2016-09-09 00:00:00'),
(13, 5, 'acwp', 0, 6600000, 3, '2016-09-10 00:00:00', '2016-09-16 00:00:00'),
(14, 5, 'acwp', 0, 7000000, 4, '2016-09-17 00:00:00', '2016-09-23 00:00:00'),
(15, 5, 'acwp', 0, 6600000, 5, '2016-09-24 00:00:00', '2016-09-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `proyek_gsc`
--

CREATE TABLE IF NOT EXISTS `proyek_gsc` (
`id` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `id_gsc` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=latin1;

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
-- Table structure for table `proyek_pekerjaan`
--

CREATE TABLE IF NOT EXISTS `proyek_pekerjaan` (
`id` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `have_child` tinyint(1) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `bobot_bcws` float NOT NULL,
  `bobot_bcwp` float NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'belum',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek_pekerjaan`
--

INSERT INTO `proyek_pekerjaan` (`id`, `id_proyek`, `nama`, `tanggal_mulai`, `tanggal_selesai`, `have_child`, `parent`, `bobot_bcws`, `bobot_bcwp`, `status`, `created_at`, `updated_at`) VALUES
(3, 5, 'Perancangan', '2016-08-27', '2016-08-27', 1, 0, 2, 0, 'belum', '2016-07-25 09:53:29', '2016-08-15 16:51:37'),
(4, 5, 'Perancangan Arsitektur', '2016-08-27', '2016-08-27', 0, 3, 1.5, 2, 'sudah', '2016-07-25 10:09:31', '2016-08-15 17:13:25'),
(5, 5, 'Perancangan Basis Data', '2016-08-28', '2016-08-29', 0, 3, 1.5, 1.5, 'sudah', '2016-07-25 10:10:03', '2016-08-15 17:13:11'),
(6, 5, 'Perancangan Antar muka', '2016-08-31', '2016-09-02', 0, 3, 2, 1.5, 'sudah', '2016-07-25 10:11:14', '2016-08-15 17:13:19'),
(7, 5, 'Pembangunan', '2016-09-03', '2016-10-30', 1, NULL, 0, 0, 'belum', '2016-07-25 10:12:07', '2016-07-25 03:32:18'),
(8, 5, 'Testing', '2016-10-30', '2016-10-30', 0, NULL, 0, 0, 'belum', '2016-07-25 10:14:14', '2016-07-25 03:32:29'),
(9, 5, 'Review', '2016-10-31', '2016-10-31', 0, NULL, 0, 0, 'belum', '2016-07-25 10:14:49', '2016-07-25 03:32:28'),
(10, 5, 'Implementasi', '2016-11-04', '2016-11-06', 0, NULL, 0, 0, 'belum', '2016-07-25 10:15:24', '2016-07-25 03:32:25'),
(11, 5, 'Training Penggunaan', '2016-11-07', '2016-11-09', 0, NULL, 0, 0, 'belum', '2016-07-25 10:15:54', '2016-07-25 03:32:24'),
(12, 5, 'Serah Terima', '2016-11-10', '2016-11-10', 0, NULL, 0, 0, 'belum', '2016-07-25 10:16:24', '2016-07-25 03:32:22'),
(13, 5, 'Penerapan Fungsional Pengelolaan Login', '2016-09-03', '2016-09-05', 0, 7, 0, 0, 'sudah', '2016-07-25 10:19:01', '2016-07-30 03:23:12'),
(14, 5, 'Penerapan fungsional Pengelolaan Bahasa', '2016-09-05', '2016-09-05', 0, 7, 0, 0, 'sudah', '2016-07-25 10:35:11', '2016-07-30 03:33:14'),
(15, 5, 'Penerapan fungsional Pengelolaan Surat', '2016-09-07', '2016-09-07', 0, 7, 0, 0, 'sudah', '2016-07-26 22:14:34', '2016-07-30 03:33:26'),
(16, 5, 'Penerapan fungsional Pengelolaan Peta', '2016-09-08', '2016-09-09', 0, 7, 0, 0, 'sudah', '2016-07-26 22:16:21', '2016-07-30 03:33:34'),
(17, 5, 'Penerapan fungsional Pengelolaan Pencarian', '2016-09-10', '2016-09-11', 0, 7, 0, 0, 'sedang', '2016-07-26 22:17:07', '2016-07-30 03:33:42'),
(18, 5, 'Penerapan Antarmuka Pengelolaan login', '2016-09-11', '2016-09-11', 0, 7, 0, 0, 'sudah', '2016-07-26 22:17:33', '2016-08-15 17:19:46'),
(19, 5, 'Penerapan Antarmuka Pengelolaan Bahasa', '2016-09-12', '2016-09-12', 0, 7, 0, 0, 'belum', '2016-07-26 22:17:49', '2016-07-26 15:17:49'),
(20, 5, 'Penerapan Antarmuka Pengelolaan Surat', '2016-09-14', '2016-09-14', 0, 7, 0, 0, 'belum', '2016-07-26 22:18:08', '2016-07-26 15:18:08'),
(21, 5, 'Penerapan Antarmuka Pengelolaan Peta', '2016-09-15', '2016-09-15', 0, 7, 0, 0, 'belum', '2016-07-26 22:18:24', '2016-07-26 15:19:51'),
(22, 5, 'Penerapan Antarmuka Pengelolaan Pencarian', '2016-09-16', '2016-09-17', 0, 7, 0, 0, 'belum', '2016-07-26 22:18:45', '2016-07-26 15:18:45'),
(23, 5, 'Penerapan Fungsional Pengelolaan Home', '2016-09-18', '2016-09-18', 0, 7, 0, 0, 'belum', '2016-07-26 22:19:06', '2016-07-26 15:19:06'),
(24, 5, 'Pengelolaan Halaman BPSDM', '2016-09-19', '2016-09-19', 0, 7, 0, 0, 'belum', '2016-07-26 22:19:25', '2016-07-26 15:19:56'),
(25, 5, 'Pengelolaan Halaman Visi', '2016-09-21', '2016-09-21', 0, 7, 0, 0, 'belum', '2016-07-26 22:19:44', '2016-07-26 15:19:44'),
(26, 5, 'Pengelolaan Halaman Tugas Pokok', '2016-09-22', '2016-09-22', 0, 7, 0, 0, 'belum', '2016-07-26 22:20:36', '2016-07-26 15:20:36'),
(27, 5, 'Pengelolaan Halaman Struktur Org', '2016-10-24', '2016-10-24', 0, 7, 0, 0, 'belum', '2016-07-26 22:20:47', '2016-07-26 15:40:35'),
(28, 5, 'Pengelolaan Halaman Pimpinan', '2016-09-25', '2016-09-25', 0, 7, 0, 0, 'belum', '2016-07-26 22:21:02', '2016-07-26 15:22:54'),
(29, 5, 'Pengelolaan Halaman Rencana Strategis', '2016-09-26', '2016-09-26', 0, 7, 0, 0, 'belum', '2016-07-26 22:21:17', '2016-07-26 15:21:17'),
(30, 5, 'Pengelolaan Halaman Video', '2016-09-28', '2016-09-28', 0, 7, 0, 0, 'belum', '2016-07-26 22:21:31', '2016-07-26 15:21:31'),
(31, 5, 'Pengelolaan Halaman Upt', '2016-09-29', '2016-09-29', 0, 7, 0, 0, 'belum', '2016-07-26 22:21:44', '2016-07-26 15:21:44'),
(32, 5, 'Pengelolaan Halaman Struktut Org Upt', '2016-09-30', '2016-10-01', 0, 7, 0, 0, 'belum', '2016-07-26 22:21:58', '2016-07-26 15:21:58'),
(33, 5, 'Penerapan Antarmuka Pengelolaan Home', '2016-10-02', '2016-10-03', 0, 7, 0, 0, 'belum', '2016-07-26 22:22:17', '2016-07-26 15:23:00'),
(34, 5, 'Penerapan Fungsional Pengelolaan Profil', '2016-10-05', '2016-10-05', 0, 7, 0, 0, 'belum', '2016-07-26 22:22:48', '2016-07-26 15:22:48'),
(35, 5, 'Pengelolaan Halaman Berita', '2016-10-05', '2016-10-05', 0, 7, 0, 0, 'belum', '2016-07-26 22:23:45', '2016-07-26 15:23:45'),
(36, 5, 'Pengelolaan Halaman Berita bpsdm', '2016-10-06', '2016-10-06', 0, 7, 0, 0, 'belum', '2016-07-26 22:24:04', '2016-07-26 15:24:04'),
(37, 5, 'Pengelolaan Halaman Berita Kemenhub', '2016-10-07', '2016-10-07', 0, 7, 0, 0, 'belum', '2016-07-26 22:24:14', '2016-07-26 15:25:50'),
(38, 5, 'Pengelolaan Halaman Berita Video', '2016-10-08', '2016-10-08', 0, 7, 0, 0, 'belum', '2016-07-26 22:25:33', '2016-07-26 15:25:33'),
(39, 5, 'Pengelolaan Halaman Siaran Pers', '2016-10-09', '2016-10-09', 0, 7, 0, 0, 'belum', '2016-07-26 22:25:46', '2016-07-26 15:25:46'),
(40, 5, 'Penerapan Antarmuka Pengelolaan Profil', '2016-10-10', '2016-10-12', 0, 7, 0, 0, 'belum', '2016-07-26 22:26:01', '2016-07-26 15:34:53'),
(41, 5, 'Penerapan Fungsional  Pengelolaan Layanan Publik', '2016-10-17', '2016-10-17', 0, 7, 0, 0, 'belum', '2016-07-26 22:26:11', '2016-07-26 15:36:20'),
(42, 5, 'Penerapan Fungsional Pengelolaan Info Pengadaan', '2016-10-13', '2016-10-13', 0, 7, 0, 0, 'belum', '2016-07-26 22:26:34', '2016-07-26 15:33:17'),
(43, 5, 'Penerapan Fungsional Pengelolaan Kontak', '2016-10-15', '2016-10-15', 0, 7, 0, 0, 'belum', '2016-07-26 22:27:00', '2016-07-26 15:27:00'),
(44, 5, 'Penerapan Fungsional Pengelolaan Forum', '2016-10-15', '2016-10-16', 0, 7, 0, 0, 'belum', '2016-07-26 22:27:24', '2016-07-26 15:27:24'),
(45, 5, 'Penerapan Antarmuka Pengelolaan Layanan Publik ', '2016-10-17', '2016-10-17', 0, 7, 0, 0, 'belum', '2016-07-26 22:27:37', '2016-07-26 15:27:37'),
(46, 5, 'Penerapan Antarmuka Pengelolaan Info Pengadaan', '2016-10-19', '2016-10-19', 0, 7, 0, 0, 'belum', '2016-07-26 22:27:52', '2016-07-26 15:27:52'),
(47, 5, 'Penerapan Antarmuka Pengelolaan Kontak ', '2016-10-20', '2016-10-20', 0, 7, 0, 0, 'belum', '2016-07-26 22:28:06', '2016-07-26 15:28:06'),
(48, 5, 'Penerapan Antarmuka Pengelolaan Forum', '2016-10-21', '2016-10-22', 0, 7, 0, 0, 'belum', '2016-07-26 22:28:22', '2016-07-26 15:28:22'),
(49, 5, 'Penerapan fungsional Pengelolaan Info Publik', '2016-10-22', '2016-10-22', 0, 7, 0, 0, 'belum', '2016-07-26 22:28:34', '2016-07-26 15:28:34'),
(50, 5, 'Pengelolaan Halaman Dasar Hukum', '2016-10-23', '2016-10-23', 0, 7, 0, 0, 'belum', '2016-07-26 22:28:46', '2016-07-26 15:28:46'),
(51, 5, 'Pengelolaan Halaman Prosedur Permohonan', '2016-10-26', '2016-10-26', 0, 7, 0, 0, 'belum', '2016-07-26 22:29:12', '2016-07-26 15:29:12'),
(52, 5, 'Pengelolaan Halaman Kontak PPID', '2016-10-27', '2016-10-27', 0, 7, 0, 0, 'belum', '2016-07-26 22:29:26', '2016-07-26 15:29:26'),
(53, 5, 'Pengelolaan Halaman FAQ', '2016-10-28', '2016-10-28', 0, 7, 0, 0, 'belum', '2016-07-26 22:29:40', '2016-07-26 15:29:40'),
(54, 5, 'Penerapan Antarmuka Pengelolaan Info Publik', '2016-10-29', '2016-10-30', 0, 7, 0, 0, 'belum', '2016-07-26 22:29:54', '2016-07-26 15:31:04'),
(55, 5, 'Revisi', '2016-11-02', '2016-11-03', 0, 0, 0, 0, 'belum', '2016-07-26 22:41:32', '2016-07-26 15:49:40'),
(56, 6, 'a', '2016-08-17', '2016-08-19', 0, 0, 2, 0, 'sedang', '2016-08-11 02:22:32', '2016-08-15 15:09:22'),
(57, 6, 'b', '2016-08-19', '2016-08-20', 0, 0, 2, 0, 'belum', '2016-08-11 02:22:44', '2016-08-10 19:22:44');

-- --------------------------------------------------------

--
-- Table structure for table `proyek_pekerjaan_stakeholder`
--

CREATE TABLE IF NOT EXISTS `proyek_pekerjaan_stakeholder` (
`id` int(11) NOT NULL,
  `id_pekerjaan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `raci` enum('r','a','c','i') NOT NULL DEFAULT 'r'
) ENGINE=InnoDB AUTO_INCREMENT=592 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek_pekerjaan_stakeholder`
--

INSERT INTO `proyek_pekerjaan_stakeholder` (`id`, `id_pekerjaan`, `id_user`, `raci`) VALUES
(1, 3, 31, 'i'),
(2, 3, 32, 'c'),
(3, 3, 33, 'a'),
(4, 3, 34, 'r'),
(5, 3, 35, 'r'),
(6, 3, 36, 'r'),
(7, 3, 37, 'r'),
(8, 3, 38, 'r'),
(9, 3, 39, 'r'),
(10, 3, 40, 'r'),
(11, 3, 41, 'r'),
(12, 4, 31, 'i'),
(13, 4, 32, 'c'),
(14, 4, 33, 'a'),
(15, 4, 34, 'r'),
(16, 4, 35, 'r'),
(17, 4, 36, 'r'),
(18, 4, 37, 'r'),
(19, 4, 38, 'r'),
(20, 4, 39, 'r'),
(21, 4, 40, 'r'),
(22, 4, 41, 'r'),
(23, 5, 31, 'i'),
(24, 5, 32, 'c'),
(25, 5, 33, 'a'),
(26, 5, 34, 'r'),
(27, 5, 35, 'r'),
(28, 5, 36, 'r'),
(29, 5, 37, 'r'),
(30, 5, 38, 'r'),
(31, 5, 39, 'r'),
(32, 5, 40, 'r'),
(33, 5, 41, 'r'),
(34, 6, 31, 'i'),
(35, 6, 32, 'c'),
(36, 6, 33, 'a'),
(37, 6, 34, 'r'),
(38, 6, 35, 'r'),
(39, 6, 36, 'r'),
(40, 6, 37, 'r'),
(41, 6, 38, 'r'),
(42, 6, 39, 'r'),
(43, 6, 40, 'r'),
(44, 6, 41, 'r'),
(45, 7, 31, 'i'),
(46, 7, 32, 'c'),
(47, 7, 33, 'r'),
(48, 7, 34, 'r'),
(49, 7, 35, 'r'),
(50, 7, 36, 'r'),
(51, 7, 37, 'r'),
(52, 7, 38, 'r'),
(53, 7, 39, 'r'),
(54, 7, 40, 'r'),
(55, 7, 41, 'r'),
(56, 13, 31, 'i'),
(57, 13, 32, 'c'),
(58, 13, 33, 'i'),
(59, 13, 34, 'i'),
(60, 13, 35, 'r'),
(61, 13, 36, 'r'),
(62, 13, 37, 'i'),
(63, 13, 38, 'i'),
(64, 13, 39, 'i'),
(65, 13, 40, 'i'),
(66, 13, 41, 'i'),
(67, 14, 31, 'i'),
(68, 14, 32, 'c'),
(69, 14, 33, 'r'),
(70, 14, 34, 'r'),
(71, 14, 35, 'r'),
(72, 14, 36, 'r'),
(73, 14, 37, 'r'),
(74, 14, 38, 'r'),
(75, 14, 39, 'r'),
(76, 14, 40, 'r'),
(77, 14, 41, 'r'),
(78, 15, 31, 'i'),
(79, 15, 32, 'c'),
(80, 15, 33, 'r'),
(81, 15, 34, 'r'),
(82, 15, 35, 'r'),
(83, 15, 36, 'r'),
(84, 15, 37, 'r'),
(85, 15, 38, 'r'),
(86, 15, 39, 'r'),
(87, 15, 40, 'r'),
(88, 15, 41, 'r'),
(89, 16, 31, 'i'),
(90, 16, 32, 'c'),
(91, 16, 33, 'r'),
(92, 16, 34, 'r'),
(93, 16, 35, 'r'),
(94, 16, 36, 'r'),
(95, 16, 37, 'r'),
(96, 16, 38, 'r'),
(97, 16, 39, 'r'),
(98, 16, 40, 'r'),
(99, 16, 41, 'r'),
(100, 17, 31, 'i'),
(101, 17, 32, 'c'),
(102, 17, 33, 'r'),
(103, 17, 34, 'r'),
(104, 17, 35, 'r'),
(105, 17, 36, 'r'),
(106, 17, 37, 'r'),
(107, 17, 38, 'r'),
(108, 17, 39, 'r'),
(109, 17, 40, 'r'),
(110, 17, 41, 'r'),
(111, 18, 31, 'i'),
(112, 18, 32, 'c'),
(113, 18, 33, 'r'),
(114, 18, 34, 'r'),
(115, 18, 35, 'r'),
(116, 18, 36, 'r'),
(117, 18, 37, 'r'),
(118, 18, 38, 'r'),
(119, 18, 39, 'r'),
(120, 18, 40, 'r'),
(121, 18, 41, 'r'),
(122, 19, 31, 'i'),
(123, 19, 32, 'c'),
(124, 19, 33, 'r'),
(125, 19, 34, 'r'),
(126, 19, 35, 'r'),
(127, 19, 36, 'r'),
(128, 19, 37, 'r'),
(129, 19, 38, 'r'),
(130, 19, 39, 'r'),
(131, 19, 40, 'r'),
(132, 19, 41, 'r'),
(133, 20, 31, 'i'),
(134, 20, 32, 'c'),
(135, 20, 33, 'r'),
(136, 20, 34, 'r'),
(137, 20, 35, 'r'),
(138, 20, 36, 'r'),
(139, 20, 37, 'r'),
(140, 20, 38, 'r'),
(141, 20, 39, 'r'),
(142, 20, 40, 'r'),
(143, 20, 41, 'r'),
(144, 21, 31, 'i'),
(145, 21, 32, 'c'),
(146, 21, 33, 'r'),
(147, 21, 34, 'r'),
(148, 21, 35, 'r'),
(149, 21, 36, 'r'),
(150, 21, 37, 'r'),
(151, 21, 38, 'r'),
(152, 21, 39, 'r'),
(153, 21, 40, 'r'),
(154, 21, 41, 'r'),
(155, 22, 31, 'i'),
(156, 22, 32, 'c'),
(157, 22, 33, 'r'),
(158, 22, 34, 'r'),
(159, 22, 35, 'r'),
(160, 22, 36, 'r'),
(161, 22, 37, 'r'),
(162, 22, 38, 'r'),
(163, 22, 39, 'r'),
(164, 22, 40, 'r'),
(165, 22, 41, 'r'),
(166, 23, 31, 'i'),
(167, 23, 32, 'c'),
(168, 23, 33, 'r'),
(169, 23, 34, 'r'),
(170, 23, 35, 'r'),
(171, 23, 36, 'r'),
(172, 23, 37, 'r'),
(173, 23, 38, 'r'),
(174, 23, 39, 'r'),
(175, 23, 40, 'r'),
(176, 23, 41, 'r'),
(177, 24, 31, 'i'),
(178, 24, 32, 'c'),
(179, 24, 33, 'r'),
(180, 24, 34, 'r'),
(181, 24, 35, 'r'),
(182, 24, 36, 'r'),
(183, 24, 37, 'r'),
(184, 24, 38, 'r'),
(185, 24, 39, 'r'),
(186, 24, 40, 'r'),
(187, 24, 41, 'r'),
(188, 25, 31, 'i'),
(189, 25, 32, 'c'),
(190, 25, 33, 'r'),
(191, 25, 34, 'r'),
(192, 25, 35, 'r'),
(193, 25, 36, 'r'),
(194, 25, 37, 'r'),
(195, 25, 38, 'r'),
(196, 25, 39, 'r'),
(197, 25, 40, 'r'),
(198, 25, 41, 'r'),
(199, 26, 31, 'i'),
(200, 26, 32, 'c'),
(201, 26, 33, 'r'),
(202, 26, 34, 'r'),
(203, 26, 35, 'r'),
(204, 26, 36, 'r'),
(205, 26, 37, 'r'),
(206, 26, 38, 'r'),
(207, 26, 39, 'r'),
(208, 26, 40, 'r'),
(209, 26, 41, 'r'),
(210, 28, 31, 'i'),
(211, 28, 32, 'c'),
(212, 28, 33, 'r'),
(213, 28, 34, 'r'),
(214, 28, 35, 'r'),
(215, 28, 36, 'r'),
(216, 28, 37, 'r'),
(217, 28, 38, 'r'),
(218, 28, 39, 'r'),
(219, 28, 40, 'r'),
(220, 28, 41, 'r'),
(221, 29, 31, 'i'),
(222, 29, 32, 'c'),
(223, 29, 33, 'r'),
(224, 29, 34, 'r'),
(225, 29, 35, 'r'),
(226, 29, 36, 'r'),
(227, 29, 37, 'r'),
(228, 29, 38, 'r'),
(229, 29, 39, 'r'),
(230, 29, 40, 'r'),
(231, 29, 41, 'r'),
(232, 30, 31, 'i'),
(233, 30, 32, 'c'),
(234, 30, 33, 'r'),
(235, 30, 34, 'r'),
(236, 30, 35, 'r'),
(237, 30, 36, 'r'),
(238, 30, 37, 'r'),
(239, 30, 38, 'r'),
(240, 30, 39, 'r'),
(241, 30, 40, 'r'),
(242, 30, 41, 'r'),
(243, 31, 31, 'i'),
(244, 31, 32, 'c'),
(245, 31, 33, 'r'),
(246, 31, 34, 'r'),
(247, 31, 35, 'r'),
(248, 31, 36, 'r'),
(249, 31, 37, 'r'),
(250, 31, 38, 'r'),
(251, 31, 39, 'r'),
(252, 31, 40, 'r'),
(253, 31, 41, 'r'),
(254, 32, 31, 'i'),
(255, 32, 32, 'c'),
(256, 32, 33, 'r'),
(257, 32, 34, 'r'),
(258, 32, 35, 'r'),
(259, 32, 36, 'r'),
(260, 32, 37, 'r'),
(261, 32, 38, 'r'),
(262, 32, 39, 'r'),
(263, 32, 40, 'r'),
(264, 32, 41, 'r'),
(265, 33, 31, 'i'),
(266, 33, 32, 'c'),
(267, 33, 33, 'r'),
(268, 33, 34, 'r'),
(269, 33, 35, 'r'),
(270, 33, 36, 'r'),
(271, 33, 37, 'r'),
(272, 33, 38, 'r'),
(273, 33, 39, 'r'),
(274, 33, 40, 'r'),
(275, 33, 41, 'r'),
(276, 34, 31, 'i'),
(277, 34, 32, 'c'),
(278, 34, 33, 'r'),
(279, 34, 34, 'r'),
(280, 34, 35, 'r'),
(281, 34, 36, 'r'),
(282, 34, 37, 'r'),
(283, 34, 38, 'r'),
(284, 34, 39, 'r'),
(285, 34, 40, 'r'),
(286, 34, 41, 'r'),
(287, 35, 31, 'i'),
(288, 35, 32, 'c'),
(289, 35, 33, 'r'),
(290, 35, 34, 'r'),
(291, 35, 35, 'r'),
(292, 35, 36, 'r'),
(293, 35, 37, 'r'),
(294, 35, 38, 'r'),
(295, 35, 39, 'r'),
(296, 35, 40, 'r'),
(297, 35, 41, 'r'),
(298, 36, 31, 'i'),
(299, 36, 32, 'c'),
(300, 36, 33, 'r'),
(301, 36, 34, 'r'),
(302, 36, 35, 'r'),
(303, 36, 36, 'r'),
(304, 36, 37, 'r'),
(305, 36, 38, 'r'),
(306, 36, 39, 'r'),
(307, 36, 40, 'r'),
(308, 36, 41, 'r'),
(309, 37, 31, 'i'),
(310, 37, 32, 'c'),
(311, 37, 33, 'r'),
(312, 37, 34, 'r'),
(313, 37, 35, 'r'),
(314, 37, 36, 'r'),
(315, 37, 37, 'r'),
(316, 37, 38, 'r'),
(317, 37, 39, 'r'),
(318, 37, 40, 'r'),
(319, 37, 41, 'r'),
(320, 38, 31, 'i'),
(321, 38, 32, 'c'),
(322, 38, 33, 'r'),
(323, 38, 34, 'r'),
(324, 38, 35, 'r'),
(325, 38, 36, 'r'),
(326, 38, 37, 'r'),
(327, 38, 38, 'r'),
(328, 38, 39, 'r'),
(329, 38, 40, 'r'),
(330, 38, 41, 'r'),
(331, 39, 31, 'i'),
(332, 39, 32, 'c'),
(333, 39, 33, 'r'),
(334, 39, 34, 'r'),
(335, 39, 35, 'r'),
(336, 39, 36, 'r'),
(337, 39, 37, 'r'),
(338, 39, 38, 'r'),
(339, 39, 39, 'r'),
(340, 39, 40, 'r'),
(341, 39, 41, 'r'),
(342, 40, 31, 'i'),
(343, 40, 32, 'c'),
(344, 40, 33, 'r'),
(345, 40, 34, 'r'),
(346, 40, 35, 'r'),
(347, 40, 36, 'r'),
(348, 40, 37, 'r'),
(349, 40, 38, 'r'),
(350, 40, 39, 'r'),
(351, 40, 40, 'r'),
(352, 40, 41, 'r'),
(353, 42, 31, 'i'),
(354, 42, 32, 'c'),
(355, 42, 33, 'r'),
(356, 42, 34, 'r'),
(357, 42, 35, 'r'),
(358, 42, 36, 'r'),
(359, 42, 37, 'r'),
(360, 42, 38, 'r'),
(361, 42, 39, 'r'),
(362, 42, 40, 'r'),
(363, 42, 41, 'r'),
(364, 43, 31, 'i'),
(365, 43, 32, 'c'),
(366, 43, 33, 'r'),
(367, 43, 34, 'r'),
(368, 43, 35, 'r'),
(369, 43, 36, 'r'),
(370, 43, 37, 'r'),
(371, 43, 38, 'r'),
(372, 43, 39, 'r'),
(373, 43, 40, 'r'),
(374, 43, 41, 'r'),
(375, 44, 31, 'i'),
(376, 44, 32, 'c'),
(377, 44, 33, 'r'),
(378, 44, 34, 'r'),
(379, 44, 35, 'r'),
(380, 44, 36, 'r'),
(381, 44, 37, 'r'),
(382, 44, 38, 'r'),
(383, 44, 39, 'r'),
(384, 44, 40, 'r'),
(385, 44, 41, 'r'),
(386, 45, 31, 'i'),
(387, 45, 32, 'c'),
(388, 45, 33, 'r'),
(389, 45, 34, 'r'),
(390, 45, 35, 'r'),
(391, 45, 36, 'r'),
(392, 45, 37, 'r'),
(393, 45, 38, 'r'),
(394, 45, 39, 'r'),
(395, 45, 40, 'r'),
(396, 45, 41, 'r'),
(397, 41, 31, 'i'),
(398, 41, 32, 'c'),
(399, 41, 33, 'r'),
(400, 41, 34, 'r'),
(401, 41, 35, 'r'),
(402, 41, 36, 'r'),
(403, 41, 37, 'r'),
(404, 41, 38, 'r'),
(405, 41, 39, 'r'),
(406, 41, 40, 'r'),
(407, 41, 41, 'r'),
(408, 46, 31, 'i'),
(409, 46, 32, 'c'),
(410, 46, 33, 'r'),
(411, 46, 34, 'r'),
(412, 46, 35, 'r'),
(413, 46, 36, 'r'),
(414, 46, 37, 'r'),
(415, 46, 38, 'r'),
(416, 46, 39, 'r'),
(417, 46, 40, 'r'),
(418, 46, 41, 'r'),
(419, 47, 31, 'i'),
(420, 47, 32, 'c'),
(421, 47, 33, 'r'),
(422, 47, 34, 'r'),
(423, 47, 35, 'r'),
(424, 47, 36, 'r'),
(425, 47, 37, 'r'),
(426, 47, 38, 'r'),
(427, 47, 39, 'r'),
(428, 47, 40, 'r'),
(429, 47, 41, 'r'),
(430, 48, 31, 'i'),
(431, 48, 32, 'c'),
(432, 48, 33, 'r'),
(433, 48, 34, 'r'),
(434, 48, 35, 'r'),
(435, 48, 36, 'r'),
(436, 48, 37, 'r'),
(437, 48, 38, 'r'),
(438, 48, 39, 'r'),
(439, 48, 40, 'r'),
(440, 48, 41, 'r'),
(441, 49, 31, 'i'),
(442, 49, 32, 'c'),
(443, 49, 33, 'r'),
(444, 49, 34, 'r'),
(445, 49, 35, 'r'),
(446, 49, 36, 'r'),
(447, 49, 37, 'r'),
(448, 49, 38, 'r'),
(449, 49, 39, 'r'),
(450, 49, 40, 'r'),
(451, 49, 41, 'r'),
(452, 50, 31, 'i'),
(453, 50, 32, 'c'),
(454, 50, 33, 'r'),
(455, 50, 34, 'r'),
(456, 50, 35, 'r'),
(457, 50, 36, 'r'),
(458, 50, 37, 'r'),
(459, 50, 38, 'r'),
(460, 50, 39, 'r'),
(461, 50, 40, 'r'),
(462, 50, 41, 'r'),
(463, 27, 31, 'i'),
(464, 27, 32, 'c'),
(465, 27, 33, 'r'),
(466, 27, 34, 'r'),
(467, 27, 35, 'r'),
(468, 27, 36, 'r'),
(469, 27, 37, 'r'),
(470, 27, 38, 'r'),
(471, 27, 39, 'r'),
(472, 27, 40, 'r'),
(473, 27, 41, 'r'),
(474, 51, 31, 'i'),
(475, 51, 32, 'c'),
(476, 51, 33, 'r'),
(477, 51, 34, 'r'),
(478, 51, 35, 'r'),
(479, 51, 36, 'r'),
(480, 51, 37, 'r'),
(481, 51, 38, 'r'),
(482, 51, 39, 'r'),
(483, 51, 40, 'r'),
(484, 51, 41, 'r'),
(485, 52, 31, 'i'),
(486, 52, 32, 'c'),
(487, 52, 33, 'r'),
(488, 52, 34, 'r'),
(489, 52, 35, 'r'),
(490, 52, 36, 'r'),
(491, 52, 37, 'r'),
(492, 52, 38, 'r'),
(493, 52, 39, 'r'),
(494, 52, 40, 'r'),
(495, 52, 41, 'r'),
(496, 53, 31, 'i'),
(497, 53, 32, 'c'),
(498, 53, 33, 'r'),
(499, 53, 34, 'r'),
(500, 53, 35, 'r'),
(501, 53, 36, 'r'),
(502, 53, 37, 'r'),
(503, 53, 38, 'r'),
(504, 53, 39, 'r'),
(505, 53, 40, 'r'),
(506, 53, 41, 'r'),
(507, 54, 31, 'i'),
(508, 54, 32, 'c'),
(509, 54, 33, 'r'),
(510, 54, 34, 'r'),
(511, 54, 35, 'r'),
(512, 54, 36, 'r'),
(513, 54, 37, 'r'),
(514, 54, 38, 'r'),
(515, 54, 39, 'r'),
(516, 54, 40, 'r'),
(517, 54, 41, 'r'),
(518, 8, 31, 'i'),
(519, 8, 32, 'c'),
(520, 8, 33, 'r'),
(521, 8, 34, 'r'),
(522, 8, 35, 'r'),
(523, 8, 36, 'r'),
(524, 8, 37, 'r'),
(525, 8, 38, 'r'),
(526, 8, 39, 'r'),
(527, 8, 40, 'r'),
(528, 8, 41, 'r'),
(529, 9, 31, 'i'),
(530, 9, 32, 'c'),
(531, 9, 33, 'r'),
(532, 9, 34, 'r'),
(533, 9, 35, 'r'),
(534, 9, 36, 'r'),
(535, 9, 37, 'r'),
(536, 9, 38, 'r'),
(537, 9, 39, 'r'),
(538, 9, 40, 'r'),
(539, 9, 41, 'r'),
(540, 55, 31, 'i'),
(541, 55, 32, 'c'),
(542, 55, 33, 'r'),
(543, 55, 34, 'r'),
(544, 55, 35, 'r'),
(545, 55, 36, 'r'),
(546, 55, 37, 'r'),
(547, 55, 38, 'r'),
(548, 55, 39, 'r'),
(549, 55, 40, 'r'),
(550, 55, 41, 'r'),
(551, 10, 31, 'i'),
(552, 10, 32, 'c'),
(553, 10, 33, 'r'),
(554, 10, 34, 'r'),
(555, 10, 35, 'r'),
(556, 10, 36, 'r'),
(557, 10, 37, 'r'),
(558, 10, 38, 'r'),
(559, 10, 39, 'r'),
(560, 10, 40, 'r'),
(561, 10, 41, 'r'),
(562, 11, 31, 'i'),
(563, 11, 32, 'c'),
(564, 11, 33, 'r'),
(565, 11, 34, 'r'),
(566, 11, 35, 'r'),
(567, 11, 36, 'r'),
(568, 11, 37, 'r'),
(569, 11, 38, 'r'),
(570, 11, 39, 'r'),
(571, 11, 40, 'r'),
(572, 11, 41, 'r'),
(573, 12, 31, 'i'),
(574, 12, 32, 'c'),
(575, 12, 33, 'r'),
(576, 12, 34, 'r'),
(577, 12, 35, 'r'),
(578, 12, 36, 'r'),
(579, 12, 37, 'r'),
(580, 12, 38, 'r'),
(581, 12, 39, 'r'),
(582, 12, 40, 'r'),
(583, 12, 41, 'r'),
(584, 56, 31, 'r'),
(585, 56, 35, 'r'),
(586, 56, 38, 'r'),
(587, 56, 40, 'r'),
(588, 57, 31, 'r'),
(589, 57, 35, 'i'),
(590, 57, 38, 'i'),
(591, 57, 40, 'r');

-- --------------------------------------------------------

--
-- Table structure for table `proyek_resiko`
--

CREATE TABLE IF NOT EXISTS `proyek_resiko` (
`id` int(3) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `probabilitas` float NOT NULL,
  `dampak` float NOT NULL,
  `tindakan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek_resiko`
--

INSERT INTO `proyek_resiko` (`id`, `id_proyek`, `kode`, `jenis`, `deskripsi`, `probabilitas`, `dampak`, `tindakan`) VALUES
(4, 5, 'R1', 'kebutuhan', 'Penambahan atau perubahan spesifikasi dari Project Owners', 0.9, 0.8, '1 Selalu mengacu pada spesifikasi/fitur yang sudah disepakati, 2 Jika ingin tambah fitur maka harus ada penambahan biaya karena itu di luar harga proyek yang telah di sepakati'),
(5, 5, 'R2', 'kebutuhan', 'Bisnis model yang akan dibuat belum fix', 0.3, 0.7, ''),
(6, 5, 'R3', 'estimasi', 'Perkiraan ukuran sistem perangkat lunak tidak sesuai', 0, 0, ''),
(7, 5, 'R4', 'estimasi', 'Perkiraan jadwal   tidak sesuai perencanaan', 0, 0, 'Pemimpin proyek selalu melakukan pengawasan pada tim dan memantau kinerja tim serta membantu mencarikan solusi terhadap permasalahan yang di hadapi tim dalam pengerjaan proyek.'),
(8, 5, 'R5', 'estimasi', 'Perkiraan jadwal perbaikan sistem terlalu sedikit', 0, 0, ''),
(9, 5, 'R6', 'personal', 'Ada tim proyek yang sakit sehingga berpengaruh terhadap pelaksanaan proyek', 0, 0, ''),
(10, 5, 'R7', 'personal', 'Kurang koordinasi di dalam tim, kurang nya kerja sama tim', 0, 0, ''),
(11, 5, 'R8', 'personal', 'Kekurangan SDM yang memiliki kompetisi yang diharapkan', 0, 0, ''),
(12, 5, 'R9', 'personal', 'Tim proyek ada yang mengundurkan diri', 0, 0, ''),
(13, 5, 'R10', 'personal', 'Tim proyek lambat menangkap bisnis model yang dibangun', 0, 0, ''),
(14, 5, 'R11', 'personal', 'pengguna belum mengerti cara penggunaan aplikasi setelah dilakukan training', 0, 0, ''),
(16, 5, 'R12', 'tools dan teknologi', 'Terjadi kerusakan tools yang digunakan untuk mengembangkan sistem ', 0, 0, ''),
(17, 5, 'R13', 'tools dan teknologi', 'Tingkat kesulitan pekerjaan yang tidak terprediksi sebelumnya', 0, 0, ''),
(18, 5, 'R14', 'tools dan teknologi', 'Aplikasi tidak jalan sebagaimana mestinya', 0, 0, ''),
(19, 5, 'R15', 'tools dan teknologi', 'Teknologi yang digunakan tidak compatible dengan kebutuhan yang ada', 0, 0, ''),
(20, 5, 'R16', 'tools dan teknologi', 'Tools yang digunakan untuk pengembangan tidak efisien', 0, 0, ''),
(21, 5, 'R17', 'tools dan teknologi', 'Database yang digunakan tidak dapat memproses transaksi yang dibutuhkan', 0, 0, ''),
(22, 5, 'R18', 'external', 'Bencana Alam', 0, 0, '');

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

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
(15, 5, 41, 'Lainnya', '2016-07-24 15:56:05'),
(16, 6, 31, 'Front End', '2016-08-10 19:22:13'),
(17, 6, 35, 'Front End', '2016-08-10 19:22:15'),
(18, 6, 38, 'Front End', '2016-08-10 19:22:18'),
(19, 6, 40, 'Front End', '2016-08-10 19:22:20');

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
`id_user` int(11) NOT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `username` char(30) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nip`, `nama`, `username`, `password`, `email`, `status`) VALUES
(31, NULL, 'Nicolas Ruslim', 'nicolas', 'deb97a759ee7b8ba42e02dddf2b412fe', 'nicolas.ruslim@gmail.com', 'CEO'),
(32, NULL, 'Raosan Fikri', 'raosan', 'e3300dec5df451432dc6e2b92d60987c', 'raosan.fikri@gmail.com', 'MANAGER'),
(33, NULL, 'Sigit Nurhanafi', 'sigit', '223a0fa8f15933d622b3c7a13f186027', 'sigit.nurhanafi@gmail.com', 'DEVELOPER'),
(34, NULL, 'Supriadi', 'supriadi', 'eeaaed26b457c6348cc6728e3f065d9b', 'supriadi@gmail.com', 'DEVELOPER'),
(35, NULL, 'Muri', 'muri', 'd7e105f229977b191b020897a1255ae3', 'muri@gmail.com', 'DEVELOPER'),
(36, NULL, 'Rifki', 'rifki', '2a5c4c5a5ba1c332279685ddec507cd9', 'rifki@gmail.com', 'DEVELOPER'),
(37, NULL, 'Ahmad Karlam', 'ahmad', '61243c7b9a4022cb3f8dc3106767ed12', 'ahmad.karlam@gmail.com', 'DEVELOPER'),
(38, NULL, 'Wildan Angga', 'wildan', 'af6b3aa8c3fcd651674359f500814679', 'wildan.angga@gmail.com', 'DEVELOPER'),
(39, NULL, 'Habibie Faried', 'habibie', 'b78d1da50c76a50c0786d4ec5a0f5f86', 'habibie.farid@gmail.com', 'DEVELOPER'),
(40, NULL, 'Edi Rohaedi', 'edi', '8457dff5491b024de6b03e30b609f7e8', 'edi.rohaedi@gmail.com', 'DEVELOPER'),
(41, NULL, 'Antonio Sitorus', 'antonio', '4a181673429f0b6abbfd452f0f3b5950', 'antonio.sitorus@gmail.com', 'DEVELOPER'),
(45, '123', '123', '123', '202cb962ac59075b964b07152d234b70', 'admin@admin.com', 'MANAGER');

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
-- Indexes for table `proyek_evm`
--
ALTER TABLE `proyek_evm`
 ADD PRIMARY KEY (`id`), ADD KEY `id_proyek` (`id_proyek`);

--
-- Indexes for table `proyek_gsc`
--
ALTER TABLE `proyek_gsc`
 ADD PRIMARY KEY (`id`), ADD KEY `id_proyek` (`id_proyek`,`id_gsc`);

--
-- Indexes for table `proyek_pekerjaan`
--
ALTER TABLE `proyek_pekerjaan`
 ADD PRIMARY KEY (`id`), ADD KEY `id_proyek` (`id_proyek`);

--
-- Indexes for table `proyek_pekerjaan_stakeholder`
--
ALTER TABLE `proyek_pekerjaan_stakeholder`
 ADD PRIMARY KEY (`id`), ADD KEY `id_pekerjaan` (`id_pekerjaan`,`id_user`), ADD KEY `id_user` (`id_user`), ADD KEY `id_pekerjaan_2` (`id_pekerjaan`);

--
-- Indexes for table `proyek_resiko`
--
ALTER TABLE `proyek_resiko`
 ADD PRIMARY KEY (`id`), ADD KEY `id_proyek` (`id_proyek`), ADD KEY `id_proyek_2` (`id_proyek`);

--
-- Indexes for table `proyek_stakeholders`
--
ALTER TABLE `proyek_stakeholders`
 ADD PRIMARY KEY (`id`), ADD KEY `id_user` (`id_user`), ADD KEY `id_proyek` (`id_proyek`), ADD KEY `id_proyek_2` (`id_proyek`), ADD KEY `id_user_2` (`id_user`);

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
 ADD PRIMARY KEY (`id_user`), ADD UNIQUE KEY `nip_2` (`nip`), ADD KEY `nip` (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `proyek_cfp`
--
ALTER TABLE `proyek_cfp`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `proyek_evm`
--
ALTER TABLE `proyek_evm`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `proyek_gsc`
--
ALTER TABLE `proyek_gsc`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=165;
--
-- AUTO_INCREMENT for table `proyek_pekerjaan`
--
ALTER TABLE `proyek_pekerjaan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `proyek_pekerjaan_stakeholder`
--
ALTER TABLE `proyek_pekerjaan_stakeholder`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=592;
--
-- AUTO_INCREMENT for table `proyek_resiko`
--
ALTER TABLE `proyek_resiko`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `proyek_stakeholders`
--
ALTER TABLE `proyek_stakeholders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
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
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `proyek_cfp`
--
ALTER TABLE `proyek_cfp`
ADD CONSTRAINT `proyek_cfp_ibfk_1` FOREIGN KEY (`id_proyek`) REFERENCES `proyek_pekerjaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proyek_evm`
--
ALTER TABLE `proyek_evm`
ADD CONSTRAINT `proyek_evm_ibfk_1` FOREIGN KEY (`id_proyek`) REFERENCES `proyek` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proyek_gsc`
--
ALTER TABLE `proyek_gsc`
ADD CONSTRAINT `proyek_gsc_ibfk_1` FOREIGN KEY (`id_proyek`) REFERENCES `proyek` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proyek_pekerjaan_stakeholder`
--
ALTER TABLE `proyek_pekerjaan_stakeholder`
ADD CONSTRAINT `proyek_pekerjaan_stakeholder_ibfk_1` FOREIGN KEY (`id_pekerjaan`) REFERENCES `proyek_pekerjaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `proyek_pekerjaan_stakeholder_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `proyek_resiko`
--
ALTER TABLE `proyek_resiko`
ADD CONSTRAINT `proyek_resiko_ibfk_1` FOREIGN KEY (`id_proyek`) REFERENCES `proyek` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proyek_stakeholders`
--
ALTER TABLE `proyek_stakeholders`
ADD CONSTRAINT `proyek_stakeholders_ibfk_1` FOREIGN KEY (`id_proyek`) REFERENCES `proyek` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
