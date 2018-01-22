-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22 Jan 2018 pada 15.18
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `no_kk`, `nama`, `rt`, `rw`) VALUES
(1, '920626394064', 'SLAMET', '03', '06'),
(2, '913024736328', 'AGUS SALIM', '03', '06'),
(5, '858207633125', 'SUTILAH', '03', '04'),
(6, '845330030873', 'NGADIRIN', '02', '04'),
(7, '904508675832', 'FUAD AMIN', '03', '06'),
(8, '904508675831', 'PATIMAH', '03', '04'),
(9, '844035527581', 'DARSIMAN', '03', '06'),
(10, '788009828884', 'SUNARTO', '01', '05'),
(11, '833864186047', 'TUKINAH', '01', '06'),
(12, '836242312806', 'SARYANI', '01', '06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE IF NOT EXISTS `hasil` (
`id_hasil` int(11) NOT NULL,
  `no_kk` int(11) NOT NULL,
  `nama` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `cluster` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `himpunan`
--

CREATE TABLE IF NOT EXISTS `himpunan` (
`id_himpunan` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `himpunan`
--

INSERT INTO `himpunan` (`id_himpunan`, `id_kriteria`, `nama`, `nilai`) VALUES
(14, 1, 'tidak bekerja', 0.3),
(15, 1, 'Pendapatan < = Rp.500.000', 0.5),
(16, 1, 'Pendapatan > Rp.500.000', 1),
(17, 2, 'Rumah Milik Sendiri', 0.5),
(18, 2, 'Rumah kontrak/ sewa', 1),
(21, 3, 'memiliki aset > Rp.1.800.000', 0.5),
(22, 3, ' Tidak memiliki Aset > Rp.1.800.000', 1),
(25, 4, 'Tagihan listrik < Rp.50.000 per bulan', 0.5),
(26, 4, 'Tagihan listrik > Rp.50.000 per bulam', 1),
(29, 5, 'luas rata" > 5m persegi ', 0.5),
(30, 5, 'luas rata" < 5m persegi ', 1),
(33, 6, 'jenis dinding berkualitas baik (tembok)', 0.5),
(34, 6, 'jenis dinding berkualitas rendah (bambu/kayu)', 1),
(38, 7, 'keluarga mampu makan 3kali sehari', 0.5),
(39, 7, 'keluarga makan < 3 kali dalam sehari', 1),
(47, 9, 'dalam seminggu terdapat menu (ikan/daging/telur)', 0.5),
(48, 9, 'tidak mampu menyediakan menu (ikan/daging/telur)', 1),
(49, 10, 'mampu membeli pakaian baru > 1 dalam setahun', 0.5),
(51, 11, 'tidak mampu membayar tindakan di puskesmas', 0.5),
(52, 11, 'mampu membayar tindakan di puskesmas', 1),
(53, 12, 'kepala keluarga tidak lulus sekolah', 0.5),
(54, 12, 'kepala keluarga lulusan SMP atau lebih', 1),
(55, 13, 'Terdapat tanggunagan anak bersekolah ', 0.5),
(56, 13, 'tidak mempunyai tanggungan anak sekolah', 1),
(57, 14, 'anak putus sekolah samapi SMP', 0.5),
(58, 14, 'anak mampu sekolah sampai SMA/SMK', 1),
(59, 15, 'keluarga tidak mampu mengikuti aktifitas sosial', 0.5),
(60, 15, 'keluarga mampu mengikuti aktifitas sosial', 1),
(61, 10, 'hanya mampu membeli max 1 pakaian baru', 1),
(62, 16, 'sumber air  dari PAM', 0.5),
(63, 16, 'sumber air tidak dari PAM', 1),
(64, 17, 'tidak memiliki sarana MCK', 0.5),
(65, 17, 'memiliki sarana MCK', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `klasifikasi`
--

CREATE TABLE IF NOT EXISTS `klasifikasi` (
`id_klasifikasi` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_himpunan` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=737 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `klasifikasi`
--

INSERT INTO `klasifikasi` (`id_klasifikasi`, `id_alternatif`, `id_himpunan`) VALUES
(609, 1, 15),
(610, 1, 18),
(611, 1, 21),
(612, 1, 25),
(613, 1, 29),
(614, 1, 34),
(615, 1, 38),
(616, 1, 47),
(618, 1, 51),
(619, 1, 53),
(620, 1, 56),
(621, 1, 58),
(622, 1, 59),
(617, 1, 61),
(623, 1, 63),
(624, 1, 65),
(497, 2, 16),
(498, 2, 17),
(499, 2, 22),
(500, 2, 26),
(501, 2, 29),
(502, 2, 33),
(503, 2, 38),
(504, 2, 47),
(505, 2, 49),
(506, 2, 52),
(507, 2, 54),
(508, 2, 55),
(509, 2, 58),
(510, 2, 59),
(511, 2, 63),
(512, 2, 65),
(721, 5, 16),
(722, 5, 17),
(723, 5, 22),
(724, 5, 25),
(725, 5, 29),
(726, 5, 33),
(727, 5, 38),
(728, 5, 48),
(729, 5, 49),
(730, 5, 52),
(731, 5, 54),
(732, 5, 56),
(733, 5, 57),
(734, 5, 60),
(735, 5, 63),
(736, 5, 65),
(657, 6, 14),
(658, 6, 17),
(659, 6, 21),
(660, 6, 25),
(661, 6, 30),
(662, 6, 34),
(663, 6, 38),
(664, 6, 48),
(666, 6, 51),
(667, 6, 53),
(668, 6, 55),
(669, 6, 57),
(670, 6, 59),
(665, 6, 61),
(671, 6, 63),
(672, 6, 65),
(689, 7, 15),
(690, 7, 17),
(691, 7, 22),
(692, 7, 26),
(693, 7, 29),
(694, 7, 34),
(695, 7, 39),
(696, 7, 48),
(697, 7, 49),
(698, 7, 52),
(699, 7, 53),
(700, 7, 55),
(701, 7, 57),
(702, 7, 60),
(703, 7, 63),
(704, 7, 64),
(641, 8, 14),
(642, 8, 18),
(643, 8, 21),
(644, 8, 26),
(645, 8, 29),
(646, 8, 33),
(647, 8, 38),
(648, 8, 47),
(649, 8, 49),
(650, 8, 52),
(651, 8, 54),
(652, 8, 56),
(653, 8, 57),
(654, 8, 59),
(655, 8, 62),
(656, 8, 65),
(513, 9, 14),
(514, 9, 17),
(515, 9, 21),
(516, 9, 26),
(517, 9, 29),
(518, 9, 34),
(519, 9, 39),
(520, 9, 47),
(521, 9, 49),
(522, 9, 51),
(523, 9, 53),
(524, 9, 56),
(525, 9, 57),
(526, 9, 60),
(527, 9, 63),
(528, 9, 65),
(673, 10, 14),
(674, 10, 17),
(675, 10, 22),
(676, 10, 25),
(677, 10, 30),
(678, 10, 34),
(679, 10, 38),
(680, 10, 48),
(682, 10, 51),
(683, 10, 53),
(684, 10, 55),
(685, 10, 57),
(686, 10, 60),
(681, 10, 61),
(687, 10, 63),
(688, 10, 64),
(705, 11, 16),
(706, 11, 17),
(707, 11, 21),
(708, 11, 26),
(709, 11, 29),
(710, 11, 33),
(711, 11, 38),
(712, 11, 47),
(713, 11, 49),
(714, 11, 52),
(715, 11, 53),
(716, 11, 55),
(717, 11, 57),
(718, 11, 60),
(719, 11, 63),
(720, 11, 65),
(561, 12, 15),
(562, 12, 17),
(563, 12, 22),
(564, 12, 25),
(565, 12, 29),
(566, 12, 33),
(567, 12, 38),
(568, 12, 48),
(569, 12, 49),
(570, 12, 52),
(571, 12, 53),
(572, 12, 56),
(573, 12, 57),
(574, 12, 60),
(575, 12, 63),
(576, 12, 65);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
`id_kriteria` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `atribut` enum('benefit','cost') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama`, `atribut`) VALUES
(1, 'Pendapatan rata" keluarga', 'cost'),
(2, 'kepemilikan rumah', 'benefit'),
(3, 'jumlah aset selain tanah', 'cost'),
(4, 'tagihan listrk', 'cost'),
(5, 'luas tempat tinggal rata" anggota keluarga', 'benefit'),
(6, 'jenis dinding bidang terluas tempat tinggal', 'benefit'),
(7, 'kemampuan makan per hari', 'benefit'),
(9, 'jenis lauk', 'benefit'),
(10, 'Sandang', 'benefit'),
(11, 'Kesehatan', 'cost'),
(12, 'Pendidikan orang tua', 'benefit'),
(13, 'tanggunan Pendidikan ', 'benefit'),
(14, 'jenjang Pendidikan anak', 'cost'),
(15, 'Sosial', 'cost'),
(16, 'sumber air minum dan masak', 'cost'),
(17, 'sarana MCK', 'cost');

-- --------------------------------------------------------

--
-- Struktur dari tabel `simpan`
--

CREATE TABLE IF NOT EXISTS `simpan` (
`id_hasil` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nilai` int(11) NOT NULL,
  `kluster` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
 ADD PRIMARY KEY (`id_hasil`);

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
-- Indexes for table `simpan`
--
ALTER TABLE `simpan`
 ADD PRIMARY KEY (`id_hasil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `himpunan`
--
ALTER TABLE `himpunan`
MODIFY `id_himpunan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
MODIFY `id_klasifikasi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=737;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `simpan`
--
ALTER TABLE `simpan`
MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT;
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
