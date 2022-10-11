-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 Jun 2014 pada 14.20
-- Versi Server: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `surat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `instansi`
--

CREATE TABLE IF NOT EXISTS `instansi` (
  `nama_instansi` varchar(100) DEFAULT NULL,
  `alamat_instansi` varchar(500) DEFAULT NULL,
  `nama_pimpinan` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `instansi`
--

INSERT INTO `instansi` (`nama_instansi`, `alamat_instansi`, `nama_pimpinan`, `email`, `website`, `logo`) VALUES
('PT. CEMERLANG INDAH', 'JL. Jenderal Sudirman, No 20 A Blok G, No .Telp 0819-9082-1273 ', 'Contoh', 'contoh@gmail.com', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `group_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(20) NOT NULL,
  `nama_pegawai` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `passwd` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip_UNIQUE` (`nip`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`group_id`, `id`, `nip`, `nama_pegawai`, `jabatan`, `email`, `passwd`) VALUES
(3, 5, '2014', 'Demo User', 'Demo User', 'demo@users', '2b0704d1818ede87cd2e67d1e4c4b1d0'),
(1, 4, '20140605', 'Administrator', 'Administrator', 'admi@brainlabs', 'ac292850786776fe2842278e9b544c58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_disposisi`
--

CREATE TABLE IF NOT EXISTS `ref_disposisi` (
  `disposisi_id` int(11) NOT NULL AUTO_INCREMENT,
  `disposisi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`disposisi_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `ref_disposisi`
--

INSERT INTO `ref_disposisi` (`disposisi_id`, `disposisi`) VALUES
(1, 'Pimpinan'),
(2, 'Administrator'),
(3, 'Pengelola Surat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_disposisi_detail`
--

CREATE TABLE IF NOT EXISTS `ref_disposisi_detail` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `disposisi_id` int(11) DEFAULT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`detail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `ref_disposisi_detail`
--

INSERT INTO `ref_disposisi_detail` (`detail_id`, `disposisi_id`, `deskripsi`) VALUES
(1, 1, 'Tindak Lanjut (TL)'),
(2, 1, 'Koordinasikan Dengan yg terkait'),
(3, 1, 'Untuk diketahui'),
(4, 1, 'File'),
(5, 2, 'Datakan'),
(6, 2, 'Koordinasi dengan Bidang Lain/ SKPD Terkait'),
(7, 2, 'Cek, sesuaikan'),
(8, 2, 'Proses'),
(9, 2, 'Buatkan Surat Edaran'),
(10, 2, 'Buatkan Undangan'),
(11, 3, 'Di cek, Input, Sesuaikan'),
(12, 3, 'Diteliti kelengkapan berkasnya, proses'),
(13, 3, 'Transfer ke bidang ,,,,'),
(14, 3, 'Buatkan Konsep Surat Edaran'),
(15, 3, 'Atur Jadwal, Proses'),
(16, 3, 'Tolong dibuatkan Undangan untuk YBS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_perihal`
--

CREATE TABLE IF NOT EXISTS `ref_perihal` (
  `perihal_id` int(11) NOT NULL AUTO_INCREMENT,
  `perihal` varchar(255) DEFAULT NULL COMMENT 'Perihal',
  `diterbitkan_kepada` varchar(255) DEFAULT NULL COMMENT 'di terbitkan kepada',
  `pengelola_surat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`perihal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Dumping data untuk tabel `ref_perihal`
--

INSERT INTO `ref_perihal` (`perihal_id`, `perihal`, `diterbitkan_kepada`, `pengelola_surat`) VALUES
(1, 'Usul Kenaikan Pangkat', 'KABID MUTASI', 'KASUBID P&k'),
(2, 'Usul Peninjauan Masa Kerja', 'KABID MUTASI', 'KASUBID P&k'),
(3, 'Usul KGB Pimpinan', 'KABID MUTASI', 'KASUBID P&k'),
(4, 'Usul Ralat SK Kenaikan Pangkat', 'KABID MUTASI', 'KASUBID P&k'),
(5, 'Usul KP PI', 'KABID MUTASI', 'KASUBID P&k'),
(6, 'Usul Pengangkatan CPNS ke PNS', 'KABID MUTASI', 'KASUBID P&k'),
(7, 'Usul KP Struktural', 'KABID MUTASI', 'KASUBID P&k'),
(8, 'Usul KP Fungsional', 'KABID MUTASI', 'KASUBID P&k'),
(9, 'Ususl Pensiun BUP', 'KABID MUTASI', 'KASUBID PPP'),
(10, 'Ususl Pensiun  APS', 'KABID MUTASI', 'KASUBID PPP'),
(11, 'Ususl Pensiun  MD', 'KABID MUTASI', 'KASUBID PPP'),
(12, 'Ralat SK Pensiun', 'KABID MUTASI', 'KASUBID PPP'),
(13, 'Usul Mutasi Masuk', 'KABID MUTASI', 'KASUBID PPP'),
(14, 'Usul Mutasi Keluar', 'KABID MUTASI', 'KASUBID PPP'),
(15, 'Usul Ujian PI', 'KABID PENGEMBANGAN', 'KASUBID Diklat'),
(16, 'Usul Ujian Dinas', 'KABID PENGEMBANGAN', 'KASUBID Diklat'),
(17, 'Usul Diklat Prajab', 'KABID PENGEMBANGAN', 'KASUBID Diklat'),
(18, 'Usul Diklat Pimpinan', 'KABID PENGEMBANGAN', 'KASUBID Diklat'),
(19, 'Usul Diklat Fungsional', 'KABID PENGEMBANGAN', 'KASUBID Diklat'),
(20, 'Usul Diklat Teknis', 'KABID PENGEMBANGAN', 'KASUBID Diklat'),
(21, 'Penawaran Diklat', 'KABID PENGEMBANGAN', 'KASUBID Diklat'),
(22, 'Usul Kenaikan Jabatan Fungsional', 'KABID PENGEMBANGAN', 'KASUBID Pengembangan'),
(23, 'Usul Jabatan Fungsional Pertama', 'KABID PENGEMBANGAN', 'KASUBID Pengembangan'),
(24, 'Usul Formasi PNS', 'KABID PENGEMBANGAN', 'KASUBID Pengembangan'),
(25, 'Usul  Tambahan Pegawai', 'KABID PENGEMBANGAN', 'KASUBID Pengembangan'),
(26, 'Usul Ralat SK Jabatan Fungsional', 'KABID PENGEMBANGAN', 'KASUBID Pengembangan'),
(27, 'Usul Ralat SK CPNS', 'KABID PENGEMBANGAN', 'KASUBID Pengembangan'),
(28, 'Usul Karis/Karsu', 'KABID UMUM', 'KASUBID Pembinaan'),
(29, 'Usul Karpeg', 'KABID UMUM', 'KASUBID Pembinaan'),
(30, 'Usul Taspen', 'KABID UMUM', 'KASUBID Pembinaan'),
(31, 'Usul Satya Lencana Karya Satya', 'KABID UMUM', 'KASUBID Pembinaan'),
(32, 'Usul ID Card', 'KABID UMUM', 'KASUBID Pembinaan'),
(33, 'Permohonan Ijin Perceraian', 'KABID UMUM', 'KASUBID Pembinaan'),
(34, ' Laporan Perkawinan Pertama', 'KABID UMUM', 'KASUBID Pembinaan'),
(35, 'Ijin Cuti Haji', 'KABID UMUM', 'KASUBID Pembinaan'),
(36, 'Ijin Cuti Umroh', 'KABID UMUM', 'KASUBID Pembinaan'),
(37, 'Ijin Cuti Sakit', 'KABID UMUM', 'KASUBID Pembinaan'),
(38, 'Laporan Mekanisme Peremajaan data', 'KABID UMUM', 'KASUBID Layanan'),
(39, 'Usul Perubahan Gaji', 'KABID UMUM', 'KASUBID Layanan'),
(40, 'Usul Ralat KPE', 'KABID UMUM', 'KASUBID Layanan'),
(41, 'Usul Ralat Konversi NIP', 'KABID UMUM', 'KASUBID Layanan'),
(42, 'Laporan Kematian', 'KABID UMUM', 'KASUBID Layanan'),
(43, 'Permintaan data SIPD', 'KABID UMUM', 'KASUBID Layanan'),
(44, 'Permintaan data Portal Pegawaii', 'KABID UMUM', 'KASUBID Layanan'),
(45, 'File Pegawai', 'KABID UMUM', 'KASUBID Layanan'),
(46, 'Penyusunan LAKIP', 'Sekertaris', 'Perencanaan'),
(47, 'Penyusunan RenSTra', 'Sekertaris', 'Perencanaan'),
(48, 'Penyusunan LKPD', 'Sekertaris', 'Perencanaan'),
(49, 'Penyusunan Rka', 'Sekertaris', 'Keuangan'),
(50, 'Penyusunan DPA', 'Sekertaris', 'Keuangan'),
(51, 'Penyusunan Laporan Keuangan', 'Sekertaris', 'Keuangan'),
(52, 'Usul Kenaikan Pangkat', 'KABID MUTASI', 'KASUBID P&k'),
(53, 'Usul Peninjauan Masa Kerja', 'KABID MUTASI', 'KASUBID P&k'),
(54, 'Usul KGB Pimpinan', 'KABID MUTASI', 'KASUBID P&k'),
(55, 'Usul Ralat SK Kenaikan Pangkat', 'KABID MUTASI', 'KASUBID P&k'),
(56, 'Usul KP PI', 'KABID MUTASI', 'KASUBID P&k'),
(57, 'Usul Pengangkatan CPNS ke PNS', 'KABID MUTASI', 'KASUBID P&k'),
(58, 'Usul KP Struktural', 'KABID MUTASI', 'KASUBID P&k'),
(59, 'Usul KP Fungsional', 'KABID MUTASI', 'KASUBID P&k'),
(60, 'Ususl Pensiun BUP', 'KABID MUTASI', 'KASUBID PPP'),
(61, 'Ususl Pensiun  APS', 'KABID MUTASI', 'KASUBID PPP'),
(62, 'Ususl Pensiun  MD', 'KABID MUTASI', 'KASUBID PPP'),
(63, 'Ralat SK Pensiun', 'KABID MUTASI', 'KASUBID PPP'),
(64, 'Usul Mutasi Masuk', 'KABID MUTASI', 'KASUBID PPP'),
(65, 'Usul Mutasi Keluar', 'KABID MUTASI', 'KASUBID PPP'),
(66, 'Usul Ujian PI', 'KABID PENGEMBANGAN', 'KASUBID Diklat'),
(67, 'Usul Ujian Dinas', 'KABID PENGEMBANGAN', 'KASUBID Diklat'),
(68, 'Usul Diklat Prajab', 'KABID PENGEMBANGAN', 'KASUBID Diklat'),
(69, 'Usul Diklat Pimpinan', 'KABID PENGEMBANGAN', 'KASUBID Diklat'),
(70, 'Usul Diklat Fungsional', 'KABID PENGEMBANGAN', 'KASUBID Diklat'),
(71, 'Usul Diklat Teknis', 'KABID PENGEMBANGAN', 'KASUBID Diklat'),
(72, 'Penawaran Diklat', 'KABID PENGEMBANGAN', 'KASUBID Diklat'),
(73, 'Usul Kenaikan Jabatan Fungsional', 'KABID PENGEMBANGAN', 'KASUBID Pengembangan'),
(74, 'Usul Jabatan Fungsional Pertama', 'KABID PENGEMBANGAN', 'KASUBID Pengembangan'),
(75, 'Usul Formasi PNS', 'KABID PENGEMBANGAN', 'KASUBID Pengembangan'),
(76, 'Usul  Tambahan Pegawai', 'KABID PENGEMBANGAN', 'KASUBID Pengembangan'),
(77, 'Usul Ralat SK Jabatan Fungsional', 'KABID PENGEMBANGAN', 'KASUBID Pengembangan'),
(78, 'Usul Ralat SK CPNS', 'KABID PENGEMBANGAN', 'KASUBID Pengembangan'),
(79, 'Usul Karis/Karsu', 'KABID UMUM', 'KASUBID Pembinaan'),
(80, 'Usul Karpeg', 'KABID UMUM', 'KASUBID Pembinaan'),
(81, 'Usul Taspen', 'KABID UMUM', 'KASUBID Pembinaan'),
(82, 'Usul Satya Lencana Karya Satya', 'KABID UMUM', 'KASUBID Pembinaan'),
(83, 'Usul ID Card', 'KABID UMUM', 'KASUBID Pembinaan'),
(84, 'Permohonan Ijin Perceraian', 'KABID UMUM', 'KASUBID Pembinaan'),
(85, ' Laporan Perkawinan Pertama', 'KABID UMUM', 'KASUBID Pembinaan'),
(86, 'Ijin Cuti Haji', 'KABID UMUM', 'KASUBID Pembinaan'),
(87, 'Ijin Cuti Umroh', 'KABID UMUM', 'KASUBID Pembinaan'),
(88, 'Ijin Cuti Sakit', 'KABID UMUM', 'KASUBID Pembinaan'),
(89, 'Laporan Mekanisme Peremajaan data', 'KABID UMUM', 'KASUBID Layanan'),
(90, 'Usul Perubahan Gaji', 'KABID UMUM', 'KASUBID Layanan'),
(91, 'Usul Ralat KPE', 'KABID UMUM', 'KASUBID Layanan'),
(92, 'Usul Ralat Konversi NIP', 'KABID UMUM', 'KASUBID Layanan'),
(93, 'Laporan Kematian', 'KABID UMUM', 'KASUBID Layanan'),
(94, 'Permintaan data SIPD', 'KABID UMUM', 'KASUBID Layanan'),
(95, 'Permintaan data Portal Pegawaii', 'KABID UMUM', 'KASUBID Layanan'),
(96, 'File Pegawai', 'KABID UMUM', 'KASUBID Layanan'),
(97, 'Penyusunan LAKIP', 'Sekertaris', 'Perencanaan'),
(98, 'Penyusunan RenSTra', 'Sekertaris', 'Perencanaan'),
(99, 'Penyusunan LKPD', 'Sekertaris', 'Perencanaan'),
(100, 'Penyusunan Rka', 'Sekertaris', 'Keuangan'),
(101, 'Penyusunan DPA', 'Sekertaris', 'Keuangan'),
(102, 'Penyusunan Laporan Keuangan', 'Sekertaris', 'Keuangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_jenis`
--

CREATE TABLE IF NOT EXISTS `surat_jenis` (
  `jenis_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`jenis_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `surat_jenis`
--

INSERT INTO `surat_jenis` (`jenis_id`, `nama_jenis`) VALUES
(1, 'Surat Tugas'),
(2, 'Surat Perintah'),
(3, 'Perjalanan Dinas'),
(4, 'Surat Keterangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
--

CREATE TABLE IF NOT EXISTS `surat_keluar` (
  `surat_keluar_id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_surat_id` int(11) DEFAULT NULL,
  `nomor_surat` varchar(45) DEFAULT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `perihal_id` int(11) DEFAULT NULL,
  `tujuan` varchar(100) DEFAULT NULL,
  `penanda_tangan` varchar(100) DEFAULT NULL,
  `catatan` varchar(500) DEFAULT NULL,
  `file_surat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`surat_keluar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE IF NOT EXISTS `surat_masuk` (
  `surat_masuk_id` int(11) NOT NULL AUTO_INCREMENT,
  `skpd_pengirim` varchar(100) DEFAULT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `nomor_surat` varchar(45) DEFAULT NULL,
  `perihal_id` int(11) DEFAULT NULL COMMENT 'ref_perihal_id',
  `nomor_agenda` varchar(45) DEFAULT NULL,
  `tanggal_diterima` date DEFAULT NULL,
  `disposisi_id` int(45) DEFAULT NULL,
  `catatan` text,
  `file_surat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`surat_masuk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `group_id` int(11) NOT NULL,
  `group` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_group`
--

INSERT INTO `user_group` (`group_id`, `group`) VALUES
(1, 'Administrator'),
(2, 'User'),
(3, 'Demo User');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
