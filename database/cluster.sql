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

-- Dumping data for table cluster_dosen.tb_admin: ~1 rows (approximately)
REPLACE INTO `tb_admin` (`user`, `pass`) VALUES
	('admin', 'admin');

-- Dumping data for table cluster_dosen.tb_bidangilmu: ~5 rows (approximately)
REPLACE INTO `tb_bidangilmu` (`id_bidangilmu`, `nama_bidangilmu`) VALUES
	(9, 'Sains'),
	(10, 'Komputer'),
	(11, 'Sistem Informasi'),
	(12, 'Elektro'),
	(13, 'Manajemen Bisnis');

-- Dumping data for table cluster_dosen.tb_dosen: ~16 rows (approximately)
REPLACE INTO `tb_dosen` (`id_dosen`, `kode_dosen`, `nama_dosen`, `nidn`, `jenis_kelamin`, `pendidikan_s1`, `pendidikan_s2`, `pendidikan_s3`, `tempat_lahir`, `tanggal_lahir`, `agama`, `prodi_id`, `nama_bidangilmu`, `hitung`) VALUES
	(14, 'TIA0002', 'Abdul Kadir Jailani, S.Kom., M', '0025067501', 'Laki-laki', NULL, NULL, NULL, 'Maros', '2024-02-21', 'Kristen Protestan', 4, 'K3', 'Ya'),
	(15, 'TIA0003', 'Abdul Rauf, Dr., S.H., M.H.', '0924097202', 'Laki-laki', NULL, NULL, NULL, 'Maros', '2024-02-28', 'Katolik', 4, 'K2', 'Ya'),
	(16, 'TIA0004', 'Abdul Ibrahim, Dr., S.T., M.T.', '931127016', 'Laki-laki', NULL, NULL, NULL, 'Maros', '2024-02-23', 'Kristen Protestan', 4, 'K3', 'Ya'),
	(17, 'TIA0005', 'Ahyuna, S.Kom., M.I.Kom.', '0914118501', 'Perempuan', NULL, NULL, NULL, 'Maros', '2024-02-28', 'Islam', 4, 'K1', 'Ya'),
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
	(28, 'TIA0006', 'Arham Arifin, S.Kom., M.T', '0905058904', 'Laki-laki', NULL, NULL, NULL, 'Maros', '2024-02-23', 'Islam', 4, '0', 'Ya'),
	(30, 'BD00069', 'Ooka Pratama', '202249', 'Laki-laki', 'S.Kom', 'M.Kom', '-', 'Makassar', '2024-04-25', 'Islam', 11, '0', 'Ya');

-- Dumping data for table cluster_dosen.tb_kriteria: ~5 rows (approximately)
REPLACE INTO `tb_kriteria` (`id_kriteria`, `kode_kriteria`, `nama_kriteria`) VALUES
	(4, 'K1', 'Komputer'),
	(12, 'K2', 'Sistem Informasi'),
	(13, 'K3', 'Elektro'),
	(15, 'K4', 'Manajemen Bisnis'),
	(16, 'K5', 'Sains');

-- Dumping data for table cluster_dosen.tb_penelitian: ~1 rows (approximately)
REPLACE INTO `tb_penelitian` (`id`, `kode_dosen`, `judul_jurnal`, `bidang_ilmu`) VALUES
	(1, '14', 'Jurnal Implementasi Design THinking', '9');

-- Dumping data for table cluster_dosen.tb_prodi: ~6 rows (approximately)
REPLACE INTO `tb_prodi` (`prodi_id`, `nama_prodi`, `status`) VALUES
	(4, 'TI', 'tidak aktif'),
	(5, 'SI', 'tidak aktif'),
	(6, 'MI', 'tidak aktif'),
	(7, 'RPL', 'tidak aktif'),
	(10, 'Kewirausahaan', 'aktif'),
	(11, 'Bisnis Digital', 'tidak aktif');

-- Dumping data for table cluster_dosen.tb_rel_dosen: ~116 rows (approximately)
REPLACE INTO `tb_rel_dosen` (`ID`, `id_dosen`, `id_kriteria`, `nilai`, `prodi_id`) VALUES
	(41, 0, 4, 0, 4),
	(44, 0, 4, 0, 4),
	(47, 0, 4, 0, 4),
	(50, 0, 4, 0, 4),
	(53, 0, 4, 0, 4),
	(56, 0, 4, 0, 4),
	(62, 14, 4, 3, 4),
	(65, 15, 4, 3, 4),
	(68, 16, 4, 3, 4),
	(71, 17, 4, 2, 4),
	(74, 18, 4, 0, 5),
	(77, 19, 4, 0, 5),
	(80, 20, 4, 0, 5),
	(83, 21, 4, 0, 5),
	(86, 22, 4, 0, 6),
	(89, 23, 4, 0, 6),
	(92, 24, 4, 0, 6),
	(95, 25, 4, 0, 6),
	(98, 26, 4, 0, 7),
	(101, 27, 4, 0, 7),
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
	(213, 14, 13, 2, 0),
	(214, 15, 13, 2, 0),
	(215, 16, 13, 2, 0),
	(216, 17, 13, 2, 0),
	(217, 18, 13, -1, 0),
	(218, 19, 13, -1, 0),
	(219, 20, 13, -1, 0),
	(220, 21, 13, -1, 0),
	(221, 22, 13, 5, 0),
	(222, 23, 13, -1, 0),
	(223, 24, 13, -1, 0),
	(224, 25, 13, -1, 0),
	(225, 26, 13, -1, 0),
	(226, 27, 13, -1, 0),
	(243, 14, 15, 2, 0),
	(244, 15, 15, 3, 0),
	(245, 16, 15, 3, 0),
	(246, 17, 15, 1, 0),
	(247, 18, 15, -1, 0),
	(248, 19, 15, -1, 0),
	(249, 20, 15, -1, 0),
	(250, 21, 15, -1, 0),
	(251, 22, 15, -1, 0),
	(252, 23, 15, -1, 0),
	(253, 24, 15, -1, 0),
	(254, 25, 15, -1, 0),
	(255, 26, 15, -1, 0),
	(256, 27, 15, -1, 0),
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
	(332, 0, 4, 0, 4),
	(333, 0, 12, 0, 4),
	(334, 0, 13, 0, 4),
	(335, 0, 15, 0, 4),
	(336, 0, 16, 0, 4),
	(347, 0, 4, 0, 4),
	(348, 0, 12, 0, 4),
	(349, 0, 13, 0, 4),
	(350, 0, 15, 0, 4),
	(351, 0, 16, 0, 4),
	(362, 0, 4, 0, 4),
	(363, 0, 12, 0, 4),
	(364, 0, 13, 0, 4),
	(365, 0, 15, 0, 4),
	(366, 0, 16, 0, 4),
	(377, 0, 4, 0, 4),
	(378, 0, 12, 0, 4),
	(379, 0, 13, 0, 4),
	(380, 0, 15, 0, 4),
	(381, 0, 16, 0, 4),
	(392, 0, 4, 0, 4),
	(393, 0, 12, 0, 4),
	(394, 0, 13, 0, 4),
	(395, 0, 15, 0, 4),
	(396, 0, 16, 0, 4),
	(407, 0, 4, 0, 4),
	(408, 0, 12, 0, 4),
	(409, 0, 13, 0, 4),
	(410, 0, 15, 0, 4),
	(411, 0, 16, 0, 4),
	(431, 28, 4, 0, 4),
	(432, 28, 12, 0, 4),
	(433, 28, 13, 0, 4),
	(434, 28, 15, 0, 4),
	(435, 28, 16, 0, 4),
	(455, 30, 4, 0, 11),
	(456, 30, 12, 0, 11),
	(457, 30, 13, 0, 11),
	(458, 30, 15, 0, 11),
	(459, 30, 16, 0, 11);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
