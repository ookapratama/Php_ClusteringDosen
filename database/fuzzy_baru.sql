-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table cluster_dosen.tb_admin
CREATE TABLE IF NOT EXISTS `tb_admin` (
  `user` varchar(16) NOT NULL,
  `pass` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table cluster_dosen.tb_admin: ~0 rows (approximately)
DELETE FROM `tb_admin`;
INSERT INTO `tb_admin` (`user`, `pass`) VALUES
	('admin', 'admin');

-- Dumping structure for table cluster_dosen.tb_bidangilmu
CREATE TABLE IF NOT EXISTS `tb_bidangilmu` (
  `id_bidangilmu` int NOT NULL AUTO_INCREMENT,
  `nama_bidangilmu` varchar(35) NOT NULL,
  PRIMARY KEY (`nama_bidangilmu`),
  KEY `kelas_id` (`id_bidangilmu`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table cluster_dosen.tb_bidangilmu: ~5 rows (approximately)
DELETE FROM `tb_bidangilmu`;
INSERT INTO `tb_bidangilmu` (`id_bidangilmu`, `nama_bidangilmu`) VALUES
	(9, 'Sains'),
	(10, 'Komputer'),
	(11, 'Sistem Informasi'),
	(12, 'Elektro'),
	(13, 'Manajemen Bisnis');

-- Dumping structure for table cluster_dosen.tb_dosen
CREATE TABLE IF NOT EXISTS `tb_dosen` (
  `id_dosen` int NOT NULL AUTO_INCREMENT,
  `kode_dosen` varchar(255) NOT NULL,
  `nama_dosen` varchar(30) NOT NULL,
  `nidn` varchar(25) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `pendidikan_s1` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pendidikan_s2` varchar(50) DEFAULT NULL,
  `pendidikan_s3` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` enum('Islam','Kristen Protestan','Katolik','Hindu','Buddha','Kong Hu Cu') NOT NULL,
  `prodi_id` int NOT NULL,
  `nama_bidangilmu` varchar(35) NOT NULL,
  `hitung` enum('Ya','Tidak') DEFAULT NULL,
  PRIMARY KEY (`id_dosen`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- Dumping data for table cluster_dosen.tb_dosen: ~21 rows (approximately)
DELETE FROM `tb_dosen`;
INSERT INTO `tb_dosen` (`id_dosen`, `kode_dosen`, `nama_dosen`, `nidn`, `jenis_kelamin`, `pendidikan_s1`, `pendidikan_s2`, `pendidikan_s3`, `tempat_lahir`, `tanggal_lahir`, `agama`, `prodi_id`, `nama_bidangilmu`, `hitung`) VALUES
	(14, 'TIA0002', 'Abdul Kadir Jailani, S.Kom., M', '0025067501', 'Laki-laki', NULL, NULL, NULL, 'Maros', '2024-02-21', 'Kristen Protestan', 4, 'K1', 'Ya'),
	(15, 'TIA0003', 'Abdul Rauf, Dr., S.H., M.H.', '0924097202', 'Laki-laki', NULL, NULL, NULL, 'Maros', '2024-02-28', 'Katolik', 4, 'K1', 'Ya'),
	(16, 'TIA0004', 'Abdul Ibrahim, Dr., S.T., M.T.', '931127016', 'Laki-laki', NULL, NULL, NULL, 'Maros', '2024-02-23', 'Kristen Protestan', 4, 'K1', 'Ya'),
	(17, 'TIA0005', 'Ahyuna, S.Kom., M.I.Kom.', '0914118501', 'Perempuan', NULL, NULL, NULL, 'Maros', '2024-02-28', 'Islam', 4, 'K3', 'Ya'),
	(18, 'SIA0001', 'Akbar Bahtiar, SE.,MM', '0906098001', 'Laki-laki', NULL, NULL, NULL, 'Maros', '2024-02-14', 'Islam', 5, '0', 'Ya'),
	(19, 'SIA0002', 'Andi Asvin Mahersatillah Surad', '0903069501', 'Laki-laki', NULL, NULL, NULL, 'Maros', '2024-01-30', 'Islam', 5, '0', 'Ya'),
	(20, 'SIA0003', 'Andi Irmayana, S.Kom., M.T.', '0918098501', 'Perempuan', NULL, NULL, NULL, 'Maros', '2024-02-21', 'Islam', 5, '0', 'Ya'),
	(21, 'SIA0004', 'Angdy Erna, S.Kom., M.Si.', '0027077601', 'Perempuan', NULL, NULL, NULL, 'Maros', '2024-02-16', 'Islam', 5, '0', 'Ya'),
	(22, 'MIA0001', 'Arham Arifin, S.Kom., M.T', '0905058904', 'Laki-laki', NULL, NULL, NULL, 'Maros', '2024-02-21', 'Kristen Protestan', 6, '0', 'Ya'),
	(23, 'MIA0002', 'Asrul Syam, S.Si.,M.Si.', '0930128405', 'Laki-laki', NULL, NULL, NULL, 'Maros', '2024-02-22', 'Islam', 6, '0', 'Ya'),
	(24, 'MIA0003', 'Baharuddin Rahman, Dr., Drs, M', '0911036101', 'Laki-laki', NULL, NULL, NULL, 'Maros', '2024-02-20', 'Katolik', 6, '0', 'Ya'),
	(25, 'MIA0004', 'Fadel Muslaini, S.Pd.,M.Pd.', '0912109201', 'Laki-laki', NULL, NULL, NULL, 'Maros', '2024-02-15', 'Kristen Protestan', 6, '0', 'Ya'),
	(26, 'RPLA0001', 'Andi Asvin Mahersatillah Surad', '0903069501', 'Laki-laki', NULL, NULL, NULL, 'Maros', '2024-02-28', 'Kristen Protestan', 7, 'K3', 'Ya'),
	(27, 'RPLA0002', 'Annah, S.Kom., M.T.', '0907087903', 'Perempuan', NULL, NULL, NULL, 'Maros', '2024-02-07', 'Kristen Protestan', 7, '0', 'Ya'),
	(28, 'TIA0006', 'Arham Arifin, S.Kom., M.T', '0905058904', 'Laki-laki', 'S.Kom', 'M.Kom', '-', 'Maros', '2024-02-23', 'Islam', 4, 'K2', 'Ya'),
	(30, 'BD00069', 'Ooka Pratama', '202249', 'Laki-laki', 'S.Kom', 'M.Kom', '-', 'Makassar', '2024-04-25', 'Islam', 11, 'K1', 'Ya'),
	(31, 'BD112233', 'OOka', '20224946456', 'Laki-laki', 'S.Kom', '-', '-', 'Makassar', '2024-05-22', 'Islam', 11, '0', 'Ya'),
	(32, 'SIA00005', 'Abdul Kadir Jailani, S.Kom., M', '20224946456', 'Laki-laki', '-', '-', '-', 'Makassar', '2024-05-27', 'Islam', 5, '0', 'Ya'),
	(33, 'TIA000061', 'Abdul Kadir Jailani, S.Kom., M', '20224946456', 'Laki-laki', '-', '-', '-', 'Makassar', '2024-05-27', 'Hindu', 4, '0', 'Ya'),
	(34, 'TI001', 'Ardimansyah', '202249', 'Laki-laki', 'S.Kom', '-', '-', 'Makassar', '2024-05-29', 'Hindu', 4, '0', 'Ya'),
	(35, 'TI002', 'Ardimansyah', '20224946456', 'Laki-laki', 'S.Kom', '-', '-', 'Makassar', '2024-05-29', 'Kristen Protestan', 4, '0', 'Ya');

-- Dumping structure for table cluster_dosen.tb_kriteria
CREATE TABLE IF NOT EXISTS `tb_kriteria` (
  `id_kriteria` int NOT NULL AUTO_INCREMENT,
  `kode_kriteria` varchar(16) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Dumping data for table cluster_dosen.tb_kriteria: ~5 rows (approximately)
DELETE FROM `tb_kriteria`;
INSERT INTO `tb_kriteria` (`id_kriteria`, `kode_kriteria`, `nama_kriteria`) VALUES
	(4, 'K1', 'Komputer'),
	(12, 'K2', 'Sistem Informasi'),
	(13, 'K3', 'Elektro'),
	(15, 'K4', 'Manajemen Bisnis'),
	(16, 'K5', 'Sains');

-- Dumping structure for table cluster_dosen.tb_penelitian
CREATE TABLE IF NOT EXISTS `tb_penelitian` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `kode_dosen` varchar(50) NOT NULL DEFAULT '',
  `judul_jurnal` varchar(100) NOT NULL DEFAULT '',
  `bidang_ilmu` int NOT NULL DEFAULT '0',
  `mata_kuliah` varchar(50) DEFAULT NULL,
  `tahunJurnal` varchar(50) DEFAULT NULL,
  `judulBimbingan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table cluster_dosen.tb_penelitian: ~4 rows (approximately)
DELETE FROM `tb_penelitian`;
INSERT INTO `tb_penelitian` (`id`, `kode_dosen`, `judul_jurnal`, `bidang_ilmu`, `mata_kuliah`, `tahunJurnal`, `judulBimbingan`) VALUES
	(51, '30', 'Jurnal Implementasi Design THinking', 16, 'Akuntansi', NULL, NULL),
	(52, '30', 'Jurnal Implementasi Design THinking111', 16, 'Akuntansi', NULL, NULL),
	(53, '30', 'Jurnal Implementasi Design THinking012132', 15, 'Akuntansi', NULL, NULL),
	(54, '30', 'Jurnal Implementasi Design THinking111555', 15, 'Akuntansi', NULL, NULL),
	(55, '30', 'Photn', 15, 'asd', '2021', 'asd'),
	(56, '30', 'kjhkj', 13, 'web', '2022', 'lkjl'),
	(57, '30', 'as', 4, 'as', '2022', 'ada');

-- Dumping structure for table cluster_dosen.tb_prodi
CREATE TABLE IF NOT EXISTS `tb_prodi` (
  `prodi_id` int NOT NULL AUTO_INCREMENT,
  `nama_prodi` varchar(20) DEFAULT NULL,
  `status` enum('aktif','tidak aktif') DEFAULT NULL,
  PRIMARY KEY (`prodi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table cluster_dosen.tb_prodi: ~0 rows (approximately)
DELETE FROM `tb_prodi`;
INSERT INTO `tb_prodi` (`prodi_id`, `nama_prodi`, `status`) VALUES
	(4, 'TI', 'aktif'),
	(5, 'SI', 'aktif'),
	(6, 'MI', 'aktif'),
	(7, 'RPL', 'aktif'),
	(10, 'Kewirausahaan', 'aktif'),
	(11, 'Bisnis Digital', 'aktif');

-- Dumping structure for table cluster_dosen.tb_rel_dosen
CREATE TABLE IF NOT EXISTS `tb_rel_dosen` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `id_dosen` int NOT NULL,
  `id_kriteria` int NOT NULL,
  `nilai` double NOT NULL,
  `prodi_id` int NOT NULL,
  `nilai_kriteria` int DEFAULT '0',
  `penelitian` int DEFAULT '0',
  `pengajaran` int DEFAULT '0',
  `bimbingan` int DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `id_siswa` (`id_dosen`),
  KEY `id_kriteria` (`id_kriteria`),
  KEY `tahun_id` (`prodi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=491 DEFAULT CHARSET=latin1;

-- Dumping data for table cluster_dosen.tb_rel_dosen: ~0 rows (approximately)
DELETE FROM `tb_rel_dosen`;
INSERT INTO `tb_rel_dosen` (`ID`, `id_dosen`, `id_kriteria`, `nilai`, `prodi_id`, `nilai_kriteria`, `penelitian`, `pengajaran`, `bimbingan`) VALUES
	(41, 0, 4, 6, 4, 0, 0, 0, 0),
	(44, 0, 4, 6, 4, 0, 0, 0, 0),
	(47, 0, 4, 6, 4, 0, 0, 0, 0),
	(50, 0, 4, 6, 4, 0, 0, 0, 0),
	(53, 0, 4, 6, 4, 0, 0, 0, 0),
	(56, 0, 4, 6, 4, 0, 0, 0, 0),
	(62, 14, 4, 9, 4, 0, 0, 0, 0),
	(65, 15, 4, 9, 4, 0, 0, 0, 0),
	(68, 16, 4, 9, 4, 0, 0, 0, 0),
	(71, 17, 4, 8, 4, 0, 0, 0, 0),
	(74, 18, 4, 6, 5, 0, 0, 0, 0),
	(77, 19, 4, 6, 5, 0, 0, 0, 0),
	(80, 20, 4, 6, 5, 0, 0, 0, 0),
	(83, 21, 4, 6, 5, 0, 0, 0, 0),
	(86, 22, 4, 5, 6, 0, 0, 0, 0),
	(89, 23, 4, 5, 6, 0, 0, 0, 0),
	(92, 24, 4, 5, 6, 0, 0, 0, 0),
	(95, 25, 4, 5, 6, 0, 0, 0, 0),
	(98, 26, 4, 6, 7, 0, 0, 0, 0),
	(101, 27, 4, 6, 7, 0, 0, 0, 0),
	(198, 14, 12, 3, 0, 0, 0, 0, 0),
	(199, 15, 12, 2, 0, 0, 0, 0, 0),
	(200, 16, 12, 3, 0, 0, 0, 0, 0),
	(201, 17, 12, 2, 0, 0, 0, 0, 0),
	(202, 18, 12, -1, 0, 0, 0, 0, 0),
	(203, 19, 12, -1, 0, 0, 0, 0, 0),
	(204, 20, 12, -1, 0, 0, 0, 0, 0),
	(205, 21, 12, -1, 0, 0, 0, 0, 0),
	(206, 22, 12, -1, 0, 0, 0, 0, 0),
	(207, 23, 12, -1, 0, 0, 0, 0, 0),
	(208, 24, 12, -1, 0, 0, 0, 0, 0),
	(209, 25, 12, -1, 0, 0, 0, 0, 0),
	(210, 26, 12, -1, 0, 0, 0, 0, 0),
	(211, 27, 12, -1, 0, 0, 0, 0, 0),
	(213, 14, 13, 3, 0, 0, 0, 0, 0),
	(214, 15, 13, 3, 0, 0, 0, 0, 0),
	(215, 16, 13, 3, 0, 0, 0, 0, 0),
	(216, 17, 13, 3, 0, 0, 0, 0, 0),
	(217, 18, 13, 0, 0, 0, 0, 0, 0),
	(218, 19, 13, 0, 0, 0, 0, 0, 0),
	(219, 20, 13, 0, 0, 0, 0, 0, 0),
	(220, 21, 13, 0, 0, 0, 0, 0, 0),
	(221, 22, 13, 6, 0, 0, 0, 0, 0),
	(222, 23, 13, 0, 0, 0, 0, 0, 0),
	(223, 24, 13, 0, 0, 0, 0, 0, 0),
	(224, 25, 13, 0, 0, 0, 0, 0, 0),
	(225, 26, 13, 0, 0, 0, 0, 0, 0),
	(226, 27, 13, 0, 0, 0, 0, 0, 0),
	(243, 14, 15, 3, 0, 0, 0, 0, 0),
	(244, 15, 15, 4, 0, 0, 0, 0, 0),
	(245, 16, 15, 4, 0, 0, 0, 0, 0),
	(246, 17, 15, 2, 0, 0, 0, 0, 0),
	(247, 18, 15, 0, 0, 0, 0, 0, 0),
	(248, 19, 15, 0, 0, 0, 0, 0, 0),
	(249, 20, 15, 0, 0, 0, 0, 0, 0),
	(250, 21, 15, 0, 0, 0, 0, 0, 0),
	(251, 22, 15, 0, 0, 0, 0, 0, 0),
	(252, 23, 15, 0, 0, 0, 0, 0, 0),
	(253, 24, 15, 0, 0, 0, 0, 0, 0),
	(254, 25, 15, 0, 0, 0, 0, 0, 0),
	(255, 26, 15, 0, 0, 0, 0, 0, 0),
	(256, 27, 15, 0, 0, 0, 0, 0, 0),
	(258, 14, 16, 2, 0, 0, 0, 0, 0),
	(259, 15, 16, 3, 0, 0, 0, 0, 0),
	(260, 16, 16, 2, 0, 0, 0, 0, 0),
	(261, 17, 16, 1, 0, 0, 0, 0, 0),
	(262, 18, 16, -1, 0, 0, 0, 0, 0),
	(263, 19, 16, 4, 0, 0, 0, 0, 0),
	(264, 20, 16, -1, 0, 0, 0, 0, 0),
	(265, 21, 16, -1, 0, 0, 0, 0, 0),
	(266, 22, 16, -1, 0, 0, 0, 0, 0),
	(267, 23, 16, -1, 0, 0, 0, 0, 0),
	(268, 24, 16, -1, 0, 0, 0, 0, 0),
	(269, 25, 16, -1, 0, 0, 0, 0, 0),
	(270, 26, 16, -1, 0, 0, 0, 0, 0),
	(271, 27, 16, -1, 0, 0, 0, 0, 0),
	(332, 0, 4, 6, 4, 0, 0, 0, 0),
	(333, 0, 12, 0, 4, 0, 0, 0, 0),
	(334, 0, 13, 1, 4, 0, 0, 0, 0),
	(335, 0, 15, 1, 4, 0, 0, 0, 0),
	(336, 0, 16, 0, 4, 0, 0, 0, 0),
	(347, 0, 4, 6, 4, 0, 0, 0, 0),
	(348, 0, 12, 0, 4, 0, 0, 0, 0),
	(349, 0, 13, 1, 4, 0, 0, 0, 0),
	(350, 0, 15, 1, 4, 0, 0, 0, 0),
	(351, 0, 16, 0, 4, 0, 0, 0, 0),
	(362, 0, 4, 6, 4, 0, 0, 0, 0),
	(363, 0, 12, 0, 4, 0, 0, 0, 0),
	(364, 0, 13, 1, 4, 0, 0, 0, 0),
	(365, 0, 15, 1, 4, 0, 0, 0, 0),
	(366, 0, 16, 0, 4, 0, 0, 0, 0),
	(377, 0, 4, 6, 4, 0, 0, 0, 0),
	(378, 0, 12, 0, 4, 0, 0, 0, 0),
	(379, 0, 13, 1, 4, 0, 0, 0, 0),
	(380, 0, 15, 1, 4, 0, 0, 0, 0),
	(381, 0, 16, 0, 4, 0, 0, 0, 0),
	(392, 0, 4, 6, 4, 0, 0, 0, 0),
	(393, 0, 12, 0, 4, 0, 0, 0, 0),
	(394, 0, 13, 1, 4, 0, 0, 0, 0),
	(395, 0, 15, 1, 4, 0, 0, 0, 0),
	(396, 0, 16, 0, 4, 0, 0, 0, 0),
	(407, 0, 4, 6, 4, 0, 0, 0, 0),
	(408, 0, 12, 0, 4, 0, 0, 0, 0),
	(409, 0, 13, 1, 4, 0, 0, 0, 0),
	(410, 0, 15, 1, 4, 0, 0, 0, 0),
	(411, 0, 16, 0, 4, 0, 0, 0, 0),
	(431, 28, 4, 6, 4, 0, 0, 0, 0),
	(432, 28, 12, 0, 4, 0, 0, 0, 0),
	(433, 28, 13, 1, 4, 0, 0, 0, 0),
	(434, 28, 15, 1, 4, 0, 0, 0, 0),
	(435, 28, 16, 0, 4, 0, 0, 0, 0),
	(455, 30, 4, 0, 11, 0, 0, 1, 3),
	(456, 30, 12, 0, 11, 0, 0, 0, 0),
	(457, 30, 13, 0, 11, 0, 2, 1, 1),
	(458, 30, 15, 0, 11, 0, 4, 3, 2),
	(459, 30, 16, 0, 11, 0, 1, 2, 1),
	(460, 31, 4, 0, 11, 0, 0, 0, 0),
	(461, 31, 12, 0, 11, 0, 0, 0, 0),
	(462, 31, 13, 0, 11, 0, 0, 0, 0),
	(463, 31, 15, 0, 11, 0, 0, 0, 0),
	(464, 31, 16, 1, 11, 0, 0, 0, 0),
	(465, 32, 4, 1, 5, 0, 0, 0, 0),
	(466, 32, 12, 0, 5, 0, 0, 0, 0),
	(467, 32, 13, 0, 5, 0, 0, 0, 0),
	(468, 32, 15, 0, 5, 0, 0, 0, 0),
	(469, 32, 16, 0, 5, 0, 0, 0, 0),
	(472, 33, 4, 2, 4, 0, 0, 0, 0),
	(473, 33, 12, 0, 4, 0, 0, 0, 0),
	(474, 33, 13, 0, 4, 0, 0, 0, 0),
	(475, 33, 15, 0, 4, 0, 0, 0, 0),
	(476, 33, 16, 0, 4, 0, 0, 0, 0),
	(479, 34, 4, 0, 4, 0, 0, 0, 0),
	(480, 34, 12, 0, 4, 0, 0, 0, 0),
	(481, 34, 13, 0, 4, 0, 0, 0, 0),
	(482, 34, 15, 1, 4, 0, 0, 0, 0),
	(483, 34, 16, 1, 4, 0, 0, 0, 0),
	(486, 35, 4, 0, 4, 0, 0, 0, 0),
	(487, 35, 12, 0, 4, 0, 0, 0, 0),
	(488, 35, 13, 0, 4, 0, 0, 0, 0),
	(489, 35, 15, 0, 4, 0, 0, 0, 0),
	(490, 35, 16, 0, 4, 0, 0, 0, 0);

-- Dumping structure for table cluster_dosen.tb_rules
CREATE TABLE IF NOT EXISTS `tb_rules` (
  `id` int NOT NULL AUTO_INCREMENT,
  `penelitian` varchar(50) NOT NULL DEFAULT '0',
  `pengajaran` varchar(50) NOT NULL DEFAULT '0',
  `bimbingan` varchar(50) NOT NULL DEFAULT '0',
  `hasil` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table cluster_dosen.tb_rules: ~0 rows (approximately)
DELETE FROM `tb_rules`;
INSERT INTO `tb_rules` (`id`, `penelitian`, `pengajaran`, `bimbingan`, `hasil`) VALUES
	(3, 'Komputer', 'Komputer', 'Sistem Informasi', 'Komputer'),
	(4, 'Komputer', 'Komputer', 'Manajemen Bisnis', 'Komputer'),
	(5, 'Sains', 'Sains', 'Sains', 'Sains'),
	(6, 'Sains', 'Sains', 'Manajemen Bisnis', 'Sains'),
	(7, 'Sains', 'Sains', 'Elektro', 'Sains'),
	(8, 'Sains', 'Sains', 'Sistem Informasi', 'Sains'),
	(9, 'Sains', 'Sains', 'Komputer', 'Sains'),
	(10, 'Sains', 'Manajemen Bisnis', 'Manajemen Bisnis', 'Manajemen Bisnis'),
	(11, 'Sains', 'Manajemen Bisnis', 'Elektro', 'Dominan'),
	(12, 'Sains', 'Manajemen Bisnis', 'Sistem Informasi', 'Dominan'),
	(13, 'Sains', 'Manajemen Bisnis', 'Komputer', 'Dominan'),
	(14, 'Sains', 'Elektro', 'Elektro', 'Elektro'),
	(15, 'Sains', 'Elektro', 'Sistem Informasi', 'Dominan'),
	(16, 'Sains', 'Elektro', 'Komputer', 'Dominan'),
	(17, 'Sains', 'Sistem Informasi', 'Sistem Informasi', 'Sistem Informasi'),
	(18, 'Sains', 'Sistem Informasi', 'Komputer', 'Dominan'),
	(19, 'Sains', 'Komputer', 'Komputer', 'Komputer'),
	(20, 'Manajemen Bisnis', 'Manajemen Bisnis', 'Manajemen Bisnis', 'Manajemen Bisnis'),
	(21, 'Manajemen Bisnis', 'Manajemen Bisnis', 'Elektro', 'Manajemen Bisnis'),
	(22, 'Manajemen Bisnis', 'Manajemen Bisnis', 'Sistem Informasi', 'Manajemen Bisnis'),
	(23, 'Manajemen Bisnis', 'Manajemen Bisnis', 'Komputer', 'Manajemen Bisnis'),
	(24, 'Manajemen Bisnis', 'Elektro', 'Elektro', 'Elektro'),
	(25, 'Manajemen Bisnis', 'Elektro', 'Sistem Informasi', 'Dominan'),
	(26, 'Manajemen Bisnis', 'Elektro', 'Komputer', 'Dominan'),
	(27, 'Manajemen Bisnis', 'Sistem Informasi', 'Sistem Informasi', 'Sistem Informasi'),
	(28, 'Manajemen Bisnis', 'Sistem Informasi', 'Komputer', 'Dominan'),
	(29, 'Manajemen Bisnis', 'Komputer', 'Komputer', 'Komputer'),
	(30, 'Elektro', 'Elektro', 'Elektro', 'Elektro'),
	(31, 'Elektro', 'Elektro', 'Sistem Informasi', 'Elektro'),
	(32, 'Elektro', 'Elektro', 'Komputer', 'Elektro'),
	(33, 'Elektro', 'Sistem Informasi', 'Sistem Informasi', 'Sistem Informasi'),
	(34, 'Elektro', 'Sistem Informasi', 'Komputer', 'Dominan'),
	(35, 'Elektro', 'Komputer', 'Komputer', 'Komputer'),
	(36, 'Sistem Informasi', 'Sistem Informasi', 'Sistem Informasi', 'Sistem Informasi'),
	(37, 'Sistem Informasi', 'Sistem Informasi', 'Komputer', 'Sistem Informasi'),
	(38, 'Sistem Informasi', 'Komputer', 'Komputer', 'Komputer'),
	(39, 'Komputer', 'Komputer', 'Komputer', 'Komputer');

-- Dumping structure for table cluster_dosen.tb_val_rules
CREATE TABLE IF NOT EXISTS `tb_val_rules` (
  `id` int NOT NULL,
  `id_kriteria` int NOT NULL,
  `penelitian` int NOT NULL DEFAULT '0',
  `pengajaran` int NOT NULL DEFAULT '0',
  `bimbingan` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table cluster_dosen.tb_val_rules: ~0 rows (approximately)
DELETE FROM `tb_val_rules`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
