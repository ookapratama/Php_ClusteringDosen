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

-- Dumping data for table cluster_dosen.tb_admin: ~1 rows (approximately)
INSERT INTO `tb_admin` (`user`, `pass`) VALUES
	('admin', 'admin');

-- Dumping structure for table cluster_dosen.tb_bidangilmu
CREATE TABLE IF NOT EXISTS `tb_bidangilmu` (
  `id_bidangilmu` int NOT NULL AUTO_INCREMENT,
  `nama_bidangilmu` varchar(35) NOT NULL,
  PRIMARY KEY (`nama_bidangilmu`),
  KEY `kelas_id` (`id_bidangilmu`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table cluster_dosen.tb_bidangilmu: ~4 rows (approximately)
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- Dumping data for table cluster_dosen.tb_dosen: ~15 rows (approximately)
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
	(31, 'BD112233', 'OOka', '20224946456', 'Laki-laki', 'S.Kom', '-', '-', 'Makassar', '2024-05-22', 'Islam', 11, '0', 'Ya');

-- Dumping structure for table cluster_dosen.tb_kriteria
CREATE TABLE IF NOT EXISTS `tb_kriteria` (
  `id_kriteria` int NOT NULL AUTO_INCREMENT,
  `kode_kriteria` varchar(16) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Dumping data for table cluster_dosen.tb_kriteria: ~5 rows (approximately)
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
  `bidang_ilmu` varchar(50) NOT NULL DEFAULT '',
  `mata_kuliah` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cluster_dosen.tb_penelitian: ~0 rows (approximately)
INSERT INTO `tb_penelitian` (`id`, `kode_dosen`, `judul_jurnal`, `bidang_ilmu`, `mata_kuliah`) VALUES
	(11, '30', 'Jurnal Implementasi Design Clean Code', '4', ''),
	(12, '30', 'Jurnal Implementasi Design THinking111', '15', 'Akuntansi');

-- Dumping structure for table cluster_dosen.tb_prodi
CREATE TABLE IF NOT EXISTS `tb_prodi` (
  `prodi_id` int NOT NULL AUTO_INCREMENT,
  `nama_prodi` varchar(20) DEFAULT NULL,
  `status` enum('aktif','tidak aktif') DEFAULT NULL,
  PRIMARY KEY (`prodi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table cluster_dosen.tb_prodi: ~6 rows (approximately)
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
  PRIMARY KEY (`ID`),
  KEY `id_siswa` (`id_dosen`),
  KEY `id_kriteria` (`id_kriteria`),
  KEY `tahun_id` (`prodi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=467 DEFAULT CHARSET=latin1;

-- Dumping data for table cluster_dosen.tb_rel_dosen: ~121 rows (approximately)
INSERT INTO `tb_rel_dosen` (`ID`, `id_dosen`, `id_kriteria`, `nilai`, `prodi_id`) VALUES
	(41, 0, 4, 4, 4),
	(44, 0, 4, 4, 4),
	(47, 0, 4, 4, 4),
	(50, 0, 4, 4, 4),
	(53, 0, 4, 4, 4),
	(56, 0, 4, 4, 4),
	(62, 14, 4, 7, 4),
	(65, 15, 4, 7, 4),
	(68, 16, 4, 7, 4),
	(71, 17, 4, 6, 4),
	(74, 18, 4, 4, 5),
	(77, 19, 4, 4, 5),
	(80, 20, 4, 4, 5),
	(83, 21, 4, 4, 5),
	(86, 22, 4, 4, 6),
	(89, 23, 4, 4, 6),
	(92, 24, 4, 4, 6),
	(95, 25, 4, 4, 6),
	(98, 26, 4, 4, 7),
	(101, 27, 4, 4, 7),
	(198, 14, 12, 3, 0),
	(199, 15, 12, 2, 0),
	(200, 16, 12, 3, 0),
	(201, 17, 12, 2, 0),
	(202, 18, 12, -1, 0),
	(203, 19, 12, -1, 0),
	(204, 20, 12, -1, 0),
	(205, 21, 12, -1, 0),
	(206, 22, 12, -1, 0),
	(207, 23, 12, -1, 0),
	(208, 24, 12, -1, 0),
	(209, 25, 12, -1, 0),
	(210, 26, 12, -1, 0),
	(211, 27, 12, -1, 0),
	(213, 14, 13, 3, 0),
	(214, 15, 13, 3, 0),
	(215, 16, 13, 3, 0),
	(216, 17, 13, 3, 0),
	(217, 18, 13, 0, 0),
	(218, 19, 13, 0, 0),
	(219, 20, 13, 0, 0),
	(220, 21, 13, 0, 0),
	(221, 22, 13, 6, 0),
	(222, 23, 13, 0, 0),
	(223, 24, 13, 0, 0),
	(224, 25, 13, 0, 0),
	(225, 26, 13, 0, 0),
	(226, 27, 13, 0, 0),
	(243, 14, 15, 3, 0),
	(244, 15, 15, 4, 0),
	(245, 16, 15, 4, 0),
	(246, 17, 15, 2, 0),
	(247, 18, 15, 0, 0),
	(248, 19, 15, 0, 0),
	(249, 20, 15, 0, 0),
	(250, 21, 15, 0, 0),
	(251, 22, 15, 0, 0),
	(252, 23, 15, 0, 0),
	(253, 24, 15, 0, 0),
	(254, 25, 15, 0, 0),
	(255, 26, 15, 0, 0),
	(256, 27, 15, 0, 0),
	(258, 14, 16, 2, 0),
	(259, 15, 16, 3, 0),
	(260, 16, 16, 2, 0),
	(261, 17, 16, 1, 0),
	(262, 18, 16, -1, 0),
	(263, 19, 16, 4, 0),
	(264, 20, 16, -1, 0),
	(265, 21, 16, -1, 0),
	(266, 22, 16, -1, 0),
	(267, 23, 16, -1, 0),
	(268, 24, 16, -1, 0),
	(269, 25, 16, -1, 0),
	(270, 26, 16, -1, 0),
	(271, 27, 16, -1, 0),
	(332, 0, 4, 4, 4),
	(333, 0, 12, 0, 4),
	(334, 0, 13, 1, 4),
	(335, 0, 15, 1, 4),
	(336, 0, 16, 0, 4),
	(347, 0, 4, 4, 4),
	(348, 0, 12, 0, 4),
	(349, 0, 13, 1, 4),
	(350, 0, 15, 1, 4),
	(351, 0, 16, 0, 4),
	(362, 0, 4, 4, 4),
	(363, 0, 12, 0, 4),
	(364, 0, 13, 1, 4),
	(365, 0, 15, 1, 4),
	(366, 0, 16, 0, 4),
	(377, 0, 4, 4, 4),
	(378, 0, 12, 0, 4),
	(379, 0, 13, 1, 4),
	(380, 0, 15, 1, 4),
	(381, 0, 16, 0, 4),
	(392, 0, 4, 4, 4),
	(393, 0, 12, 0, 4),
	(394, 0, 13, 1, 4),
	(395, 0, 15, 1, 4),
	(396, 0, 16, 0, 4),
	(407, 0, 4, 4, 4),
	(408, 0, 12, 0, 4),
	(409, 0, 13, 1, 4),
	(410, 0, 15, 1, 4),
	(411, 0, 16, 0, 4),
	(431, 28, 4, 4, 4),
	(432, 28, 12, 0, 4),
	(433, 28, 13, 1, 4),
	(434, 28, 15, 1, 4),
	(435, 28, 16, 0, 4),
	(455, 30, 4, 1, 11),
	(456, 30, 12, 0, 11),
	(457, 30, 13, 0, 11),
	(458, 30, 15, 1, 11),
	(459, 30, 16, 0, 11),
	(460, 31, 4, 1, 11),
	(461, 31, 12, 0, 11),
	(462, 31, 13, 0, 11),
	(463, 31, 15, 1, 11),
	(464, 31, 16, 0, 11);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
