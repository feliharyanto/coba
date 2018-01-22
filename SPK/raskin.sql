-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22 Jul 2017 pada 10.50
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `raskin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE IF NOT EXISTS `alternatif` (
`id_alternatif` int(11) NOT NULL,
  `no_kk` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `rt` varchar(10) NOT NULL,
  `rw` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `no_kk`, `nama`, `rt`, `rw`) VALUES
(1, '111', 'pairun', '05', '03'),
(2, '112', 'marsudi', '08', '04'),
(5, '666', 'rekijo', '12', '21'),
(6, '652', 'ramijan', '05', '03'),
(7, '454', 'marino', '08', '04'),
(8, '969', 'dddd', '05', '03'),
(9, '488', 'jkjkj', '45', '78');

-- --------------------------------------------------------

--
-- Struktur dari tabel `himpunan`
--

CREATE TABLE IF NOT EXISTS `himpunan` (
`id_himpunan` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `himpunan`
--

INSERT INTO `himpunan` (`id_himpunan`, `id_kriteria`, `nama`, `nilai`) VALUES
(14, 1, 'Suami atau istri tidak bekerja', 0.3),
(15, 1, 'Pendapatan < = Rp.500.000', 0.5),
(16, 1, 'Pendapatan > Rp.500.000', 1),
(17, 2, 'Rumah Milik Sendiri', 0.5),
(18, 2, 'Rumah kontrak/ sewa', 1),
(21, 3, 'memeiliki aset > Rp.1.800.000', 0.5),
(22, 3, ' Tidak memiliki Aset > Rp.1.800.000', 1),
(25, 4, 'Tagihan listrik < Rp.50.000 per bulan', 0.5),
(26, 4, 'Tagihan listrik > Rp.50.000 per bulam', 1),
(29, 5, 'luas tempat tinggal > 5m persegi ', 0.5),
(30, 5, 'luas tempat tinggal < 5m persegi ', 1),
(33, 6, 'jenis dinding berkualitas baik (tembok)', 0.5),
(34, 6, 'jenis dinding berkualitas rendah (bambu/kayu)', 1),
(38, 7, 'keluarga mampu makan 3kali sehari', 0.5),
(39, 7, 'keluarga makan < 3 kali dalam sehari', 1),
(47, 9, 'dalam seminggu terdapat menu (ikan/daging)', 0.5),
(48, 9, 'tidak mampu menyediakan menu (daging/ikan)', 1),
(49, 10, 'mampu membeli pakaian baru > 1 dalam setahun', 0.5),
(50, 11, 'keluarga mampu berobat ke rumah sakit', 0.3),
(51, 11, 'tidak sanggup berobat di puskesmas', 0.5),
(52, 11, 'hanya menggunakan obat tradisional', 1),
(53, 12, 'kepala keluarga tidak lulus sekolah', 0.5),
(54, 12, 'kepala keluarga lulusan SMP atau lebih', 1),
(55, 13, 'Terdapat tanggunagan anak bersekolah ', 0.5),
(56, 13, 'tidak mempunyai tanggungan anak sekolah', 1),
(57, 14, 'anak mampu sekolah sampai SMA/SMK', 0.5),
(58, 14, 'anak putus sekolah sampai SMP', 1),
(59, 15, 'keluarga mampu mengikuti aktifitas sosial', 0.5),
(60, 15, 'tidak bisa mengikuti karna faktor ekonomi', 1),
(61, 10, 'tidak mampu membeli pakaian dalam 1 tahun', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `klasifikasi`
--

CREATE TABLE IF NOT EXISTS `klasifikasi` (
`id_klasifikasi` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_himpunan` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=287 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `klasifikasi`
--

INSERT INTO `klasifikasi` (`id_klasifikasi`, `id_alternatif`, `id_himpunan`) VALUES
(147, 1, 15),
(148, 1, 18),
(149, 1, 21),
(150, 1, 25),
(151, 1, 29),
(152, 1, 34),
(153, 1, 38),
(154, 1, 48),
(156, 1, 51),
(157, 1, 53),
(158, 1, 56),
(159, 1, 58),
(160, 1, 59),
(155, 1, 61),
(217, 2, 16),
(218, 2, 17),
(219, 2, 22),
(220, 2, 26),
(221, 2, 29),
(222, 2, 33),
(223, 2, 38),
(224, 2, 47),
(225, 2, 49),
(226, 2, 50),
(227, 2, 54),
(228, 2, 55),
(229, 2, 58),
(230, 2, 59),
(175, 5, 16),
(176, 5, 18),
(177, 5, 21),
(178, 5, 26),
(179, 5, 29),
(180, 5, 33),
(181, 5, 38),
(182, 5, 47),
(183, 5, 49),
(184, 5, 50),
(185, 5, 53),
(186, 5, 55),
(187, 5, 57),
(188, 5, 59),
(161, 6, 14),
(162, 6, 17),
(163, 6, 21),
(164, 6, 26),
(165, 6, 30),
(166, 6, 33),
(167, 6, 38),
(168, 6, 47),
(170, 6, 50),
(171, 6, 54),
(172, 6, 55),
(173, 6, 57),
(174, 6, 59),
(169, 6, 61),
(259, 7, 14),
(260, 7, 18),
(261, 7, 22),
(262, 7, 26),
(263, 7, 30),
(264, 7, 34),
(265, 7, 39),
(266, 7, 48),
(268, 7, 52),
(269, 7, 53),
(270, 7, 55),
(271, 7, 57),
(272, 7, 60),
(267, 7, 61),
(245, 8, 14),
(246, 8, 18),
(247, 8, 21),
(248, 8, 26),
(249, 8, 29),
(250, 8, 33),
(251, 8, 38),
(252, 8, 47),
(253, 8, 49),
(254, 8, 50),
(255, 8, 54),
(256, 8, 56),
(257, 8, 57),
(258, 8, 59),
(273, 9, 14),
(274, 9, 17),
(275, 9, 21),
(276, 9, 26),
(277, 9, 29),
(278, 9, 34),
(279, 9, 39),
(280, 9, 47),
(281, 9, 49),
(282, 9, 51),
(283, 9, 53),
(284, 9, 56),
(285, 9, 57),
(286, 9, 60);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
`id_kriteria` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `atribut` enum('benefit','cost') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama`, `atribut`) VALUES
(1, 'Pendapatan ', 'cost'),
(2, 'Aset 1', 'cost'),
(3, 'Aset  2', 'cost'),
(4, 'Aset 3', 'cost'),
(5, 'Papan (Tempat tinggal) 1', 'benefit'),
(6, 'Papan (Tempat tinggal) 2', 'benefit'),
(7, 'Pangan 1', 'benefit'),
(9, 'Pangan 2', 'benefit'),
(10, 'Sandang', 'benefit'),
(11, 'Kesehatan', 'benefit'),
(12, 'Pendidikan', 'benefit'),
(13, 'Pendidikan', 'benefit'),
(14, 'Pendidikan', 'benefit'),
(15, 'Sosial', 'benefit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
 ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `himpunan`
--
ALTER TABLE `himpunan`
 ADD PRIMARY KEY (`id_himpunan`), ADD KEY `id_kriteria` (`id_kriteria`), ADD KEY `id_kriteria_2` (`id_kriteria`);

--
-- Indexes for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
 ADD PRIMARY KEY (`id_klasifikasi`), ADD KEY `id_alternatif` (`id_alternatif`,`id_himpunan`), ADD KEY `id_himpunan` (`id_himpunan`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
 ADD PRIMARY KEY (`id_kriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `himpunan`
--
ALTER TABLE `himpunan`
MODIFY `id_himpunan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
MODIFY `id_klasifikasi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=287;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `himpunan`
--
ALTER TABLE `himpunan`
ADD CONSTRAINT `himpunan_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `klasifikasi`
--
ALTER TABLE `klasifikasi`
ADD CONSTRAINT `klasifikasi_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `klasifikasi_ibfk_2` FOREIGN KEY (`id_himpunan`) REFERENCES `himpunan` (`id_himpunan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
