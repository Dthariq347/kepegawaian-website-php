-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2021 at 05:11 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uas_thariq`
--

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `gol` int(2) NOT NULL,
  `tj_keluarga` decimal(8,0) NOT NULL,
  `tj_transportasi` decimal(8,0) NOT NULL,
  `tj_makan` decimal(8,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`gol`, `tj_keluarga`, `tj_transportasi`, `tj_makan`) VALUES
(12, '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `gopak`
--

CREATE TABLE `gopak` (
  `kd_jabatan` char(3) NOT NULL,
  `gol` int(2) NOT NULL,
  `gaji_pokok` decimal(8,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gopak`
--

INSERT INTO `gopak` (`kd_jabatan`, `gol`, `gaji_pokok`) VALUES
('KK', 12, '20000000');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `kd_jabatan` char(3) NOT NULL,
  `nama_jabatan` varchar(20) NOT NULL,
  `tunjangan_jabatan` decimal(8,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`kd_jabatan`, `nama_jabatan`, `tunjangan_jabatan`) VALUES
('DA', 'operasi', '200000'),
('KK', 'management', '300000');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nip` char(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `kd_jabatan` char(3) NOT NULL,
  `gol` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nip`, `nama`, `alamat`, `kota`, `jk`, `kd_jabatan`, `gol`) VALUES
('121', 'dasdadsa', 'dsadasdadsa', 'bandung', 'laki-laki', 'KK', 12),
('12312', 'dzaky abiyyu thariq', 'Pondok Cabe Indah ', 'bandung', 'perempuan', 'KK', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`gol`);

--
-- Indexes for table `gopak`
--
ALTER TABLE `gopak`
  ADD UNIQUE KEY `kd_jabatan_2` (`kd_jabatan`),
  ADD KEY `kd_jabatan` (`kd_jabatan`),
  ADD KEY `gol` (`gol`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`kd_jabatan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `kd_jabatan` (`kd_jabatan`),
  ADD KEY `gol` (`gol`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gopak`
--
ALTER TABLE `gopak`
  ADD CONSTRAINT `gopak_ibfk_1` FOREIGN KEY (`kd_jabatan`) REFERENCES `jabatan` (`kd_jabatan`),
  ADD CONSTRAINT `gopak_ibfk_2` FOREIGN KEY (`gol`) REFERENCES `golongan` (`gol`);

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`kd_jabatan`) REFERENCES `jabatan` (`kd_jabatan`),
  ADD CONSTRAINT `karyawan_ibfk_2` FOREIGN KEY (`gol`) REFERENCES `golongan` (`gol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
