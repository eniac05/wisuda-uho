-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2015 at 11:43 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wisuda`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nidn` varchar(45) DEFAULT NULL,
  `nama_dosen` varchar(45) DEFAULT NULL,
  `gelar_akademik` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE IF NOT EXISTS `fakultas` (
  `id_fakultas` char(2) NOT NULL,
  `nama_fakultas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`) VALUES
('F1', 'MIPA'),
('F2', 'FKIP');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `id_jurusan` char(4) NOT NULL,
  `nama_jurusan` varchar(100) DEFAULT NULL,
  `fakultas_id_fakultas` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `fakultas_id_fakultas`) VALUES
('F1J1', 'MATEMATIKA', 'F1'),
('F1J2', 'KIMIA', 'F1'),
('F2J1', 'PENDIDIKAN MATEMATIKA', 'F2'),
('F2J2', 'PENDIDIKAN FISIKA', 'F2');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE IF NOT EXISTS `kabupaten` (
  `id_kabupaten` int(11) NOT NULL,
  `nama_kabupaten` varchar(100) DEFAULT NULL,
  `provinsi_id_provinsi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id_kabupaten`, `nama_kabupaten`, `provinsi_id_provinsi`) VALUES
(1, 'MUNA', 1),
(2, 'KOTA KENDARI', 1),
(3, 'KOTA MAKASSAR', 2),
(4, 'BONE', 2),
(5, 'MAROS', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE IF NOT EXISTS `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(100) DEFAULT NULL,
  `kabupaten_id_kabupaten` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `perguruan_tinggi`
--

CREATE TABLE IF NOT EXISTS `perguruan_tinggi` (
  `id_perguruan_tinggi` int(11) NOT NULL,
  `nama_perguruan_tinggi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `perguruan_tinggi_has_wisudawan`
--

CREATE TABLE IF NOT EXISTS `perguruan_tinggi_has_wisudawan` (
  `perguruan_tinggi_id_perguruan_tinggi` int(11) NOT NULL,
  `wisudawan_nim` varchar(20) NOT NULL,
  `jenjang` varchar(2) DEFAULT NULL,
  `judul_ta` text,
  `ipk` decimal(4,2) DEFAULT NULL,
  `nilai_yudisium` decimal(4,2) DEFAULT NULL,
  `kategori_yudisium` varchar(45) DEFAULT NULL,
  `tanggal_yudisium` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE IF NOT EXISTS `periode` (
  `id_periode` int(11) NOT NULL,
  `nama_periode` varchar(145) DEFAULT NULL,
  `tanggal_wisuda` date DEFAULT NULL,
  `awal_pendaftaran` date DEFAULT NULL,
  `akhir_pendaftaran` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `program_studi`
--

CREATE TABLE IF NOT EXISTS `program_studi` (
  `id_program_studi` char(6) NOT NULL,
  `nama_program_studi` varchar(100) DEFAULT NULL,
  `jurusan_id_jurusan` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `program_studi`
--

INSERT INTO `program_studi` (`id_program_studi`, `nama_program_studi`, `jurusan_id_jurusan`) VALUES
('F1J1P1', 'ANALYSIS MATEMATIKA', 'F1J1'),
('F1J1P2', 'ILMU KOMPUTER', 'F1J1'),
('F1J1P3', 'STATISTIK', 'F1J1'),
('F2J1P1', 'PENDIDIKAN GURU SD MATEMATIKA', 'F2J1'),
('F2J1P2', 'PENDIDIKAN GURU SMP MATEMATIKA', 'F2J1'),
('F2J2P1', 'PENDIDIKAN FISIKA', 'F2J2');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE IF NOT EXISTS `provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `nama_provinsi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(1, 'SULAWESI TENGGARA'),
(2, 'SULAWESI SELATAN'),
(3, 'SULAWESI BARAT'),
(4, 'MALUKU'),
(5, 'JAWA TIMUR');

-- --------------------------------------------------------

--
-- Table structure for table `sma`
--

CREATE TABLE IF NOT EXISTS `sma` (
  `id_sma` int(11) NOT NULL,
  `nama_sma` varchar(100) DEFAULT NULL,
  `kabupaten_id_kabupaten` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sma`
--

INSERT INTO `sma` (`id_sma`, `nama_sma`, `kabupaten_id_kabupaten`) VALUES
(1, 'SMA 1 RAHA', 1),
(2, 'SMA 2 RAHA', 1),
(3, 'SMA 3 RAHA', 1),
(4, 'SMA 1 KENDARI', 2),
(5, 'SMA 3 KENDARI', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_mhs`
--

CREATE TABLE IF NOT EXISTS `user_mhs` (
  `nim` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wisudawan`
--

CREATE TABLE IF NOT EXISTS `wisudawan` (
  `nim` varchar(20) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `alamat` text,
  `no_hp` varchar(20) DEFAULT NULL,
  `nama_orang_tua` varchar(100) DEFAULT NULL,
  `alamat_orang_tua` text,
  `foto` text,
  `sma_id_sma` int(11) NOT NULL,
  `tahun_tamat` year(4) DEFAULT NULL,
  `periode_id_periode` int(11) NOT NULL,
  `waktu_daftar` timestamp NULL DEFAULT NULL,
  `sk_yudisium` enum('y','n') DEFAULT NULL,
  `pas_foto` enum('y','n') DEFAULT NULL,
  `foto_kopi_ijazah` enum('y','n') DEFAULT NULL,
  `foto_kopi_spp` enum('y','n') DEFAULT NULL,
  `foto_kopi_biaya_wisuda_non_ukt` enum('y','n') DEFAULT NULL,
  `berita_acara_penyerahan_skripsi_tesis` enum('y','n') DEFAULT NULL,
  `program_studi_id_program_studi` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wisudawan_has_dosen`
--

CREATE TABLE IF NOT EXISTS `wisudawan_has_dosen` (
  `wisudawan_nim` varchar(20) NOT NULL,
  `dosen_id_dosen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`), ADD KEY `fk_jurusan_fakultas1_idx` (`fakultas_id_fakultas`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`), ADD KEY `fk_kabupaten_provinsi1_idx` (`provinsi_id_provinsi`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`), ADD KEY `fk_kecamatan_kabupaten1_idx` (`kabupaten_id_kabupaten`);

--
-- Indexes for table `perguruan_tinggi`
--
ALTER TABLE `perguruan_tinggi`
  ADD PRIMARY KEY (`id_perguruan_tinggi`);

--
-- Indexes for table `perguruan_tinggi_has_wisudawan`
--
ALTER TABLE `perguruan_tinggi_has_wisudawan`
  ADD PRIMARY KEY (`perguruan_tinggi_id_perguruan_tinggi`,`wisudawan_nim`), ADD KEY `fk_perguruan_tinggi_has_wisudawan_wisudawan1_idx` (`wisudawan_nim`), ADD KEY `fk_perguruan_tinggi_has_wisudawan_perguruan_tinggi1_idx` (`perguruan_tinggi_id_perguruan_tinggi`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`id_program_studi`), ADD KEY `fk_program_studi_jurusan1_idx` (`jurusan_id_jurusan`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `sma`
--
ALTER TABLE `sma`
  ADD PRIMARY KEY (`id_sma`), ADD KEY `fk_sma_kabupaten1_idx` (`kabupaten_id_kabupaten`);

--
-- Indexes for table `user_mhs`
--
ALTER TABLE `user_mhs`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `wisudawan`
--
ALTER TABLE `wisudawan`
  ADD PRIMARY KEY (`nim`), ADD KEY `fk_wisudawan_sma1_idx` (`sma_id_sma`), ADD KEY `fk_wisudawan_periode1_idx` (`periode_id_periode`), ADD KEY `fk_wisudawan_program_studi1_idx` (`program_studi_id_program_studi`);

--
-- Indexes for table `wisudawan_has_dosen`
--
ALTER TABLE `wisudawan_has_dosen`
  ADD PRIMARY KEY (`wisudawan_nim`,`dosen_id_dosen`), ADD KEY `fk_wisudawan_has_dosen_dosen1_idx` (`dosen_id_dosen`), ADD KEY `fk_wisudawan_has_dosen_wisudawan1_idx` (`wisudawan_nim`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jurusan`
--
ALTER TABLE `jurusan`
ADD CONSTRAINT `fk_jurusan_fakultas1` FOREIGN KEY (`fakultas_id_fakultas`) REFERENCES `fakultas` (`id_fakultas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kabupaten`
--
ALTER TABLE `kabupaten`
ADD CONSTRAINT `fk_kabupaten_provinsi1` FOREIGN KEY (`provinsi_id_provinsi`) REFERENCES `provinsi` (`id_provinsi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kecamatan`
--
ALTER TABLE `kecamatan`
ADD CONSTRAINT `fk_kecamatan_kabupaten1` FOREIGN KEY (`kabupaten_id_kabupaten`) REFERENCES `kabupaten` (`id_kabupaten`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `perguruan_tinggi_has_wisudawan`
--
ALTER TABLE `perguruan_tinggi_has_wisudawan`
ADD CONSTRAINT `fk_perguruan_tinggi_has_wisudawan_perguruan_tinggi1` FOREIGN KEY (`perguruan_tinggi_id_perguruan_tinggi`) REFERENCES `perguruan_tinggi` (`id_perguruan_tinggi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_perguruan_tinggi_has_wisudawan_wisudawan1` FOREIGN KEY (`wisudawan_nim`) REFERENCES `wisudawan` (`nim`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `program_studi`
--
ALTER TABLE `program_studi`
ADD CONSTRAINT `fk_program_studi_jurusan1` FOREIGN KEY (`jurusan_id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sma`
--
ALTER TABLE `sma`
ADD CONSTRAINT `fk_sma_kabupaten1` FOREIGN KEY (`kabupaten_id_kabupaten`) REFERENCES `kabupaten` (`id_kabupaten`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `wisudawan`
--
ALTER TABLE `wisudawan`
ADD CONSTRAINT `fk_wisudawan_periode1` FOREIGN KEY (`periode_id_periode`) REFERENCES `periode` (`id_periode`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_wisudawan_program_studi1` FOREIGN KEY (`program_studi_id_program_studi`) REFERENCES `program_studi` (`id_program_studi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_wisudawan_sma1` FOREIGN KEY (`sma_id_sma`) REFERENCES `sma` (`id_sma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `wisudawan_has_dosen`
--
ALTER TABLE `wisudawan_has_dosen`
ADD CONSTRAINT `fk_wisudawan_has_dosen_dosen1` FOREIGN KEY (`dosen_id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_wisudawan_has_dosen_wisudawan1` FOREIGN KEY (`wisudawan_nim`) REFERENCES `wisudawan` (`nim`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
