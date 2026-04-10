-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql313.infinityfree.com
-- Generation Time: Apr 10, 2026 at 07:25 AM
-- Server version: 11.4.10-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_41626994_db_ukk_pengaduan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_petugas`) VALUES
(1, 'admin_royyan', 'admin123', 'Admin Ryann'),
(2, 'admin_rafi', 'rafi1234', 'Mas Rafi');

-- --------------------------------------------------------

--
-- Table structure for table `aspirasi`
--

CREATE TABLE `aspirasi` (
  `id_aspirasi` int(11) NOT NULL,
  `nis` char(10) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `status` enum('Menunggu','Proses','Selesai') NOT NULL DEFAULT 'Menunggu',
  `feedback` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aspirasi`
--

INSERT INTO `aspirasi` (`id_aspirasi`, `nis`, `id_kategori`, `lokasi`, `keterangan`, `foto`, `tanggal`, `status`, `feedback`) VALUES
(13, '2324.10007', 2, 'Lab RPL', 'Lab tidak dibersihkan sejak kemarin', 'OIP (2).webp', '2026-03-31', 'Selesai', ''),
(34, '1212', 3, 'Kelas MP', 'Siswa berisik ', 'Screenshot_20260331_065107_YouTube.jpg', '2026-04-01', 'Selesai', 'sudah ditertibkan kak, terima kasih\r\n'),
(35, '6769.10027', 1, '12 RPL', 'Kelasnya berisik banget kyk pasar', '', '2026-04-01', 'Menunggu', ''),
(38, '2423.10027', 4, 'Lab RPL', 'Kelasny panas banget setan', 'WhatsApp Image 2026-04-08 at 20.33.54 (2).jpeg', '2026-04-02', 'Menunggu', 'Baik kak, untuk fotonya bisa lebih jelas tidak?'),
(40, '2423.10027', 3, 'Lapangan', 'Dompet saya hilang di tempat mie ayam', 'OIP.jpg', '2026-04-08', 'Proses', 'Baik kak, kami akan menindak lanjuti '),
(41, '2423.10027', 1, 'Kelas 11 PPLG', 'Meja dan kursinya kurang', '', '2026-04-08', 'Selesai', '&quot;Laporan telah diproses, mohon menunggu tindak lanjut dari tim terkait.&quot;'),
(46, '2423.10027', 2, 'Kelas 10 MP', 'Kelasnya Kotor dan Panas banget', '', '2026-04-09', 'Proses', 'Baik kak');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Kelas'),
(2, 'Kebersihan'),
(3, 'Keamanan'),
(4, 'Laboratorium'),
(5, 'Perpustakaan');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` char(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `kelas`, `password`) VALUES
('1212', 'Ka Aldi', 'Lab PPLG', '1212'),
('2324.10001', 'Aceng Wahdan', '12 RPL', 'Aceng123'),
('2324.10002', 'Aditya Dzakwan', '12 RPL', 'Aditya123'),
('2324.10003', 'Afrida Nuril A', '12 RPL', 'Afrida123'),
('2324.10004', 'Aldi Ferdiansyah', '12 RPL', 'AldiF123'),
('2324.10005', 'Aldi Sopyan R', '12 RPL', 'AldiSopyan123'),
('2324.10006', 'Anas Nasrulloh', '12 RPL', 'Anas1234'),
('2324.10007', 'Angelia Jamilah', '12 RPL', 'Angel123'),
('2324.10008', 'Ari Febrian', '12 RPL', 'AriFebri123'),
('2324.10009', 'Clarisa', '12 RPL', 'Clarisa123'),
('2324.10010', 'Dhi Rayatul Zahra', '12 RPL', 'Dhira123'),
('2324.10011', 'Eldiaz Mahesa Gunaja', '12 RPL', 'Eldiaz123'),
('2324.10027', 'Royyan Nur Ramadhani', '12 RPL', 'Royyan123'),
('2423.10027', 'Royyan Nur R', '12 RPL', '69420'),
('6769.10027', 'Royyan Nur Ramadhani ', '12 RPL', 'AprilMop67');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `aspirasi`
--
ALTER TABLE `aspirasi`
  ADD PRIMARY KEY (`id_aspirasi`),
  ADD KEY `fk_siswa` (`nis`),
  ADD KEY `fk_kategori` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `aspirasi`
--
ALTER TABLE `aspirasi`
  MODIFY `id_aspirasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aspirasi`
--
ALTER TABLE `aspirasi`
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_siswa` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
