-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2022 at 12:30 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spk_oreste_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE IF NOT EXISTS `alternatif` (
`id_alternatif` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nama`) VALUES
(45, 'Suriono, S.T'),
(46, 'Muhammad Teguh Pribadi, S.Pd'),
(47, 'Poppy Rahmadani, SE'),
(48, 'Merry Prasticha'),
(49, 'Sukemi, S.Pd');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE IF NOT EXISTS `hasil` (
`id_hasil` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_alternatif`, `nilai`) VALUES
(1, 45, 3.1648),
(2, 46, 3.1598),
(3, 47, 3.4178),
(4, 48, 3.2132),
(5, 49, 2.9068);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
`id_kriteria` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `kode_kriteria` varchar(100) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `keterangan`, `kode_kriteria`, `bobot`) VALUES
(40, 'Jam Mengajar', 'C1', 0.22),
(41, 'Masa Kerja', 'C2', 0.22),
(42, 'Pengajaran', 'C3', 0.2),
(43, 'Pendidikan', 'C4', 0.18),
(44, 'Jabatan', 'C5', 0.18);

-- --------------------------------------------------------

--
-- Table structure for table `matriks_x`
--

CREATE TABLE IF NOT EXISTS `matriks_x` (
`id_matriks_x` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matriks_x`
--

INSERT INTO `matriks_x` (`id_matriks_x`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(1, 45, 40, 80),
(2, 45, 41, 80),
(3, 45, 42, 80),
(4, 45, 43, 60),
(5, 45, 44, 80),
(6, 46, 40, 80),
(7, 46, 41, 60),
(8, 46, 42, 90),
(9, 46, 43, 60),
(10, 46, 44, 80),
(11, 47, 40, 80),
(12, 47, 41, 60),
(13, 47, 42, 80),
(14, 47, 43, 60),
(15, 47, 44, 80),
(16, 48, 40, 90),
(17, 48, 41, 40),
(18, 48, 42, 90),
(19, 48, 43, 40),
(20, 48, 44, 80),
(21, 49, 40, 80),
(22, 49, 41, 80),
(23, 49, 42, 90),
(24, 49, 43, 60),
(25, 49, 44, 80);

-- --------------------------------------------------------

--
-- Table structure for table `matriks_x_hasil`
--

CREATE TABLE IF NOT EXISTS `matriks_x_hasil` (
`id_matriks_x_hasil` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` float NOT NULL,
  `rank` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matriks_x_hasil`
--

INSERT INTO `matriks_x_hasil` (`id_matriks_x_hasil`, `id_alternatif`, `id_kriteria`, `nilai`, `rank`) VALUES
(1, 48, 40, 90, 1),
(2, 45, 40, 80, 3.5),
(3, 46, 40, 80, 3.5),
(4, 49, 40, 80, 3.5),
(5, 47, 40, 80, 3.5),
(6, 45, 41, 80, 1.5),
(7, 49, 41, 80, 1.5),
(8, 46, 41, 60, 3.5),
(9, 47, 41, 60, 3.5),
(10, 48, 41, 40, 5),
(11, 48, 42, 90, 2),
(12, 46, 42, 90, 2),
(13, 49, 42, 90, 2),
(14, 45, 42, 80, 4.5),
(15, 47, 42, 80, 4.5),
(16, 45, 43, 60, 2.5),
(17, 46, 43, 60, 2.5),
(18, 49, 43, 60, 2.5),
(19, 47, 43, 60, 2.5),
(20, 48, 43, 40, 5),
(21, 45, 44, 80, 3),
(22, 48, 44, 80, 3),
(23, 46, 44, 80, 3),
(24, 49, 44, 80, 3),
(25, 47, 44, 80, 3);

-- --------------------------------------------------------

--
-- Table structure for table `matriks_x_rank`
--

CREATE TABLE IF NOT EXISTS `matriks_x_rank` (
`id_matriks_x_rank` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` float NOT NULL,
  `rank` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matriks_x_rank`
--

INSERT INTO `matriks_x_rank` (`id_matriks_x_rank`, `id_alternatif`, `id_kriteria`, `nilai`, `rank`) VALUES
(1, 48, 40, 90, 1),
(2, 45, 40, 80, 2),
(3, 46, 40, 80, 3),
(4, 49, 40, 80, 4),
(5, 47, 40, 80, 5),
(6, 45, 41, 80, 1),
(7, 49, 41, 80, 2),
(8, 46, 41, 60, 3),
(9, 47, 41, 60, 4),
(10, 48, 41, 40, 5),
(11, 48, 42, 90, 1),
(12, 46, 42, 90, 2),
(13, 49, 42, 90, 3),
(14, 45, 42, 80, 4),
(15, 47, 42, 80, 5),
(16, 45, 43, 60, 1),
(17, 46, 43, 60, 2),
(18, 49, 43, 60, 3),
(19, 47, 43, 60, 4),
(20, 48, 43, 40, 5),
(21, 45, 44, 80, 1),
(22, 48, 44, 80, 2),
(23, 46, 44, 80, 3),
(24, 49, 44, 80, 4),
(25, 47, 44, 80, 5);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_r`
--

CREATE TABLE IF NOT EXISTS `nilai_r` (
`id_nilai_r` int(11) NOT NULL,
  `nilai` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_r`
--

INSERT INTO `nilai_r` (`id_nilai_r`, `nilai`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE IF NOT EXISTS `penilaian` (
`id_penilaian` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=265 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(240, 45, 40, 171),
(241, 45, 41, 174),
(242, 45, 42, 178),
(243, 45, 43, 183),
(244, 45, 44, 186),
(245, 46, 40, 171),
(246, 46, 41, 175),
(247, 46, 42, 177),
(248, 46, 43, 183),
(249, 46, 44, 186),
(250, 47, 40, 171),
(251, 47, 41, 175),
(252, 47, 42, 178),
(253, 47, 43, 183),
(254, 47, 44, 186),
(255, 48, 40, 170),
(256, 48, 41, 176),
(257, 48, 42, 177),
(258, 48, 43, 184),
(259, 48, 44, 186),
(260, 49, 40, 171),
(261, 49, 41, 174),
(262, 49, 42, 177),
(263, 49, 43, 183),
(264, 49, 44, 186);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE IF NOT EXISTS `sub_kriteria` (
`id_sub_kriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `nilai` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_sub_kriteria`, `id_kriteria`, `deskripsi`, `nilai`) VALUES
(170, 40, 'Jam mengajar lebih dari (>25 Jam)', 90),
(171, 40, 'Jam mengajar (18 s.d 24 Jam)', 80),
(172, 40, 'Jam mengajar (10 s.d 17 Jam)', 60),
(173, 41, 'Masa kerja lebih dari (>20 Tahun)', 90),
(174, 41, ' Masa kerja (15 s/d 19 Tahun)', 80),
(175, 41, 'Masa kerja (8 s/d 14  Tahun)', 60),
(176, 41, 'Masa kerja (1 s/d 7 Tahun)', 40),
(177, 42, 'Sangat menguasai dalam mengajar', 90),
(178, 42, ' Menguasai dalam mengajar', 80),
(179, 42, 'Cukup menguasai dalam mengajar', 60),
(180, 42, 'Kurang menguasai dalam mengajar', 40),
(181, 43, 'S3', 90),
(182, 43, 'S2', 80),
(183, 43, 'S1', 60),
(184, 43, 'SMA / SMK', 40),
(185, 44, 'Guru Kelas', 90),
(186, 44, 'Guru Mata Pelajaran', 80),
(187, 44, 'Guru Peminatan / Kejuruan', 60);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_user_level`, `nama`, `email`, `username`, `password`) VALUES
(1, 1, 'Admin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(7, 2, 'Kepala Sekolah', 'kepalasekolah@gmail.com', 'kepsek', '8561863b55faf85b9ad67c52b3b851ac');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE IF NOT EXISTS `user_level` (
`id_user_level` int(11) NOT NULL,
  `user_level` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id_user_level`, `user_level`) VALUES
(1, 'Administrator'),
(2, 'Pimpinan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
 ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
 ADD PRIMARY KEY (`id_hasil`), ADD KEY `id_alternatif` (`id_alternatif`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
 ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `matriks_x`
--
ALTER TABLE `matriks_x`
 ADD PRIMARY KEY (`id_matriks_x`);

--
-- Indexes for table `matriks_x_hasil`
--
ALTER TABLE `matriks_x_hasil`
 ADD PRIMARY KEY (`id_matriks_x_hasil`);

--
-- Indexes for table `matriks_x_rank`
--
ALTER TABLE `matriks_x_rank`
 ADD PRIMARY KEY (`id_matriks_x_rank`);

--
-- Indexes for table `nilai_r`
--
ALTER TABLE `nilai_r`
 ADD PRIMARY KEY (`id_nilai_r`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
 ADD PRIMARY KEY (`id_penilaian`), ADD KEY `id_alternatif` (`id_alternatif`), ADD KEY `id_kriteria` (`id_kriteria`), ADD KEY `nilai` (`nilai`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
 ADD PRIMARY KEY (`id_sub_kriteria`), ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`), ADD KEY `id_user_level` (`id_user_level`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
 ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `matriks_x`
--
ALTER TABLE `matriks_x`
MODIFY `id_matriks_x` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `matriks_x_hasil`
--
ALTER TABLE `matriks_x_hasil`
MODIFY `id_matriks_x_hasil` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `matriks_x_rank`
--
ALTER TABLE `matriks_x_rank`
MODIFY `id_matriks_x_rank` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `nilai_r`
--
ALTER TABLE `nilai_r`
MODIFY `id_nilai_r` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=265;
--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=188;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil`
--
ALTER TABLE `hasil`
ADD CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `penilaian_ibfk_3` FOREIGN KEY (`nilai`) REFERENCES `sub_kriteria` (`id_sub_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
ADD CONSTRAINT `sub_kriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_user_level`) REFERENCES `user_level` (`id_user_level`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
