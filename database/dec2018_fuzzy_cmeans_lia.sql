-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2019 at 09:08 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dec2018_fuzzy_cmeans_lia`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `user` varchar(16) NOT NULL,
  `pass` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`user`, `pass`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `kelas_id` int(11) NOT NULL,
  `nama_kelas` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`kelas_id`, `nama_kelas`) VALUES
(1, 'VII-1'),
(2, 'VII-2'),
(3, 'VII-3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode_kriteria` varchar(16) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id_kriteria`, `kode_kriteria`, `nama_kriteria`) VALUES
(1, 'C1', 'Bahasa Indonesia'),
(2, 'C2', 'IPA');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengumuman`
--

CREATE TABLE `tb_pengumuman` (
  `pengumuman_id` int(11) NOT NULL,
  `nama_pengumuman` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengumuman`
--

INSERT INTO `tb_pengumuman` (`pengumuman_id`, `nama_pengumuman`) VALUES
(1, '<p>Diberitahukan kepada Calon Siswa Baru SMP Negeri 8 Palangka Raya, bahwa pendaftaran online siswa baru dilaksanakan pada tanggal 24 November 2018 di kanal resmi web SMP Negeri 8 Palangka Raya</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rel_siswa`
--

CREATE TABLE `tb_rel_siswa` (
  `ID` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` double NOT NULL,
  `tahun_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rel_siswa`
--

INSERT INTO `tb_rel_siswa` (`ID`, `id_siswa`, `id_kriteria`, `nilai`, `tahun_id`) VALUES
(1, 9, 2, 4, 2),
(2, 9, 1, 4, 2),
(3, 8, 2, 4, 2),
(4, 8, 1, 4, 2),
(5, 7, 2, 4, 2),
(6, 7, 1, 3, 2),
(7, 6, 2, 3, 2),
(8, 6, 1, 3, 2),
(9, 5, 2, 3, 2),
(10, 5, 1, 4, 2),
(11, 4, 2, 4, 2),
(12, 4, 1, 3, 2),
(13, 3, 2, 3, 2),
(14, 3, 1, 4, 2),
(15, 2, 2, 3, 2),
(16, 2, 1, 3, 2),
(17, 1, 2, 4, 2),
(18, 1, 1, 4, 2),
(19, 10, 1, 3, 2),
(20, 10, 2, 4, 2),
(21, 11, 1, 4, 2),
(22, 11, 2, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `kode_siswa` varchar(255) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `nisn` varchar(25) NOT NULL,
  `nik` varchar(25) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `asal_sekolah` varchar(25) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` enum('Islam','Kristen Protestan','Katolik','Hindu','Buddha','Kong Hu Cu') NOT NULL,
  `alamat` text NOT NULL,
  `tahun_id` int(11) NOT NULL,
  `nama_kelas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `hitung` enum('Ya','Tidak') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `kode_siswa`, `nama_siswa`, `nisn`, `nik`, `jenis_kelamin`, `gambar`, `asal_sekolah`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `tahun_id`, `nama_kelas`, `username`, `password`, `hitung`) VALUES
(1, '2018A0001', 'Lia Anugrahni', '', '', 'Perempuan', '', 'SDN 1 Palangka Raya', 'Palangka Raya', '1997-01-07', 'Kristen Protestan', 'Jl. Trans Kalimantan', 2, 'VII-3', 'lia', 'lia', 'Ya'),
(2, '2018A0002', 'Ananda Putri Rahmayanti', '', '', 'Perempuan', '', 'SDN 1 Menteng', 'Palangka Raya', '1997-01-26', 'Kristen Protestan', 'Jl. Temanggung Tilung XIV', 2, 'VII-1', 'putri', 'putri', 'Ya'),
(3, '2018A0003', 'Rizal Arissandi', '', '', 'Laki-laki', '', 'SDN 12 Sukoharjo', 'Gunung Kidul', '1997-11-05', 'Islam', 'Jl. Bukit Keminting', 2, 'VII-3', 'rizal', 'rizal', 'Ya'),
(4, '2018A0004', 'Nanda Aulia Rahma', '', '', 'Perempuan', '', 'SDN 110 Jakarta Utara', 'Jakarta', '1997-11-23', 'Kristen Protestan', 'Jl. Manunggal', 2, 'VII-2', 'nanda', 'nanda', 'Ya'),
(5, '2018A0005', 'Putra Darma Permana', '', '', 'Laki-laki', '', 'SDN 4 Denpasar', 'Klunkung', '1997-08-20', 'Hindu', 'Jl. Sangga Buana II', 2, 'VII-3', 'putra', 'putra', 'Ya'),
(6, '2018A0006', 'Chelsea Olivia', '', '', 'Perempuan', '', 'SDN 110 Jakarta Utara', 'Jakarta', '1997-06-15', 'Kristen Protestan', 'Jl. Mahir-Mahar, KM.7,5', 2, 'VII-1', 'chelsea', 'chelsea', 'Ya'),
(7, '2018A0007', 'Aditya Nugraha', '', '', 'Laki-laki', '', 'SDN 6 Langkai', 'Palangka Raya', '1997-09-24', 'Islam', 'Jl. Antang Kalang IV', 2, 'VII-2', 'aditya', 'aditya', 'Ya'),
(8, '2018A0008', 'Angga Dwi Anggoro', '', '', 'Laki-laki', '', 'SDN 4 Jepara', 'Jepara', '1997-12-05', 'Islam', 'Jl. Hiu Putih', 2, 'VII-3', 'angga', 'angga', 'Ya'),
(9, '2018A0009', 'Nadya Noor Ayunani', '', '', 'Perempuan', '', 'SDN 1 Palangka Raya', 'Palangka Raya', '1997-01-12', 'Islam', 'Jl. Majapahit', 2, 'VII-3', 'nadya', 'nadya', 'Ya'),
(10, '2018A0010', 'Anindya Kartika Putri', '', '', 'Perempuan', '', 'SDN 1 Palangka Raya', 'Palangka Raya', '1997-01-11', 'Islam', 'Jl. Manggis', 2, 'VII-2', 'anin', 'anin', 'Ya'),
(11, '2018A0011', 'Aisyah Aini Syifa', '', '', 'Perempuan', '', 'SDN 1 Palangka Raya', 'Kalampangan', '1997-01-10', 'Islam', 'Jl. Nenas, Kalampangan', 2, 'VII-3', 'aisyah', 'aisyah', 'Ya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tahun`
--

CREATE TABLE `tb_tahun` (
  `tahun_id` int(11) NOT NULL,
  `nama_tahun` varchar(4) DEFAULT NULL,
  `status` enum('aktif','tidak aktif') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tahun`
--

INSERT INTO `tb_tahun` (`tahun_id`, `nama_tahun`, `status`) VALUES
(1, '2017', 'tidak aktif'),
(2, '2018', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`nama_kelas`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tb_pengumuman`
--
ALTER TABLE `tb_pengumuman`
  ADD PRIMARY KEY (`pengumuman_id`);

--
-- Indexes for table `tb_rel_siswa`
--
ALTER TABLE `tb_rel_siswa`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `tahun_id` (`tahun_id`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tb_tahun`
--
ALTER TABLE `tb_tahun`
  ADD PRIMARY KEY (`tahun_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `kelas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_pengumuman`
--
ALTER TABLE `tb_pengumuman`
  MODIFY `pengumuman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_rel_siswa`
--
ALTER TABLE `tb_rel_siswa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_tahun`
--
ALTER TABLE `tb_tahun`
  MODIFY `tahun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
